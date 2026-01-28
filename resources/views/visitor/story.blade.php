@extends('layouts.master')

@section('title', 'عرض القصة')

@section('content')

    <!-- نموذج تشغيل الصوت -->
    <div class="audio-modal" id="audio-modal">
        <div class="audio-modal-content">
            <!-- زر إغلاق -->
            <button class="close-modal" id="close-modal">&times;</button>

            <!-- صورة الغلاف -->
            <div class="story-cover-audio">
                <img src="../img/s1.jpg" alt="غلاف القصة">
            </div>

            <!-- اسم القصة -->
            <!-- <h3 class="story-title">الطاووس المغرور</h3> -->
            <div class="audio-controls-wrapper">

                <!-- الوقت -->
                <div class="time-display">
                    <span id="current-time">00:00</span> /
                    <span id="duration">3:19</span>
                </div>

                <!-- شريط التقدم -->
                <div class="progress-container" id="progress-container">
                    <div class="progress-bar" id="progress-bar"></div>
                </div>

                <!-- أزرار التحكم -->
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



            <audio id="story-audio">
                <source src="audio/story.mp3" type="audio/mpeg">
                متصفحك لا يدعم تشغيل الصوتيات.
            </audio>
        </div>
    </div>

    <div class="container">


        <div class="story-page">
            <!-- الغلاف -->
            <div class="story-cover">
                <img src="../img/s3.png" alt="غلاف القصة">
                <div class="heart-btn"><i>♡</i></div>
            </div>

            <!-- التفاصيل -->
            <div class="story-details">
                <div class="date">17/5/2023</div>
                <h1>الطاووس المغرور</h1>
                <p>قصة قصيرة للأطفال تستهدف الأطفال من عمر 3-6 سنوات. تعزز فيهم مجموعة من القيم الأخلاقية والتربوية
                    التي تساهم في تفكير ونمو الطفل بطريقة سليمة.</p>

                <div class="author-box">
                    <img src="../img/user.png" alt="المؤلف">
                    <div class="author-info">
                        <h4>ليلى صايا</h4>
                        <span>كاتبة سورية وعضو اتحاد الكتاب العرب</span>
                    </div>
                </div>

                <p>سارة طه قامت بتدقيق النصوص المنتجة، وإجراء بعض التعديلات عليها وقامت بتجريد النص من كافة الأخطاء
                    الإملائية واللغوية والقواعدية كذلك.</p>
                <div class="tetel">
                    <p> نفش الطاووس المغرور ريشه وقال للحيوانات "أنا أجمل الحيوانات ولن أرضى أن تكونوا
                        أصدقاء لي". لكن الطاووس مرّ بحادثة جعلته يتراجع عن موقفه تجاه أصدقائه الذين لم يتخلوا عنه.</p>
                </div>
                <div class="story-actions">
                    <a href="#" class="btn read">قراءة القصة 📖</a>
                    <a href="#" class="btn listen" id="listen-btn">الاستماع للقصة 🎧</a>
                </div>
            </div>
        </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // الحصول على جميع روابط القائمة
            const navLinks = document.querySelectorAll('.nav-links a');

            // إضافة مستمع حدث لكل رابط
            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    // إزالة الصنف النشط من جميع الروابط
                    navLinks.forEach(item => item.classList.remove('active'));

                    // إضافة الصنف النشط للرابط المختار
                    this.classList.add('active');

                    // إخفاء جميع محتويات الصفحات
                    const allContents = document.querySelectorAll('.content');
                    allContents.forEach(content => content.classList.remove('active'));

                    // إظهار المحتوى المناسب حسب الرابط
                    const target = this.getAttribute('href').substring(1);
                    const targetContent = document.getElementById(`${target}-content`);

                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });

        // عناصر واجهة المستخدم
        const listenBtn = document.getElementById('listen-btn');
        const audioModal = document.getElementById('audio-modal');
        const closeModal = document.getElementById('close-modal');
        const playBtn = document.getElementById('play-btn');
        const playIcon = document.getElementById('play-icon');
        const rewindBtn = document.getElementById('rewind-btn');
        const forwardBtn = document.getElementById('forward-btn');
        const volumeSlider = document.getElementById('volume-slider');
        const progressContainer = document.getElementById('progress-container');
        const progressBar = document.getElementById('progress-bar');
        const currentTimeEl = document.getElementById('current-time');
        const durationEl = document.getElementById('duration');
        const audio = document.getElementById('story-audio');

        // مصدر الصوت (يمكن تغييره حسب القصة)
        audio.src = "path/to/your/audio-file.mp3"; // يجب استبدال هذا بمصدر الصوت الفعلي

        // فتح النموذج عند النقر على زر الاستماع
        listenBtn.addEventListener('click', function (e) {
            e.preventDefault();
            audioModal.classList.add('active');
        });

        // إغلاق النموذج
        closeModal.addEventListener('click', function () {
            audioModal.classList.remove('active');
            audio.pause();
        });

        // إغلاق النموذج بالنقر خارج المحتوى
        window.addEventListener('click', function (e) {
            if (e.target === audioModal) {
                audioModal.classList.remove('active');
                audio.pause();
            }
        });

        // تشغيل/إيقاف الصوت
        function togglePlay() {
            if (audio.paused) {
                audio.play();
                playIcon.classList.remove('fa-play');
                playIcon.classList.add('fa-pause');
            } else {
                audio.pause();
                playIcon.classList.remove('fa-pause');
                playIcon.classList.add('fa-play');
            }
        }

        playBtn.addEventListener('click', togglePlay);

        // تحديث شريط التقدم
        audio.addEventListener('timeupdate', function () {
            const currentTime = audio.currentTime;
            const duration = audio.duration;
            const progressPercent = (currentTime / duration) * 100;

            progressBar.style.width = `${progressPercent}%`;

            // تنسيق الوقت
            currentTimeEl.textContent = formatTime(currentTime);

            if (!isNaN(duration)) {
                durationEl.textContent = formatTime(duration);
            }
        });

        // تخطي إلى جزء معين من الصوت
        progressContainer.addEventListener('click', function (e) {
            const width = this.clientWidth;
            const clickX = e.offsetX;
            const duration = audio.duration;

            audio.currentTime = (clickX / width) * duration;
        });

        // التحكم في مستوى الصوت
        volumeSlider.addEventListener('input', function () {
            audio.volume = this.value;
        });

        // إعادة 10 ثوانٍ
        rewindBtn.addEventListener('click', function () {
            audio.currentTime -= 10;
        });

        // تقدم 10 ثوانٍ
        forwardBtn.addEventListener('click', function () {
            audio.currentTime += 10;
        });

        // عند انتهاء الصوت
        audio.addEventListener('ended', function () {
            playIcon.classList.remove('fa-pause');
            playIcon.classList.add('fa-play');
            audio.currentTime = 0;
        });

        // دالة مساعدة لتنسيق الوقت
        function formatTime(seconds) {
            let minutes = Math.floor(seconds / 60);
            seconds = Math.floor(seconds % 60);
            seconds = seconds < 10 ? `0${seconds}` : seconds;
            return `${minutes}:${seconds}`;
        }

        // التنقل بين الصفحات (الكود الأصلي)
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-links a');

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    navLinks.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');

                    const allContents = document.querySelectorAll('.content');
                    allContents.forEach(content => content.classList.remove('active'));

                    const target = this.getAttribute('href').substring(1);
                    const targetContent = document.getElementById(`${target}-content`);

                    if (targetContent) {
                        targetContent.classList.add('active');
                    }
                });
            });
        });

    </script>
@endsection