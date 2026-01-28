@extends('layouts.master')

@section('title', 'قصصي المفضلة')

@section('content')

    <div class="container">
        <div class="story_favorites story ">
            <h3>المفضلة</h3>
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



    </script>
</body>

</html>