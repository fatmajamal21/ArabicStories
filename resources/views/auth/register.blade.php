@extends('layouts.master')

@section('title', 'إنشاء حساب')

@section('content')
<div class="login-container">

    <div class="image-section">
        <img src="{{ asset('img/تسجيل.png') }}" alt="صورة التسجيل">
    </div>

    <div class="form-section">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">

        <h2>تسجيل حساب جديد</h2>

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

    {{-- الصورة --}}
    {{-- <div class="form-group">
        <label>الصورة الشخصية</label>
        <input type="file" name="avatar" class="form-control">
        @error('avatar') <small class="text-danger">{{ $message }}</small> @enderror
    </div> --}}
            {{-- الإيميل --}}
            <div class="form-group">
                <label>الإيميل</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- اسم المستخدم --}}
            <div class="form-group">
                <label>اسم المستخدم</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            

            {{-- كلمة المرور --}}
            <div class="form-group">
                <label>كلمة المرور</label>
                <input type="password" name="password" class="form-control" required>
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            {{-- تأكيد كلمة المرور --}}
            <div class="form-group">
                <label>تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="login-btn">تسجيل</button>
        </form>

        <div class="register-link">
            <label>هل لديك حساب؟</label>
            <a href="{{ route('login') }}">تسجيل الدخول</a>
        </div>

    </div>
</div>
@endsection
