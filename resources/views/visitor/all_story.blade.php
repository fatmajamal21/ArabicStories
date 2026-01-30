{{-- resources/views/visitor/all_story.blade.php --}}
@extends('layouts.master')

@section('title', 'جميع القصص')

@section('content')
<div class="header2">
    <img src="{{ asset('img/allstory.png') }}" alt="Header">
</div>

<div class="container">

    <header>
        <div class="head">
            <h3>قصص الأطفال</h3>

            <div class="search-bar">
    <p>للحصول على قصص بطريقة أسرع قم بالبحث عن القصة وقم بفلترة النتائج حسب الفئة العمرية و النوع.</p>

    <form method="get" action="{{ route('all_story') }}" style="display:flex; gap:10px; align-items:center;">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="اكتب هنا ...">

        <button type="submit" style="padding:10px 12px; border:none; background:#4CAF50; color:#fff; border-radius:8px; cursor:pointer; display:flex; align-items:center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
                <path d="M10 2a8 8 0 105.293 14.707l5.387 5.387 1.414-1.414-5.387-5.387A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z" />
            </svg>
        </button>
    </form>

    <button type="button" style="padding:10px; border:none; background:#2196F3; border-radius:8px; cursor:pointer; display:flex; align-items:center; justify-content:center;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
            <path d="M12 14a3 3 0 003-3V5a3 3 0 00-6 0v6a3 3 0 003 3zm5-3a5 5 0 01-10 0H5a7 7 0 0014 0h-2zM12 17v4h-2v2h6v-2h-2v-4h-2z" />
        </svg>
    </button>
    <button onclick="window.location.href='{{ route('all_story') }}'"
        style="padding:10px; border:none; background:#f44336; border-radius:8px; cursor:pointer; display:flex; align-items:center; justify-content:center;"
        title="مسح الفلترة">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
        <path d="M18 6L6 18M6 6l12 12"/>
    </svg>
</button>

</div>
        </div>
    </header>

    <section class="stories">
        <div class="story">

            <nav class="categories">
                <a class="{{ empty($selectedCats) ? 'active' : '' }}" href="{{ route('all_story', array_merge(request()->except('cat','page'), [])) }}">
                    كل القصص
                </a>

                @foreach($categories as $cat)
                    @php
                        $isActive = in_array($cat->slug, $selectedCats ?? []);
                        $nextCats = $selectedCats ?? [];

                        if($isActive){
                            $nextCats = array_values(array_filter($nextCats, fn($v) => $v !== $cat->slug));
                        }else{
                            $nextCats[] = $cat->slug;
                        }
                    @endphp

                    <a class="{{ $isActive ? 'active' : '' }}"
                       href="{{ route('all_story', array_merge(request()->except('page'), ['cat' => $nextCats])) }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </nav>

            <div class="stories-container2">
                @if(!empty($search))
                    <div style="margin:10px 0; font-weight:700;">
                        نتائج البحث عن: {{ $search }}
                    </div>
                @endif

                @forelse($stories as $s)
                    <a href="{{ route('story.show', $s->slug) }}" style="text-decoration:none; color:inherit;">
                        <div class="story-card">
                            @if($s->cover)
                                <img src="{{ asset('storage/'.$s->cover) }}" alt="{{ $s->title }}">
                            @else
                                <img src="{{ asset('img/default-story.png') }}" alt="{{ $s->title }}">
                            @endif

                            <div class="content">
                                <h2>{{ $s->title }}</h2>
                                <p>تناسب الاطفال من عمر {{ $s->age_group }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div style="padding:20px;">لا توجد قصص</div>
                @endforelse
            </div>
{{-- http://127.0.0.1:8000/all_story?page=2 --}}
            {{-- <div style="margin-top:16px;">
                {{ $stories->links() }}
            </div> --}}

        </div>

        <aside class="filter">
            <h5>
                <i class="fas fa-filter"></i>
                فلترة القصص
            </h5>

            <hr>

            <form method="get" action="{{ route('all_story') }}">

                {{-- حافظ على البحث عند الفلترة --}}
                @if(!empty($search))
                    <input type="hidden" name="search" value="{{ $search }}">
                @endif

         <div class="filter-group">
    <h4>حسب العمر</h4>

    @php
        $ages = [
            '3_5'   => 'من 3-5 سنوات',
            '5_7'   => 'من 5-7 سنوات',
            '7_9'   => 'من 7-9 سنوات',
            '9_12'  => 'من 9-12 سنة',
            '12_15' => 'من 12-15 سنة',
        ];
    @endphp

    @foreach($ages as $val => $label)
        <label>
            <input type="checkbox" name="age[]" value="{{ $val }}"
                   {{ in_array($val, $selectedAges ?? []) ? 'checked' : '' }}>
            {{ $label }}
        </label>
    @endforeach
</div>


                <div class="filter-group">
                    <h4>حسب الفئة</h4>

                    @foreach($categories as $cat)
                        <label>
                            <input type="checkbox" name="cat[]" value="{{ $cat->slug }}"
                                   {{ in_array($cat->slug, $selectedCats ?? []) ? 'checked' : '' }}>
                            {{ $cat->name }}
                        </label>
                    @endforeach
                </div>

                <div style="display:flex; gap:10px; margin-top:12px;">
                    <button type="submit" class="btn btn-primary">تم</button>
                    <a href="{{ route('all_story') }}" class="btn btn-light">مسح</a>
                </div>

                <div style="margin-top:12px;">
                    <img src="{{ asset('img/fliter.png') }}" alt="Filter Icon">
                </div>

            </form>
        </aside>
    </section>

</div>
@endsection
