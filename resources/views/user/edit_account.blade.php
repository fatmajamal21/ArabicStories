@extends('layouts.master')

@section('title', 'تعديل بيانات الحساب')

@section('content')
    <div class="container_account">
        <div class="header_account">

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



            <button class="btn">حفظ </button>
        </div>

    </div>
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