<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Story;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;




class VisitorController extends Controller
{
    private function homeData(Request $request): array
    {
        $q = trim((string) $request->query('q'));

        $selectedAges = (array) $request->input('age', []);
        $selectedCats = (array) $request->input('cat', []);

        $workers = Worker::where('is_active', 1)
            ->latest()
            ->take(12)
            ->get();

        $categories = Category::where('is_active', 1)
            ->orderBy('name')
            ->get();

        $dailyStories = Story::where('status', 'published')
            ->inRandomOrder()
            ->take(5)
            ->get();

        $homeStoriesQuery = Story::where('status', 'published')
            ->with('category');

        if (!empty($selectedAges)) {
            $homeStoriesQuery->whereIn(
                'age_group',
                $this->normalizeAges($selectedAges)
            );
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

        return compact(
            'workers',
            'categories',
            'dailyStories',
            'homeStories',
            'q',
            'selectedAges',
            'selectedCats'
        );
    }

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
        return view(
            'visitor.index',
            $this->homeData($request)
        );
    }

    public function profile(Request $request)
    {
        return view(
            'visitor.index',
            $this->homeData($request)
        );
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


    public function editAccount()
    {
        return view('visitor.edit_account');
    }
    public function updateAccount(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();


        $data = $request->validate([
            'name'     => 'required|string|max:255|unique:users,name,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data); // ✅ هذا يعمل 100%

        return redirect()
            ->route('home')
            ->with('success', 'تم تحديث بيانات الحساب بنجاح');
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
