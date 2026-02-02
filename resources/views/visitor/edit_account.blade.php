@extends('layouts.master2')

@section('title', 'إعدادات الحساب')
@section('content')

@section('content')
<div class="container_account">

    <div class="header_account">
        <div class="profile">
            <div class="profile-img">
                                    <img src="../img/user - Copy.png" alt="صورة المستخدم" class="user-img">

                {{-- <img
                    src="{{ auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar) : asset('img/default-user.png') }}"
                    alt="صورة المستخدم"> --}}
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div style="color:red; margin-bottom:10px;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form method="POST"
          action="{{ route('edit.account.update') }}"
          enctype="multipart/form-data"
          class="form-container">
        @csrf

        <div class="form-group">
            <label>الإيميل</label>
            <input type="email"
                   class="form-control"
                   value="{{ auth()->user()->email }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>اسم المستخدم</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', auth()->user()->name) }}"
                   required>
        </div>

        <div class="form-group">
            <label>كلمة المرور الجديدة</label>
            <div class="password-container">
                <input type="password"
                       name="password"
                       class="form-control"
                       id="password">
                <button class="toggle-password" type="button">
                    <i class="input-icon2 fas fa-eye"></i>
                </button>
            </div>
        </div>

        <div class="form-group">
            <label>تأكيد كلمة المرور</label>
            <input type="password"
                   name="password_confirmation"
                   class="form-control">
        </div>

        <div class="form-group">
            <label>تغيير الصورة</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <button type="submit" class="login-btn">
            حفظ التعديلات
        </button>
        
    </form>

</div>
@endsection

@push('scripts')
<script>
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
@endpush
