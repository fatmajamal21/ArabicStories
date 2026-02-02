<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\FavoriteFolder;

class FavoriteController extends Controller
{
    public function folders()
    {
        return FavoriteFolder::where('user_id', auth()->id())
            ->get(['id', 'name']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'story_id'  => 'required|exists:stories,id',
            'folder_id' => 'required|exists:favorite_folders,id',
        ]);

        Favorite::firstOrCreate([
            'user_id'   => auth()->id(),
            'story_id'  => $request->story_id,
            'folder_id' => $request->folder_id,
        ]);

        return response()->json(['status' => 'saved']);
    }

    public function createFolder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FavoriteFolder::create([
            'user_id' => auth()->id(),
            'name'    => $request->name,
        ]);

        return response()->json(['status' => 'created']);
    }

    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id !== auth()->id()) {
            abort(403);
        }

        $favorite->delete();

        return response()->json(['status' => 'deleted']);
    }

    public function move(Request $request, Favorite $favorite)
    {
        if ($favorite->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'folder_id' => 'required|exists:favorite_folders,id',
        ]);

        $favorite->update([
            'folder_id' => $request->folder_id,
        ]);

        return response()->json(['status' => 'moved']);
    }

    public function favoriteStoryIds()
    {
        return Favorite::where('user_id', auth()->id())
            ->pluck('story_id');
    }
}
