<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($username, Request $request)
    {
        $user = \App\Models\User::where('name', $username)->firstOrFail();

        $visitor = new \App\Http\Controllers\VisitorController();

        return $visitor->index($request);
    }
}
