@extends('admin.master')

@section('title', 'Add Writer')
@section('page_title', 'Add Writer')
@section('page_meta', 'إضافة كاتب جديد')

@section('content')
<div class="card">

    <form action="{{ route('admin.writers.store') }}"
          method="post"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid2">

            <div class="form-row">
                <label>اسم الكاتب</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="form-row">
                <label>البريد الإلكتروني</label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}">
            </div>

            <div class="form-row">
                <label>رقم الهاتف</label>
                <input type="text"
                       name="phone"
                       value="{{ old('phone') }}">
            </div>

            <div class="form-row">
                <label>الصورة الشخصية</label>
                <input type="file" name="avatar">
            </div>

            <div class="form-row">
                <label>موثّق</label>
                <select name="is_verified">
                    <option value="0">لا</option>
                    <option value="1">نعم</option>
                </select>
            </div>

            <div class="form-row">
                <label>نشط</label>
                <select name="is_active">
                    <option value="1">نعم</option>
                    <option value="0">لا</option>
                </select>
            </div>

        </div>

        <div class="form-row">
            <label>نبذة عن الكاتب</label>
            <textarea name="bio" rows="4">{{ old('bio') }}</textarea>
        </div>

        <div style="display:flex; gap:10px; margin-top:15px;">
            <button class="btn btn-primary" type="submit">
                حفظ
            </button>

            <a href="{{ route('admin.writers.index') }}"
               class="btn btn-light">
                رجوع
            </a>
        </div>

    </form>

</div>
@endsection
