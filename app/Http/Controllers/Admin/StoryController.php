<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Writer;


class StoryController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $status = $request->get('status');

        $stories = Story::query()
            ->with(['category', 'writer'])
            ->when($q, function ($query) use ($q) {
                $query->where('title', 'like', '%' . $q . '%');
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.stories.index', compact('stories'));
    }

    public function pending()
    {
        $stories = Story::query()
            ->with(['category', 'writer'])
            ->where('status', 'pending')
            ->latest()
            ->paginate(10);

        return view('admin.stories.pending', compact('stories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $writers = Writer::orderBy('name')->get();

        return view('admin.stories.create', compact('categories', 'writers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'writer_id' => 'nullable|exists:writers,id',

            'summary' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'age_group' => 'nullable|string|max:50',
            'status' => 'required|in:pending,published,rejected',
            'cover' => 'nullable|image|max:2048',
            'audio' => 'nullable|mimes:mp3,wav,m4a,ogg|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('uploads/covers', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('uploads/audio', 'public');
        }

        Story::create($data);

        return redirect()->route('admin.stories.index')->with('success', 'تم حفظ القصة');
    }

    public function edit($id)
    {
        $story = Story::with(['category', 'writer'])->findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $writers = Writer::orderBy('name')->get();

        return view('admin.stories.edit', compact('story', 'categories', 'writers'));
    }

    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'age_group' => 'nullable|string|max:50',
            'status' => 'required|in:pending,published,rejected',
            'reject_reason' => 'nullable|string',
            'cover' => 'nullable|image|max:2048',
            'audio' => 'nullable|mimes:mp3,wav,m4a,ogg|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('uploads/covers', 'public');
        }

        if ($request->hasFile('audio')) {
            $data['audio'] = $request->file('audio')->store('uploads/audio', 'public');
        }

        $story->update($data);

        return redirect()->route('admin.stories.index')->with('success', 'تم تحديث القصة');
    }

    public function destroy($id)
    {
        Story::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف القصة');
    }

    public function approve($id)
    {
        $story = Story::findOrFail($id);
        $story->update([
            'status' => 'published',
            'reject_reason' => null,
            'published_at' => now(),
        ]);

        return back()->with('success', 'تمت الموافقة');
    }

    public function reject(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        $data = $request->validate([
            'reason' => 'nullable|string|max:500',
        ]);

        $story->update([
            'status' => 'rejected',
            'reject_reason' => $data['reason'] ?? null,
        ]);

        return back()->with('success', 'تم الرفض');
    }
}
