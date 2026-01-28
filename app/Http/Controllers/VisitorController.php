<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class VisitorController extends Controller
{

    public function index()
    {
        $workers = Worker::query()
            ->where('is_active', 1)
            ->orderByDesc('is_verified')
            ->latest()
            ->take(12)
            ->get();

        return view('visitor.index', compact('workers'));
    }

    public function profile()
    {
        return view('visitor.profile');
    }
    public function about()
    {
        return view('visitor.about');
    }
    public function all_story()
    {
        return view('visitor.all_story');
    }
    public function story()
    {
        return view('visitor.story');
    }

    public function favorites()
    {
        return view('visitor.favorites');
    }

    public function favoriteFolders()
    {
        return view('visitor.favorites_folders');
    }

    public function editAccount()
    {
        return view('visitor.edit_account');
    }


    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function resetPassword()
    {
        return view('auth.reset-password');
    }
    public function code()
    {
        return view('auth.code');
    }
    public function confirmation()
    {
        return view('auth.confirmation');
    }
}
