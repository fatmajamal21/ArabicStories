@extends('layouts.master')

@section('title', 'تسجيل الدخول')

@section('content')
<div class="container">
    <h3>تسجيل الدخول</h3>

    @if (session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label>كلمة المرور</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember">
                تذكرني
            </label>
        </div>

        <div class="form-actions">
            <button type="submit">دخول</button>
            <a href="{{ route('password.request') }}">نسيت كلمة المرور</a>
        </div>
    </form>

    <div style="margin-top:12px;">
        <a href="{{ route('register') }}">إنشاء حساب</a>
    </div>
</div>
@endsection
