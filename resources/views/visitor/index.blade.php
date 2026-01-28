@extends('layouts.master')

@section('title', 'الصفحة الرئيسية | Bookworm')

@section('content')

<div class="header">
        <img src="{{ asset('img/مستخدم - Copy (3).png') }}" alt="Header Image">
    </div>

    <div class="container">

        <div class="story">
            <h3>القصص اليومية</h3>
            <div class="stories-container1">

                <div class="story-card">
                    <img src="../img/s1.jpg" alt="">
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div>
                <div class="story-card">
                    <img src="../img/s2.jpg" alt="">
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div>
                <div class="story-card">
                    <img src="../img/s3.png" alt="">
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div>
                <div class="story-card">
                    <img src="../img/s4.png" alt="">>
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div>
                <div class="story-card">
                    <img src="../img/s5.jpg" alt="">
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div>
                <!-- <div class="story-card">
                    <img src="../img/قصة1.jpg" alt="">
                    <div class="heart-btn" onclick="toggleHeart(this)">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content">
                        <h2>قصة الثعلب و الكلب</h2>
                        <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                    </div>
                </div> -->

            </div>


        </div>


        <!-- رأس الصفحة -->
        <header>
            <div class="head">
                <h3>قصص الأطفال </h3>
                <div class="search-bar">

                    <p>للحصول على قصص بطريقة أسرع قم بالبحث عن القصة وقم بفلترة النتائج حسب الفئة العمرية و النوع.</p>

                    <input type="text" placeholder="اكتب هنا ...">
                    <button
                        style="padding: 10px 12px; border: none; background: #4CAF50; color: #fff; border-radius: 8px; cursor: pointer; display: flex; align-items: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M10 2a8 8 0 105.293 14.707l5.387 5.387 1.414-1.414-5.387-5.387A8 8 0 0010 2zm0 2a6 6 0 110 12 6 6 0 010-12z" />
                        </svg>
                    </button>
                    <button
                        style="padding: 10px; border: none; background: #2196F3; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" viewBox="0 0 24 24">
                            <path
                                d="M12 14a3 3 0 003-3V5a3 3 0 00-6 0v6a3 3 0 003 3zm5-3a5 5 0 01-10 0H5a7 7 0 0014 0h-2zM12 17v4h-2v2h6v-2h-2v-4h-2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        <!-- قسم القصص -->
        <section class="stories">
            <div class="story">

                <nav class="categories ">
                    <a class="active">كل القصص</a>
                    <a>قصص أخلاقية</a>
                    <a>قصص علمية</a>
                    <a>قصص دينية</a>
                    <a>قصص خيالية</a>
                </nav>

                <div class="stories-container2">

                    <div class="story-card">
                        <img src="../img/s1.jpg" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s2.jpg" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s3.png" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s4.png" alt="">>
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s5.jpg" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>

                    <div class="story-card">
                        <img src="../img/s1.jpg" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s2.jpg" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="../img/s3.png" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>


                </div>
                <div class="load-more">
                    <!-- هناااا المفرووو مشتركةةة افضل -->
<a href="all_story">تحميل المزيد</a>                </div>
            </div>


            <!-- الفلترة -->
            <aside class="filter">
                <h5>
                    <i class="fas fa-filter"></i>
                    فلترة القصص
                </h5>
                <hr>
                <div class="filter-group">
                    <h4>حسب العمر</h4>
                    <label><input type="checkbox"> من 3-5 سنوات</label>
                    <label><input type="checkbox"> من 5-7 سنوات</label>
                    <label><input type="checkbox"> من 7-9 سنوات</label>
                    <label><input type="checkbox"> من 9-12 سنة</label>
                    <label><input type="checkbox"> من 12-15 سنة</label>
                </div>
                <div class="filter-group">
                    <h4>حسب الفئة</h4>
                    <label><input type="checkbox"> قصص ثقافية</label>
                    <label><input type="checkbox"> قصص علمية</label>
                    <label><input type="checkbox"> قصص أخلاقية</label>
                    <label><input type="checkbox"> قصص اجتماعية</label>
                    <label><input type="checkbox"> قصص دينية</label>
                </div>
<img src="{{ asset('img/fliter.png') }}" alt="Filter Icon">            
            </aside>
        </section>


<section id="team" class="temes">
    <h3>العاملون في الموقع</h3>

    <div class="team">
        @forelse($workers as $w)
            <div class="team-card">
                @if($w->avatar_base64 && $w->avatar_mime)
                    <img
                        src="data:{{ $w->avatar_mime }};base64,{{ $w->avatar_base64 }}"
                        alt="{{ $w->name }}">
                @else
                    <div style="width:110px; height:110px; border-radius:50%; background:#e5e7eb; display:flex; align-items:center; justify-content:center; font-weight:700; margin:0 auto;">
                        {{ mb_substr($w->name, 0, 1) }}
                    </div>
                @endif

                <h3>{{ $w->name }}</h3>
                <p>{{ $w->bio ?? '' }}</p>
            </div>
        @empty
            <div style="padding:20px; color:#6b7280;">لا يوجد عاملون حاليا</div>
        @endforelse
    </div>
</section>



        <section id="features" class="featurs">
            <h3> مميزات الموقع</h3>

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


@endsection

@push('scripts')
<script>
        // دالة لتغيير لون القلب
        function toggleHeart(element) {
            const heartIcon = element.querySelector('i');
            if (heartIcon.classList.contains('far')) {
                heartIcon.classList.remove('far');
                heartIcon.classList.add('fas');
            } else {
                heartIcon.classList.remove('fas');
                heartIcon.classList.add('far');
            }
        }

        // جعل التنقل سلساً عند النقر على الروابط
        document.querySelectorAll('nav a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            });
        });

        // إضافة تأثير النشط للروابط عند التمرير
        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-links a');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;

                if (pageYOffset >= (sectionTop - 100)) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('active');
                }
            });
        });
    </script>
@endpush





