@extends('layouts.master')

@section('title', ' كلمة السر ')

@section('content')
    <div class="login-container">
        <div class="image-section">
            <img src="../img/تعيين كلمة مرور - Copy.png" alt="صورة تسجيل الدخول">
        </div>

        <div class="form-section">
            <img src="../img/logo.png" alt="Logo" class="logo">

            <h2> تعيين كلمة مرور جديدة</h2>

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

            <button type="submit" class="login-btn">تأكيد</button>

        </div>
        <div class="image-section">
            <img src="../img/تعيين كلمة مرور - Copy (2).png" alt="صورة تسجيل الدخول">
        </div>

    </div>

@endsection