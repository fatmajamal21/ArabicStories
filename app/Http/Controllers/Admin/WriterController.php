<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::withCount('stories')->latest()->paginate(10);
        return view('admin.writers.index', compact('writers'));
    }

    public function create()
    {
        return view('admin.writers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:writers,email',
            'phone' => 'nullable|string|max:30',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'is_verified' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_verified'] = (bool)($data['is_verified'] ?? false);
        $data['is_active'] = (bool)($data['is_active'] ?? true);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/writers', 'public');
        }

        Writer::create($data);

        return redirect()->route('admin.writers.index')->with('success', 'تم إضافة الكاتب');
    }

    public function edit($id)
    {
        $writer = Writer::findOrFail($id);
        return view('admin.writers.edit', compact('writer'));
    }

    public function update(Request $request, $id)
    {
        $writer = Writer::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:writers,email,' . $writer->id,
            'phone' => 'nullable|string|max:30',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'is_verified' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_verified'] = (bool)($data['is_verified'] ?? false);
        $data['is_active'] = (bool)($data['is_active'] ?? true);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('uploads/writers', 'public');
        }

        $writer->update($data);

        return redirect()->route('admin.writers.index')->with('success', 'تم التعديل');
    }

    public function destroy($id)
    {
        Writer::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف');
    }

    public function toggleVerify($id)
    {
        $writer = Writer::findOrFail($id);
        $writer->update(['is_verified' => !$writer->is_verified]);
        return back()->with('success', 'تم تحديث التوثيق');
    }
}
