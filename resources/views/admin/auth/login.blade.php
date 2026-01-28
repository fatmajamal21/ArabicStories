@extends('admin.auth.layout')

@section('title', 'تسجيل دخول الأدمن')

@section('content')
<div class="card">

    <h3 style="margin-bottom:18px; text-align:center;">
        دخول لوحة التحكم
    </h3>

    <form method="post" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="form-row">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div style="color:#b91c1c; font-size:13px; margin-top:6px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-row">
            <label>كلمة السر</label>
            <input type="password" name="password" required>
            @error('password')
                <div style="color:#b91c1c; font-size:13px; margin-top:6px;">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div style="display:flex; gap:10px; margin-top:12px;">
            <button class="btn btn-primary" type="submit">
                دخول
            </button>
            <a class="btn btn-light" href="{{ url('/') }}">
                رجوع
            </a>
        </div>
    </form>

</div>
@endsection
