@extends('layouts.master')
    <title>تسجيل حساب جديد</title>

@section('title', 'تسجيل حساب جديد    | Bookworm')

@section('content')
    <div class="login-container">
        <div class="image-section">
            <img src="../img/أدخل%20كود%20التحقق.png" alt="صورة كود التحقق">
        </div>

        <div class="form-section">
            <img src="../img/logo.png" alt="Logo" class="logo">

            <h2>نسيت كلمة المرور؟</h2>

            <p class="instruction">
                لقد تم إرسال كود التحقق إلى الإيميل الذي تم التسجيل منه في هذه المنصة.
                <!-- <p class="email-notive">mar@gmail.com</p> -->
                تحقق من الإيميل وأدخل رمز التحقق.
            </p>



            <div class="code-inputs">
                <input type="text" class="code-input" maxlength="1" pattern="[0-9]*" inputmode="numeric"
                    autocomplete="one-time-code">
                <input type="text" class="code-input" maxlength="1" pattern="[0-9]*" inputmode="numeric">
                <input type="text" class="code-input" maxlength="1" pattern="[0-9]*" inputmode="numeric">
                <input type="text" class="code-input" maxlength="1" pattern="[0-9]*" inputmode="numeric">
                <input type="text" class="code-input" maxlength="1" pattern="[0-9]*" inputmode="numeric">
            </div>

            <button type="submit" class="confirm-btn">تأكيد</button>

            <div class="resend-code">
                <p>لم تستلم الرمز؟ <a href="#">إعادة إرسال</a></p>
            </div>
        </div>
        <div class="image-section">
            <img src="../img/أدخل كود التحقق - Copy.png" alt="صورة كود التحقق">
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inputs = document.querySelectorAll('.code-input');

            // التركيز على أول حقل عند تحميل الصفحة
            inputs[0].focus();

            // نقل التركيز تلقائياً بين الحقول
            inputs.forEach((input, index) => {
                input.addEventListener('input', function () {
                    if (this.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function (e) {
                    if (e.key === 'Backspace' && this.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });
    </script>
@endsection