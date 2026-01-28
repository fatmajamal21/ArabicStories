@extends('layouts.master')

@section('title', 'جميع القصص  ')

@section('content')
    <div class="header2"><img src="{{ asset('img/allstory.png') }}" alt="Header"></div>


    <div class="container">


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
                      <img src="{{ asset('img/s1.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                   <img src="{{ asset('img/s2.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                    <img src="{{ asset('img/s2.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                  <img src="{{ asset('img/s1.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                        <img src="{{ asset('img/s2.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>

                    <div class="story-card">
                       <img src="{{ asset('img/s1.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                   <img src="{{ asset('img/s2.jpg') }}" alt="">
                        <div class="heart-btn" onclick="toggleHeart(this)">
                            <i class="far fa-heart"></i>
                        </div>
                        <div class="content">
                            <h2>قصة الثعلب و الكلب</h2>
                            <p>تناسب الاطفال من عمر 3-5 سنوات</p>
                        </div>
                    </div>
                    <div class="story-card">
                  <img src="{{ asset('img/s1.jpg') }}" alt="">
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
<a href="{{ route('all_story') }}">تحميل المزيد</a>       
         </div>
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



    </div>
@endsection

@push('scripts')
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



    </script>
    @endpush

