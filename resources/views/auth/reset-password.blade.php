@extends('layouts.master')

@section('title', 'كلمة السر')

@section('content')
<div class="login-container">

    <div class="image-section">
        <img src="{{ asset('img/تعيين كلمة مرور - Copy.png') }}" alt="صورة تسجيل الدخول">
    </div>

    <div class="form-section">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">

        <h2>تعيين كلمة مرور جديدة</h2>

        {{-- عرض الأخطاء لو موجودة --}}
        @if ($errors->any())
            <div style="color:red; margin-bottom:10px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            {{-- token مطلوب من Breeze --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- الإيميل مطلوب من Breeze --}}
            <input type="hidden"
                   name="email"
                   value="{{ old('email', $request->email) }}">

            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <div class="password-container">
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        id="password"
                        required
                    >
                    <button class="toggle-password" type="button">
                        <i class="fas fa-eye input-icon2"></i>
                    </button>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <div class="password-container">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        id="password_confirmation"
                        required
                    >
                    <button class="toggle-password" type="button">
                        <i class="fas fa-eye input-icon2"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="login-btn">تأكيد</button>
        </form>

    </div>

    <div class="image-section">
        <img src="{{ asset('img/تعيين كلمة مرور - Copy (2).png') }}" alt="صورة تسجيل الدخول">
    </div>

</div>
@endsection
