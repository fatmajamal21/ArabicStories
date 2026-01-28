<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> لمستخدم | إعدادات الحساب</title>
    <link rel="stylesheet" href="../CSS/styleVisitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <!-- شريط التنقل -->
    <nav>
        <div class="nav-container">
            <div class="logo">
                <div class="logo-text"><img src="../img/logo.png" alt=""></div>
            </div>

            <ul class="nav-links">
                <li><a href="#home" class="active">الرئيسية</a></li>
                <li><a href="#about">من نحن</a></li>
                <li><a href="#stories">قصص الأطفال</a></li>
                <li><a href="#team">العاملون في الموقع</a></li>
                <li><a href="#features">مميزات المنصة</a></li>
            </ul>

            <div class="user-section">
                <a href="#" class="auth-btn Login">تسجيل الدخول</a>
                <a href="#" class="auth-btn register">تسجيل </a>


            </div>

            <!-- <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div> -->
        </div>
    </nav>
    <div class="container_account">
        <div class="header_account">
            <a href="../user/edit_account.html" class="edit-btn" title="تعديل الصفحة">
                <i class="fas fa-pen"></i>
            </a>

            <!-- <h1>إعدادات الحساب</h1> -->
            <div class="profile">
                <div class="profile-img">
                    <img src="../img/user - Copy.png" alt="صورة المستخدم">
                </div>
            </div>

        </div>

        <div class="form-container">
            <div class="form-group">
                <label for="email">الإيميل</label>
                <input type="email" class="form-control" id="email" value="marie@gmail.com" readonly>
                <i class="fas fa-envelope input-icon1"></i>
            </div>

            <div class="form-group">
                <label for="username">اسم المستخدم</label>
                <input type="text" class="form-control" id="username" value="محمد أبهم">
                <i class="fas fa-user input-icon1"></i>
            </div>

            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <div class="password-container">
                    <input type="password" class="form-control" id="password" value="********">
                    <button class="toggle-password" type="button">
                        <i class="input-icon2 fas fa-eye"></i>
                    </button>
                </div>
            </div>




        </div>

    </div>
    <footer class="footer">
        <div class="footer-container">

            <!-- العمود الأول (اللوجو) -->
            <div class="footer-logo">
                <img src="../img/logo.png" alt="Book Worm Logo">
            </div>

            <!-- العمود الثاني -->
            <div class="footer-col">
                <ul>
                    <li><a href="#">الرئيسية</a></li>
                    <li><a href="#">من نحن</a></li>
                    <li><a href="#">تواصل معنا</a></li>
                </ul>
            </div>

            <!-- العمود الثالث -->
            <div class="footer-col">
                <ul>
                    <li><a href="#">العاملون في الموقع</a></li>
                    <li><a href="#">ميزات المنصة</a></li>
                    <li><a href="#">قصص الأطفال</a></li>
                </ul>
            </div>

            <!-- العمود الرابع -->
            <div class="footer-col">
                <ul>
                    <li><a href="#">قصص أخلاقية</a></li>
                    <li><a href="#">قصص علمية</a></li>
                    <li><a href="#">قصص ثقافة</a></li>

                </ul>
            </div>
            <!-- العمود الخامس -->
            <div class="footer-col">
                <ul>

                    <li><a href="#">قصص دينية</a></li>
                    <li><a href="#">قصص صوتية</a></li>
                    <li><a href="#">قصص خيالية</a></li>
                </ul>
            </div>

            <!-- العمود الخامس -->
            <div class="footer-col">
                <h4>تواصل معنا</h4>
                <p><i class="fas fa-phone"></i> +966 123456789</p>
                <p><i class="fas fa-envelope"></i> Bookworm@gmail.com</p>
            </div>

        </div>

        <!-- الخط الفاصل -->
        <hr class="footer-line">

        <!-- السوشيال ميديا -->
        <div class="footer-social">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
        </div>
    </footer>

    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     const togglePassword = document.querySelector('.toggle-password');
        //     const passwordInput = document.querySelector('#password');

        //     togglePassword.addEventListener('click', function () {
        //         if (passwordInput.type === 'password') {
        //             passwordInput.type = 'text';
        //             togglePassword.textContent = 'إخفاء';
        //         } else {
        //             passwordInput.type = 'password';
        //             togglePassword.textContent = 'إظهار';
        //         }
        //     });
        // });
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('.toggle-password i');
            const passwordInput = document.querySelector('#password');

            document.querySelector('.toggle-password').addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    togglePassword.classList.remove('fa-eye');
                    togglePassword.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    togglePassword.classList.remove('fa-eye-slash');
                    togglePassword.classList.add('fa-eye');
                }
            });
        });

    </script>
</body>

</html>