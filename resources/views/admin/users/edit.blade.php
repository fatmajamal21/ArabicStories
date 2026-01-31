
@php use Illuminate\Support\Facades\Storage; @endphp
@extends('admin.master')

@section('title', 'Edit User')
@section('page_title', 'Edit User')
@section('page_meta', 'تعديل المستخدم')

@section('content')
<div class="card" style="max-width:600px;">

    @if ($errors->any())
        <div style="margin-bottom:10px; color:red;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

<form method="post"
      action="{{ route('admin.users.update', $user->id) }}"
      enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label>الإيميل</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label>كلمة المرور الجديدة</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label>تأكيد كلمة المرور</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

  <div class="form-group">
    <label>الصورة الحالية</label><br>

    @if($user->avatar)
        <img
            src="{{ Storage::url($user->avatar) }}"
            style="width:80px; height:80px; border-radius:50%; object-fit:cover;">
    @else
        <img
            src="{{ asset('img/default-user.png') }}"
            style="width:80px; height:80px; border-radius:50%; object-fit:cover;">
    @endif
</div>


        <div class="form-group">
            <label>تغيير الصورة</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div style="display:flex; gap:10px; margin-top:15px;">
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-light">رجوع</a>
        </div>

    </form>
</div>
@endsection
