<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private array $ageMap = [
        '3_5'   => 'من 3-5 سنوات',
        '5_7'   => 'من 5-7 سنوات',
        '7_9'   => 'من 7-9 سنوات',
        '9_12'  => 'من 9-12 سنة',
        '12_15' => 'من 12-15 سنة',
    ];

    private function normalizeAges(array $selectedAges): array
    {
        $out = [];

        foreach ($selectedAges as $a) {
            $a = trim((string) $a);
            if ($a === '') {
                continue;
            }

            $out[] = $a;

            if (isset($this->ageMap[$a])) {
                $out[] = $this->ageMap[$a];
            }
        }

        return array_values(array_unique($out));
    }

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q'));

        $selectedAges = (array) $request->input('age', []);
        $selectedCats = (array) $request->input('cat', []);

        $workers = Worker::query()
            ->where('is_active', 1)
            ->latest()
            ->take(12)
            ->get();

        $categories = Category::query()
            ->where('is_active', 1)
            ->orderBy('name')
            ->get();

        $dailyAgeKey = '3_5';
        $dailyAgeLabel = $this->ageMap[$dailyAgeKey];

        $dailyStories = Story::query()
            ->where('status', 'published')
            // ->whereIn('age_group', [$dailyAgeKey, $dailyAgeLabel])
            ->inRandomOrder()
            ->take(5)
            ->get();

        $homeStoriesQuery = Story::query()
            ->where('status', 'published')
            ->with('category');

        if (!empty($selectedAges)) {
            $ageValues = $this->normalizeAges($selectedAges);
            $homeStoriesQuery->whereIn('age_group', $ageValues);
        }

        if (!empty($selectedCats)) {
            $homeStoriesQuery->whereHas('category', function ($q2) use ($selectedCats) {
                $q2->whereIn('slug', $selectedCats);
            });
        }

        if ($q !== '') {
            $homeStoriesQuery->where('title', 'like', '%' . $q . '%')->latest();
        } else {
            $homeStoriesQuery->inRandomOrder();
        }

        $homeStories = $homeStoriesQuery->take(8)->get();

        return view('visitor.index', compact(
            'workers',
            'categories',
            'dailyStories',
            'homeStories',
            'q',
            'selectedAges',
            'selectedCats'
        ));
    }

    public function allStory(Request $request)
    {
        $q = trim((string) $request->query('q'));

        $categories = Category::query()
            ->where('is_active', 1)
            ->orderBy('name')
            ->get();

        $selectedAges = (array) $request->input('age', []);
        $selectedCats = (array) $request->input('cat', []);

        $query = Story::query()
            ->where('status', 'published')
            ->with('category');

        if (!empty($selectedAges)) {
            $ageValues = $this->normalizeAges($selectedAges);
            $query->whereIn('age_group', $ageValues);
        }

        if (!empty($selectedCats)) {
            $query->whereHas('category', function ($q2) use ($selectedCats) {
                $q2->whereIn('slug', $selectedCats);
            });
        }

        if ($q !== '') {
            $query->where('title', 'like', '%' . $q . '%');
        }

        $stories = $query->latest()->paginate(12)->withQueryString();

        return view('visitor.all_story', compact(
            'stories',
            'categories',
            'selectedAges',
            'selectedCats',
            'q'
        ));
    }

    public function all_story(Request $request)
    {
        return $this->allStory($request);
    }

    public function showStory($slug)
    {
        $story = Story::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->with('writer')
            ->firstOrFail();

        return view('visitor.story', compact('story'));
    }

    public function profile()
    {
        return view('visitor.profile');
    }

    public function about()
    {
        return view('visitor.about');
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
