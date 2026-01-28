@extends('admin.master')

@section('title', 'Add Worker')
@section('page_title', 'Add Worker')
@section('page_meta', 'إضافة عامل')

@section('content')
<div class="card" dir="rtl">
    <form action="{{ route('admin.workers.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="grid grid2">
            <div class="form-row">
                <label>اسم العامل</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name')<div style="color:#b91c1c; font-size:13px; margin-top:6px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label>الإيميل</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')<div style="color:#b91c1c; font-size:13px; margin-top:6px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label>الهاتف</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
                @error('phone')<div style="color:#b91c1c; font-size:13px; margin-top:6px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label>الصورة الشخصية</label>
                <input type="file" name="avatar">
                @error('avatar')<div style="color:#b91c1c; font-size:13px; margin-top:6px;">{{ $message }}</div>@enderror
            </div>

            <div class="form-row">
                <label>موثّق</label>
                <select name="is_verified">
                    <option value="0" @selected(old('is_verified')==='0')>لا</option>
                    <option value="1" @selected(old('is_verified')==='1')>نعم</option>
                </select>
            </div>

            <div class="form-row">
                <label>نشط</label>
                <select name="is_active">
                    <option value="1" @selected(old('is_active','1')==='1')>نعم</option>
                    <option value="0" @selected(old('is_active')==='0')>لا</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <label>نبذة</label>
            <textarea name="bio" rows="4">{{ old('bio') }}</textarea>
            @error('bio')<div style="color:#b91c1c; font-size:13px; margin-top:6px;">{{ $message }}</div>@enderror
        </div>

        <div style="display:flex; gap:10px; margin-top:12px;">
            <button class="btn btn-primary" type="submit">حفظ</button>
            <a class="btn btn-light" href="{{ route('admin.workers.index') }}">رجوع</a>
        </div>
    </form>
</div>
@endsection
