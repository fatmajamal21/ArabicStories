<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\User;
use App\Models\Worker;
use App\Models\Writer;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_stories'           => Story::count(),
            'published_stories'       => Story::where('status', 'published')->count(),
            'pending_stories'         => Story::where('status', 'pending')->count(),
            'rejected_stories'        => Story::where('status', 'rejected')->count(),

            'total_users'             => User::count(),

            'total_writers'           => Writer::count(),
            'active_writers'          => Writer::where('is_active', 1)->count(),
            'inactive_writers'        => Writer::where('is_active', 0)->count(),
            'verified_writers'        => Writer::where('is_verified', 1)->count(),
            'unverified_writers'      => Writer::where('is_verified', 0)->count(),
            'active_verified_writers' => Writer::where('is_active', 1)->where('is_verified', 1)->count(),
        ];

        $latestStories = Story::with(['category', 'writer'])->latest()->take(8)->get();

        $pendingStories = Story::with(['category', 'writer'])
            ->where('status', 'pending')
            ->latest()
            ->take(8)
            ->get();

        $topWriters = Writer::withCount('stories')
            ->orderByDesc('stories_count')
            ->take(8)
            ->get();

        $latestWriters = Writer::latest()->take(8)->get();
        $latestWorkers = Worker::latest()->take(8)->get();

        return view(
            'admin.dashboard',
            compact('stats', 'latestStories', 'pendingStories', 'topWriters', 'latestWriters', 'latestWorkers')
        );
    }
}
