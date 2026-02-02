@extends('layouts.master')

@section('title', 'تسجيل الدخول')

@section('content')
    <div class="login-container">
        <div class="image-section">
            <img style="width: 90%;" src="../img/تسجيل الدخول - Copy.png" alt="">
        </div>

        <div class="form-section">
            <img src="../img/logo.png" alt="Logo" class="logo">

            <h2>تسجيل الدخول</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('البريد الإلكتروني')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('كلمة المرور')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
          <div class="remember-me">
    <label>
        <input type="checkbox" name="remember">
        <span>تذكرني</span>
    </label>
</div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                   <a href="{{ route('password.request') }}" class="forgot-password">
    نسيت كلمة المرور؟
</a>

                    @endif

                <button type="submit" class="login-btn">
    تسجيل الدخول
</button>

                </div>
            </form>

            <div class="register-link">
                <label>ليس لديك حساب؟</label>
                <a href="{{ route('register') }}">تسجيل حساب جديد</a>
            </div>

            <div class="social-login">
                <h3>تسجيل الدخول من خلال</h3>
                <div class="social-icons">
                    <div class="social-icon google">
                        <i class="fab fa-google"></i>
                    </div>
                    <div class="social-icon facebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-icon twitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
