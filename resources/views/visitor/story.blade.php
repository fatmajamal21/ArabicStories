{{-- resources/views/visitor/story.blade.php --}}
@extends('layouts.master')

@section('title', $story->title . ' | Bookworm')

@section('content')

<style>
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
}.modal-overlay {
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
.story-modal{
    position:fixed;
    inset:0;
    display:none;
    z-index:9999;
}
.story-modal.is-open{
    display:block;
}
.story-modal-overlay{
    position:absolute;
    inset:0;
    background:rgba(0,0,0,.45);
}
.story-modal-content{
    position:relative;
    width:min(720px, 92vw);
    max-height:85vh;
    overflow:auto;
    background:#fff;
    border-radius:14px;
    padding:18px 18px 16px;
    margin:6vh auto 0;
}
.story-modal-close{
    position:absolute;
    top:10px;
    left:10px;
    width:36px;
    height:36px;
    border:0;
    border-radius:10px;
    background:#f3f4f6;
    font-size:22px;
    cursor:pointer;
}
.story-modal-title{
    margin:0 0 10px;
    font-size:20px;
}
.story-modal-body{
    line-height:1.9;
    font-size:15px;
    color:#111827;
    white-space:pre-wrap;
}

.author-info h4{
    margin:0;
}
.author-info p{
    margin:6px 0 0;
    font-size:13px;
    color:#6b7280;
}
.audio-modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.audio-modal.active {
    display: flex;
}

.audio-modal-content {
    background: #fff;
    width: 90%;
    max-width: 400px;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    position: relative;
}

.close-modal {
    position: absolute;
    top: 10px;
    left: 10px;
    background: none;
    border: none;
    font-size: 26px;
    cursor: pointer;
}

.story-cover-audio img {
    width: 100%;
    border-radius: 12px;
    margin-bottom: 15px;
}

.time-display {
    font-size: 14px;
    margin-bottom: 8px;
}

.progress-container {
    width: 100%;
    height: 6px;
    background: #eee;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 15px;
}

.progress-bar {
    height: 100%;
    width: 0%;
    background: #4caf50;
    border-radius: 10px;
}

.audio-controls {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.control-btn {
    background: none;
    border: none;
    font-size: 22px;
    cursor: pointer;
}

.play-btn {
    font-size: 26px;
}

</style>

<div class="container">
    <div class="story-page">

        <div class="story-cover">
            @if($story->cover)
                <img src="{{ asset('storage/'.$story->cover) }}" alt="{{ $story->title }}">
            @else
                <img src="{{ asset('img/default-story.png') }}" alt="{{ $story->title }}">
            @endif

          <div class="heart-btn" onclick="handleFavorite(event)">
                            <i class="far fa-heart"></i>
                        </div>
        </div>

        <div class="story-details">
            <div class="date">
                {{ ($story->published_at ?? $story->created_at)->format('Y/m/d') }}
            </div>

            <h1>{{ $story->title }}</h1>

            @if($story->summary)
                <p>{{ $story->summary }}</p>
            @else
                <p>تناسب الأطفال من عمر {{ $story->age_group }}</p>
            @endif

            <div class="author-box">
                @php
                    $writer = $story->writer;
                    $writerName = $writer->name ?? 'غير معروف';
                    $writerBio  = $writer->bio ?? '';
                    $writerAvatar = $writer->avatar ?? null;
                @endphp

                @if($writerAvatar)
                    <img src="{{ asset('storage/'.$writerAvatar) }}" alt="{{ $writerName }}">
                @else
                    <img src="{{ asset('img/user.png') }}" alt="{{ $writerName }}">
                @endif

                <div class="author-info">
                    <h4>{{ $writerName }}</h4>
                    <p>{{ $writerBio }}</p>
                </div>
            </div>

            <div class="tetel">
                <p style="margin:0; line-height:1.9;">
                    {{ \Illuminate\Support\Str::limit($story->content, 220, '...') }}
                </p>
            </div>

            <div class="story-actions">
                <a href="#" class="btn read" onclick="openStoryModal(event)">
                    قراءة القصة
                </a>

                @if($story->audio)
                    <a href="#" class="btn listen" id="listen-btn" onclick="openAudioModal()">الاستماع للقصة 🎧</a>
                @else
                    <a href="#" class="btn listen" style="pointer-events:none; opacity:.5;">لا يوجد صوت</a>
                @endif
            </div>
        </div>

    </div>
</div>

<div class="story-modal" id="story-modal">
    <div class="story-modal-overlay" onclick="closeStoryModal()"></div>

    <div class="story-modal-content" dir="rtl">
        <button class="story-modal-close" type="button" onclick="closeStoryModal()">×</button>
        <h3 class="story-modal-title">{{ $story->title }}</h3>

        <div class="story-modal-body">
            {{ $story->content }}
        </div>
    </div>
</div>

<div class="audio-modal" id="audio-modal">
    <div class="audio-modal-content">
        <button class="close-modal" id="close-modal">&times;</button>

        <div class="story-cover-audio">
            @if($story->cover)
                <img src="{{ asset('storage/'.$story->cover) }}" alt="{{ $story->title }}">
            @else
                <img src="{{ asset('img/default-story.png') }}" alt="{{ $story->title }}">
            @endif
        </div>

        <div class="audio-controls-wrapper">
            <div class="time-display">
                <span id="current-time">00:00</span> /
                <span id="duration">00:00</span>
            </div>

            <div class="progress-container" id="progress-container">
                <div class="progress-bar" id="progress-bar"></div>
            </div>

            <div class="audio-controls">
                <button class="control-btn" id="forward-btn">
                    <i class="fas fa-forward-step"></i>
                </button>

                <button class="control-btn play-btn" id="play-btn">
                    <i class="fas fa-play" id="play-icon"></i>
                </button>

                <button class="control-btn" id="rewind-btn">
                    <i class="fas fa-backward-step"></i>
                </button>
            </div>
        </div>

        <audio id="story-audio" preload="metadata">
            @if($story->audio)
                <source src="{{ asset('storage/'.$story->audio) }}" type="audio/mpeg">
            @endif
            متصفحك لا يدعم تشغيل الصوتيات.
        </audio>
    </div>
</div>
{{-- مودل غير مسجل --}}
<div id="loginModal" class="modal-overlay">
    <div class="modal-box">
        <h3>انت غير مسجل</h3>
        <p>يجب تسجيل الدخول لإضافة القصة إلى المفضلة</p>

        <div class="modal-actions">
            <a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a>
            <button onclick="closeModal()" class="btn btn-light">إلغاء</button>
        </div>
    </div>
</div>

{{-- مودل المفضلة --}}
<div id="favoriteModal" class="modal-overlay">
    <div class="modal-box">
        <h3>إضافة للمفضلة</h3>
        <p>اختر مجلد لإضافة القصة</p>

        <div class="folders">
            <button class="folder-btn">قصصي</button>
            <button class="folder-btn">مكتبتي</button>
            <button class="folder-btn add">+</button>
        </div>

        <div class="modal-actions">
            <button onclick="closeModal()" class="btn btn-light">إغلاق</button>
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
function handleFavorite(e) {
    e.preventDefault()
    e.stopPropagation()

    if (window.isLoggedIn === false) {
        document.getElementById('loginModal').style.display = 'flex'
    } else {
        document.getElementById('favoriteModal').style.display = 'flex'
    }
}

function closeModal() {
    document.getElementById('loginModal').style.display = 'none'
    document.getElementById('favoriteModal').style.display = 'none'
}

/* =========================
   Story Modal (قراءة القصة)
========================= */
function openStoryModal(e){
    e.preventDefault();
    var modal = document.getElementById('story-modal');
    if(!modal) return;
    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
}

function closeStoryModal(){
    var modal = document.getElementById('story-modal');
    if(!modal) return;
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
}

/* إغلاق بالمفتاح ESC */
document.addEventListener('keydown', function(e){
    if(e.key === 'Escape'){
        closeStoryModal();
        var audioModal = document.getElementById('audio-modal');
        if(audioModal) audioModal.classList.remove('active');
    }
});

/* =========================
   Heart Toggle (إعجاب)
========================= */
function toggleHeart(element) {
    var heartIcon = element.querySelector('i');
    if (!heartIcon) return;

    if (heartIcon.classList.contains('far')) {
        heartIcon.classList.remove('far');
        heartIcon.classList.add('fas');
    } else {
        heartIcon.classList.remove('fas');
        heartIcon.classList.add('far');
    }
}

/* =========================
   Audio Modal + Player
========================= */
document.addEventListener('DOMContentLoaded', function () {

    var listenBtn = document.getElementById('listen-btn');
    var audioModal = document.getElementById('audio-modal');
    var closeModal = document.getElementById('close-modal');

    var playBtn = document.getElementById('play-btn');
    var playIcon = document.getElementById('play-icon');

    var rewindBtn = document.getElementById('rewind-btn');
    var forwardBtn = document.getElementById('forward-btn');

    var progressContainer = document.getElementById('progress-container');
    var progressBar = document.getElementById('progress-bar');

    var currentTimeEl = document.getElementById('current-time');
    var durationEl = document.getElementById('duration');

    var audio = document.getElementById('story-audio');
    var source = audio ? audio.querySelector('source') : null;

    /* فتح مودال الصوت */
    if (listenBtn && audioModal && audio && source && source.getAttribute('src')) {
        listenBtn.addEventListener('click', function (e) {
            e.preventDefault();
            audioModal.classList.add('active');
            audio.load();
        });
    }

    /* إغلاق مودال الصوت */
    if (closeModal && audioModal && audio) {
        closeModal.addEventListener('click', function () {
            audioModal.classList.remove('active');
            audio.pause();
        });
    }

    /* إغلاق عند الضغط خارج المحتوى */
    window.addEventListener('click', function (e) {
        if (e.target === audioModal) {
            audioModal.classList.remove('active');
            if (audio) audio.pause();
        }
    });

    /* تشغيل / إيقاف */
    function togglePlay() {
        if (!audio) return;

        if (audio.paused) {
            audio.play();
            if (playIcon) {
                playIcon.classList.remove('fa-play');
                playIcon.classList.add('fa-pause');
            }
        } else {
            audio.pause();
            if (playIcon) {
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
            }
        }
    }

    if (playBtn) playBtn.addEventListener('click', togglePlay);

    /* تنسيق الوقت */
    function formatTime(seconds) {
        seconds = Math.floor(seconds || 0);
        var minutes = Math.floor(seconds / 60);
        var s = seconds % 60;
        return minutes + ':' + (s < 10 ? '0' + s : s);
    }

    /* تحميل المدة */
    if (audio) {
        audio.addEventListener('loadedmetadata', function () {
            if (!isNaN(audio.duration) && durationEl) {
                durationEl.textContent = formatTime(audio.duration);
            }
        });

        /* تحديث التقدم */
        audio.addEventListener('timeupdate', function () {
            var currentTime = audio.currentTime || 0;
            var duration = audio.duration || 0;

            if (currentTimeEl) currentTimeEl.textContent = formatTime(currentTime);

            if (duration > 0 && progressBar) {
                var progressPercent = (currentTime / duration) * 100;
                progressBar.style.width = progressPercent + '%';
            }
        });

        /* عند انتهاء الصوت */
        audio.addEventListener('ended', function () {
            if (playIcon) {
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
            }
            audio.currentTime = 0;
            if (progressBar) progressBar.style.width = '0%';
        });
    }

    /* التحكم بشريط التقدم */
    if (progressContainer && audio) {
        progressContainer.addEventListener('click', function (e) {
            var width = progressContainer.clientWidth;
            var clickX = e.offsetX;
            var duration = audio.duration || 0;
            if (duration > 0) {
                audio.currentTime = (clickX / width) * duration;
            }
        });
    }

    /* تقديم / ترجيع */
    if (rewindBtn && audio) {
        rewindBtn.addEventListener('click', function () {
            audio.currentTime -= 10;
        });
    }

    if (forwardBtn && audio) {
        forwardBtn.addEventListener('click', function () {
            audio.currentTime += 10;
        });
    }
});
</script>

@endpush












