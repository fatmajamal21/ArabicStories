@extends('layouts.master')

@section('title', 'نسيت كلمة السر')

@section('content')
    <div class="login-container">
        <div class="image-section">
            <img src="../img/تعيين كلمة مرور - Copy.png" alt="صورة نسيت كلمة السر">
        </div>

        <div class="form-section">
            <img src="../img/logo.png" alt="Logo" class="logo">

            <h2>نسيت كلمة السر</h2>

            <p class="form-text">
                أدخل البريد الإلكتروني المرتبط بحسابك.
                سيتم إرسال رابط إعادة تعيين كلمة السر.
            </p>

          <form method="POST" action="{{ route('password.email') }}">
    @csrf

                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        placeholder="example@email.com"
                        required
                    >
                </div>

                <button type="submit" class="login-btn">
                    إرسال رابط إعادة التعيين
                </button>

                <div class="back-link">
                    <a href="{{ route('login') }}">العودة لتسجيل الدخول</a>
                </div>
            </form>
        </div>

        <div class="image-section">
            <img src="../img/تعيين كلمة مرور - Copy (2).png" alt="صورة نسيت كلمة السر">
        </div>
    </div>
@endsection
