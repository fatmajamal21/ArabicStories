@extends('layouts.master')

@section('title', 'مجلدات المفضلة')

@section('content')

    <div class="container">
        <div class="story_favorites story">
            <h3>المجلدات</h3>

            <div class="folders-container">
                <!-- العمود الأول: المجلدات -->
                <div class="folders-column">
                    <div class="folder" style="  background: #cbad16;">
                        <div class="folder-badge">12</div>
                        <div class="folder-name">قصصي</div>
                    </div>
                    <div class="folder" style="  background: #067641;">
                        <div class="folder-badge">8</div>
                        <div class="folder-name">مكتبتي</div>
                    </div>
                </div>

                <!-- العمود الثاني: الصورة -->
                <div class="favorites_img">
                    <img src="../img/favorites_folders.png" alt="">
                </div>
            </div>
        </div>



    </div>






    <script>

        // إضافة تأثيرات عند النقر على المجلدات
        document.querySelectorAll('.folder').forEach(folder => {
            folder.addEventListener('click', function () {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            });
        });
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