@extends('layouts.master')

@section('title', 'إنشاء حساب ')

@section('content')
    <div class="login-container">
        <div class="image-section">
            <img src="../img/تسجيل.png" alt="صورة تسجيل الدخول">
        </div>

        <div class="form-section">
            <img src="../img/logo.png" alt="Logo" class="logo">

            <h2>تسجيل حساب جديد</h2>

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
                        <i class="fas fa-eye input-icon2"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label for="confirm-password">تأكيد كلمة المرور</label>
                <div class="password-container">
                    <input type="password" class="form-control" id="confirm-password" value="********">
                    <button class="toggle-password" type="button">
                        <i class="fas fa-eye input-icon2"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="login-btn">تسجيل</button>

            <div class="register-link">
                <label>هل لديك حساب؟</label>
                <a href="../Visitor/login.html">تسجيل الدخول</a>
            </div>

            <div class="social-login">
                <h3>التسجيل من خلال</h3>
                <div class="social-icons">
                    <div class="social-icon google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="social-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection