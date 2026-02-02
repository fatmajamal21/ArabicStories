<?php

namespace App\Http\Controllers;

use App\Models\FavoriteFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    private function checkUser(string $username): User
    {
        if (!Auth::check()) {
            abort(403);
        }

        $user = User::where('name', $username)->firstOrFail();

        if (Auth::id() !== $user->id) {
            abort(403);
        }

        return $user;
    }

    public function profile(string $username, Request $request)
    {
        $user = $this->checkUser($username);

        $visitor = app(\App\Http\Controllers\VisitorController::class);

        return $visitor->index($request);
    }
    public function favorites($username, Request $request)
    {
        $user = User::where('name', $username)->firstOrFail();

        $folders = FavoriteFolder::withCount('favorites')
            ->where('user_id', $user->id)
            ->get();

        $activeFolder = null;

        if ($request->filled('folder')) {
            $activeFolder = FavoriteFolder::with('favorites.story')
                ->where('id', $request->folder)
                ->where('user_id', $user->id)
                ->firstOrFail();
        }

        return view('visitor.favorites', compact(
            'user',
            'folders',
            'activeFolder'
        ));
    }

    public function favoriteFolders($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        $folders = FavoriteFolder::withCount('favorites')
            ->where('user_id', $user->id)
            ->get();

        return view('visitor.favorite-folders', compact('user', 'folders'));
    }

    public function favoriteStories($username, FavoriteFolder $folder)
    {
        $user = User::where('name', $username)->firstOrFail();

        abort_if($folder->user_id !== $user->id, 403);

        $favorites = $folder->favorites()->with('story')->get();

        return view('visitor.favorites', compact('user', 'folder', 'favorites'));
    }
    public function editAccount(string $username)
    {
        $user = $this->checkUser($username);

        return view('user.edit_account', compact('user'));
    }

    public function updateAccount(string $username, Request $request)
    {
        $user = $this->checkUser($username);

        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        $data = [
            'name' => $request->name,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
            ->route('user.editAccount', $user->name)
            ->with('success', 'تم حفظ التعديلات');
    }
}
