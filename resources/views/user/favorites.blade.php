<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> صفحة القصة | المستخدم </title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/styleVisitor.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- nav-->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <div class="logo-text"><img src="../img/logo.png" alt=""></div>
            </div>

            <ul class="nav-links">
                <li><a href="../user/index.html" class="active">الرئيسية</a></li>
                <li><a href="#about">من نحن</a></li>
                <li><a href="#stories">قصص الأطفال</a></li>
                <li><a href="#team">العاملون في الموقع</a></li>
                <li><a href="#features">مميزات المنصة</a></li>
            </ul>

            <div class="user-section">
                <a href="#" class="auth-btn signout">تسجيل الخروج</a>

                <div class="user-profile">
                    <img src="../img/user - Copy.png" alt="صورة المستخدم" class="user-img">


                    <div class="dropdown-menu">
                        <a href="../user/account_settings.html"> إعدادات الحساب</a>
                        <a href="../user/favorites.html">المفضلة</a>
                        <!-- <a href="#"><i class="fas fa-user"></i>الملف الشخصي</a> -->
                        <!-- <a href="#"><i class="fas fa-cog"></i> إعدادات الحساب</a> -->
                        <!-- <a href="#"><i class="fas fa-book"></i>المفضلة</a> -->
                        <!-- <a href="#"><i class="fas fa-history"></i>السجل</a> -->
                        <!-- <a href="#"><i class="fas fa-question-circle"></i>المساعدة</a> -->
                    </div>
                </div>
            </div>

            <!-- <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div> -->
        </div>
    </nav>


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