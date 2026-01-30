@extends('layouts.master')

@section('title', 'تواصل معنا  ')

@section('content')

    <div class="container">
        <div class="story-page">
            <div class="about">
                <div class="about1">
                    <h3> تواصل معنا </h3>
                </div>
                <img src="../img/a.png" alt="صورة تواصل معنا">
            </div>

            <!-- قسم تواصل معنا -->
            <div class="contact-container">
                <!-- نموذج الاتصال -->
                <div class="contact-form">
                    <img src="../img/logo.png" alt="">
                    <form>
                        <div class="form-group">
                            <label for="email">الإيميل </label>
                            <input type="email" id="email" placeholder="Mohammed910@gmail.com">
                        </div>

                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" id="name" placeholder="محمد خالد خليل">
                        </div>

                        <div class="form-group">
                            <label for="address">العنوان</label>
                            <input type="text" id="address" placeholder="أكتب هنا">
                        </div>

                        <div class="form-group">
                            <label for="message">محتوى الرسالة</label>
                            <textarea id="message" placeholder="أكتب هنا" style="height: 125px;"></textarea>
                        </div>

                        <button type="submit" class="send-btn">أرسل</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        // كود JavaScript الأصلي الذي قمت بتوفيره
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