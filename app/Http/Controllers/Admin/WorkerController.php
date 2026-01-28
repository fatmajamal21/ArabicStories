<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkerController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');

        $workers = Worker::query()
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('phone', 'like', '%' . $q . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.workers.index', compact('workers'));
    }

    public function create()
    {
        return view('admin.workers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:160',
            'email' => 'nullable|email|max:191|unique:workers,email',
            'phone' => 'nullable|string|max:40',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'is_verified' => 'nullable|in:0,1',
            'is_active' => 'nullable|in:0,1',
        ]);

        $data['is_verified'] = (int)($data['is_verified'] ?? 0);
        $data['is_active'] = (int)($data['is_active'] ?? 1);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/workers', 'public');
        }

        Worker::create($data);

        return redirect()->route('admin.workers.index')->with('success', 'تمت إضافة العامل');
    }

    public function edit($id)
    {
        $worker = Worker::findOrFail($id);
        return view('admin.workers.edit', compact('worker'));
    }

    public function update(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:160',
            'email' => 'nullable|email|max:191|unique:workers,email,' . $worker->id,
            'phone' => 'nullable|string|max:40',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'is_verified' => 'nullable|in:0,1',
            'is_active' => 'nullable|in:0,1',
        ]);

        $data['is_verified'] = (int)($data['is_verified'] ?? 0);
        $data['is_active'] = (int)($data['is_active'] ?? 1);

        if ($request->hasFile('avatar')) {
            if ($worker->avatar && Storage::disk('public')->exists($worker->avatar)) {
                Storage::disk('public')->delete($worker->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('uploads/workers', 'public');
        }

        $worker->update($data);

        return redirect()->route('admin.workers.index')->with('success', 'تم تحديث بيانات العامل');
    }

    public function destroy($id)
    {
        $worker = Worker::findOrFail($id);

        if ($worker->avatar && Storage::disk('public')->exists($worker->avatar)) {
            Storage::disk('public')->delete($worker->avatar);
        }

        $worker->delete();

        return back()->with('success', 'تم حذف العامل');
    }

    public function toggleVerify($id)
    {
        $worker = Worker::findOrFail($id);
        $worker->update(['is_verified' => !$worker->is_verified]);

        return back()->with('success', $worker->is_verified ? 'تم توثيق العامل' : 'تم إلغاء التوثيق');
    }
}
