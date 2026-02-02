@extends('layouts.master2')

@section('title', 'إعدادات الحساب')

@section('content')
<div class="container_account">

    <div class="header_account">
        <div class="profile">
            <div class="profile-img">
                <img
                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/default-user.png') }}"
                    alt="صورة المستخدم">
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
          action="{{ route('user.editAccount.update', $user->name) }}"
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
        <input type="password"
               name="password"
               class="form-control">
    </div>

    <div class="form-group">
        <label>تأكيد كلمة المرور</label>
        <input type="password"
               name="password_confirmation"
               class="form-control">
    </div>

        <div style="display:flex; gap:10px; margin-top:20px;">
            <button type="submit" class="login-btn">
                حفظ التعديلات
            </button>

            <a href="{{ route('user.profile', auth()->user()->name) }}"
               class="login-btn"
               style="background:#ccc; color:#000; text-decoration:none; display:flex; align-items:center; justify-content:center;">
                رجوع
            </a>
        </div>

    </form>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.querySelector('.toggle-password');
    const toggleIcon = document.querySelector('.toggle-password i');
    const passwordInput = document.querySelector('#password');

    toggleBtn.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    });
});
</script>
@endpush
