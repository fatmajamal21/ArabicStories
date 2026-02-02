@extends('layouts.master')

@section('title', 'المفضلة')

@section('content')

<div class="container">
    <div class="story_favorites story">

        <h3>مجلدات المفضلة</h3>

        <div class="folders-container">

            <div class="folders-column">

                @forelse($folders as $index => $folder)
                    <div class="folder"
                         style="background: {{ ['#cbad16', '#067641', '#7a3eb1', '#c0392b'][$index % 4] }};"
                         onclick="window.location.href='{{ route('user.favorites', $user->name) }}?folder={{ $folder->id }}'">

                        <div class="folder-badge">
                            {{ $folder->favorites_count }}
                        </div>

                        <div class="folder-name">
                            {{ $folder->name }}
                        </div>
                    </div>
                @empty
                    <p>لا توجد مجلدات</p>
                @endforelse

            </div>

            <div class="favorites_img">
                <img src="{{ asset('img/favorites_folders.png') }}" alt="">
            </div>

        </div>

        @if($activeFolder)
            <hr>
            <h3>{{ $activeFolder->name }}</h3>

            <div class="stories-container1">

                @forelse($activeFolder->favorites as $fav)
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

            <div style="margin-top:15px;">
                <a href="{{ route('user.favorites', $user->name) }}">رجوع إلى المجلدات</a>
            </div>
        @endif

    </div>
</div>

@endsection
