@extends('layouts.master')

@section('title', $folder->name)

@section('content')

<div class="container">
    <div class="story_favorites story">

        <h3>{{ $folder->name }}</h3>

        <div class="stories-container1">

            @forelse($folder->favorites as $fav)
                <div class="story-card">
                    <img src="{{ asset('storage/'.$fav->story->cover) }}" alt="">

                    <div class="heart-btn active">
                        <i class="fas fa-heart"></i>
                    </div>

                    <div class="content">
                        <h2>{{ $fav->story->title }}</h2>
                        <p>تناسب الأطفال من عمر {{ $fav->story->age_group }}</p>
                    </div>
                </div>
            @empty
                <p>لا توجد قصص في هذا المجلد</p>
            @endforelse

        </div>

        <div style="margin-top:20px">
            <a href="{{ route('user.favorites.folders', $user->name) }}">
                ← الرجوع إلى المجلدات
            </a>
        </div>

    </div>
</div>

@endsection
