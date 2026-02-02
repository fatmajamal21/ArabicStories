@extends('layouts.master')

@section('title', 'الصفحة الرئيسية | Bookworm')

@section('content')

<style>
    .heart-btn.active i {
    color: rgb(5, 93, 27);
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-box {
    background: #ffffff;
    color:  #7CB342;
    padding: 20px;
    border-radius: 12px;
    width: 320px;
    text-align: center;
}

.modal-actions {
    display: flex;
    gap: 10px;
    justify-content: center;
    margin-top: 15px;
}

.folder-btn {
    padding: 10px;
    border-radius: 8px;
    border: none;
    background: #c5d86d;
    cursor: pointer;
}

.folder-btn.add {
    background: #eeeeee;
}
</style>



<div class="header">
    <img src="{{ asset('img/مستخدم - Copy (3).png') }}" alt="Header Image">
</div>

<div class="container">

    <div class="story">
        <h3>القصص اليومية</h3>

        <div class="stories-container1">

            @forelse($dailyStories as $story)

                <a href="{{ route('story.show', $story->slug) }}" style="text-decoration:none; color:inherit;">
<div class="story-card" data-story-id="{{ $story->id }}">

                        @if($story->cover)
                            <img src="{{ asset('storage/'.$story->cover) }}" alt="{{ $story->title }}">
                        @else
                            <img src="{{ asset('img/default-story.png') }}" alt="{{ $story->title }}">
                        @endif

                        {{-- <div class="heart-btn" onclick="toggleHeart(this); event.preventDefault(); event.stopPropagation();">
                            <i class="far fa-heart"></i>
                        </div> --}}
   <div class="heart-btn" onclick="handleFavorite(event)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>{{ $story->title }}</h2>
                            <p>تناسب الأطفال من عمر {{ $story->age_group }}</p>
                        </div>

                    </div>
                </a>

            @empty
                <div style="padding:20px;">
                    لا توجد قصص يومية حالياً
                </div>
            @endforelse

        </div>
    </div>
<div class="head">
            <h3>قصص الأطفال</h3>
            <div class="search-bar">
    <p>للحصول على قصص بطريقة أسرع قم بالبحث عن القصة وقم بفلترة النتائج حسب الفئة العمرية و النوع.</p>

    <form method="get" action="{{ route('home') }}" style="display:flex; gap:10px; align-items:center;">
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
    <button onclick="window.location.href='{{ route('home') }}'"
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
 <div class="story" >

            <nav class="categories">
                <a class="{{ request('category') ? '' : 'active' }}" href="{{ route('all_story') }}">كل القصص</a>

                @foreach($categories as $cat)
                    <a href="{{ route('all_story', ['category' => $cat->slug]) }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </nav>


   <div class="stories-container2">

    @if(request('q') && $homeStories->isEmpty())
        <div style="padding:20px;">
            لا توجد نتائج مطابقة
        </div>
    @endif

    @forelse($homeStories as $s)
        <a href="{{ route('story.show', $s->slug) }}"
           style="text-decoration:none; color:inherit;">

<div class="story-card" data-story-id="{{ $story->id }}">
                @if($s->cover)
                    <img src="{{ asset('storage/'.$s->cover) }}" alt="{{ $s->title }}">
                @else
                    <img src="{{ asset('img/default-story.png') }}" alt="{{ $s->title }}">
                @endif
   <div class="heart-btn" onclick="handleFavorite(event)">
                            <i class="far fa-heart"></i>
                        </div>                <div class="content">
                    <h2>{{ $s->title }}</h2>
                    <p>تناسب الأطفال من عمر {{ $s->age_group }}</p>
                </div>
            </div>

        </a>



                @empty
                    <div style="padding:20px;">لا توجد قصص حاليا</div>
                @endforelse
            </div>


            <div class="load-more">
                <a href="{{ route('all_story') }}">تحميل المزيد</a>
            </div>
        </div>


        <aside class="filter">
          <h5>
            <i class="fas fa-filter"></i>
            فلترة القصص
          </h5>
          <hr>

          <form method="get" action="{{ route('all_story') }}">
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


    <section id="team" class="temes">
        <h3>العاملون في الموقع</h3>

        <div class="team">
            @forelse($workers as $w)
                <div class="team-card">
                    <img src="{{ asset('storage/' . $w->avatar) }}" alt="{{ $w->name }}">
                    <h3>{{ $w->name }}</h3>
                    <p>{{ $w->bio ?? '' }}</p>
                </div>
            @empty
                <div style="padding:20px; text-align:center; width:100%;">لا يوجد عاملون حالياً</div>
            @endforelse
        </div>

        @if($workers->count() > 0)
            <div class="carousel-dots">
                @foreach($workers as $index => $w)
                    <span class="{{ $index == 0 ? 'active' : '' }}"></span>
                @endforeach
            </div>
        @endif
    </section>


    <section id="features" class="featurs">
        <h3>مميزات الموقع</h3>

        <div class="features">
            <div class="feature-card">
                <h4>تحتوي على آلاف من القصص</h4>
                <p>تحتوي المكتبة على آلاف من الكتب المتنوعة التي تراعي جميع الفئات العمرية</p>
            </div>
            <div class="feature-card">
                <h4>ميزة البحث عن طريق الصوت</h4>
                <p>تتوفر ميزة البحث عن طريق الصوت للأطفال دون الـ 6 سنوات</p>
            </div>
            <div class="feature-card">
                <h4>تحتوي على قصص للفئات العمرية المتنوعة</h4>
                <p>توفر المكتبة كتب متنوعة تراعي الفئات العمرية المختلفة ما بين 3-15 سنة</p>
            </div>
            <div class="feature-card">
                <h4>تحتوي على العديد من التصنيفات</h4>
                <p>تتوفر عدة تصنيفات منها الكتب الدينية، الثقافية، عملية، خيالية</p>
            </div>
        </div>
    </section>

</div>
{{-- مودل غير مسجل --}}
<div id="loginModal" class="modal-overlay">
    <div class="modal-box">
        <h3>انت غير مسجل</h3>
        <p >يجب تسجيل الدخول لإضافة القصة إلى المفضلة</p>

        <div class="modal-actions">
            <a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a>
            <button onclick="closeModal()" class="btn btn-light">إلغاء</button>
        </div>
    </div>
</div>
<div id="favoriteModal" class="modal-overlay">
    <div class="modal-box">
        <h3>إضافة للمفضلة</h3>
        <p>اختر مجلد لإضافة القصة</p>

        <div id="foldersContainer"></div>

        <div id="newFolderBox" style="display:none; margin-top:10px;">
            <input type="text" id="newFolderName" placeholder="اسم المجلد">
            <button onclick="addFolder()">إضافة</button>
        </div>

        <div class="modal-actions">
            <button onclick="closeModal()">إغلاق</button>
        </div>
    </div>
</div>



@endsection

@push('scripts')

@if(auth()->check())
<script>
    window.isLoggedIn = true
</script>
@else
<script>
    window.isLoggedIn = false
</script>
@endif
<script>
let selectedStoryId = null;

function handleFavorite(e) {
    e.preventDefault();
    e.stopPropagation();

    selectedStoryId = e.target.closest('.story-card').dataset.storyId;

    if (!window.isLoggedIn) {
        document.getElementById('loginModal').style.display = 'flex';
        return;
    }

    loadFolders();
    document.getElementById('favoriteModal').style.display = 'flex';
}

function loadFolders() {
    fetch('/favorites/folders')
        .then(res => res.json())
        .then(folders => {
            const box = document.getElementById('foldersContainer');
            box.innerHTML = '';

            folders.forEach(folder => {
                const btn = document.createElement('button');
                btn.className = 'folder-btn';
                btn.innerText = folder.name;
                btn.onclick = () => saveToFavorite(folder.id);
                box.appendChild(btn);
            });

            const addBtn = document.createElement('button');
            addBtn.className = 'folder-btn add';
            addBtn.innerText = '+';
            addBtn.onclick = showAddFolder;
            box.appendChild(addBtn);
        });
}

function saveToFavorite(folderId) {
    fetch('/favorites', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            story_id: selectedStoryId,
            folder_id: folderId
        })
    }).then(() => {
        closeModal();
        markHeart(selectedStoryId);
    });
}

function showAddFolder() {
    document.getElementById('newFolderBox').style.display = 'block';
}

function addFolder() {
    const name = document.getElementById('newFolderName').value.trim();
    if (!name) return;

    fetch('/favorites/folder', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ name })
    })
    .then(res => res.json())
    .then(() => {
        document.getElementById('newFolderName').value = '';
        document.getElementById('newFolderBox').style.display = 'none';
        loadFolders();
    });
}

function closeModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.getElementById('favoriteModal').style.display = 'none';
}

function markHeart(storyId) {
    const card = document.querySelector(`.story-card[data-story-id="${storyId}"]`);
    if (!card) return;

    const icon = card.querySelector('.heart-btn i');
    icon.classList.remove('far');
    icon.classList.add('fas');
}
</script>
 