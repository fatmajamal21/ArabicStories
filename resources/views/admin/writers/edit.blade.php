@extends('admin.master')

@section('title', 'Edit Writer')
@section('page_title', 'Edit Writer')
@section('page_meta', 'تعديل بيانات الكاتب')

@section('content')
<div class="card">

    <form action="{{ route('admin.writers.update', $writer->id) }}"
          method="post"
          enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="grid grid2">

            <div class="form-row">
                <label>اسم الكاتب</label>
                <input type="text"
                       name="name"
                       value="{{ old('name', $writer->name) }}"
                       required>
            </div>

     <div class="form-row">
    <label>عدد القصص</label>
    <input type="text"
           value="{{ $writer->stories()->count() }}"
           readonly
           style="background:#f3f4f6; cursor:not-allowed;">
</div>

      <div class="form-row">
                <label>البريد الإلكتروني</label>
                <input type="email"
                       name="email"
                       value="{{ old('email', $writer->email) }}">
            </div>
            <div class="form-row">
                <label>رقم الهاتف</label>
                <input type="text"
                       name="phone"
                       value="{{ old('phone', $writer->phone) }}">
            </div>

            <div class="form-row">
                <label>الصورة الشخصية</label>
                <input type="file" name="avatar">

                @if($writer->avatar)
                    <div style="margin-top:8px;">
                        <img src="{{ asset('storage/'.$writer->avatar) }}"
                             style="width:90px; height:90px; object-fit:cover; border-radius:12px;">
                    </div>
                @endif
            </div>

            <div class="form-row">
                <label>موثّق</label>
                <select name="is_verified">
                    <option value="0" @selected(!$writer->is_verified)>لا</option>
                    <option value="1" @selected($writer->is_verified)>نعم</option>
                </select>
            </div>

            <div class="form-row">
                <label>نشط</label>
                <select name="is_active">
                    <option value="1" @selected($writer->is_active)>نعم</option>
                    <option value="0" @selected(!$writer->is_active)>لا</option>
                </select>
            </div>

        </div>

        <div class="form-row">
            <label>نبذة عن الكاتب</label>
            <textarea name="bio" rows="4">{{ old('bio', $writer->bio) }}</textarea>
        </div>

        <div style="display:flex; gap:10px; margin-top:15px;">
            <button class="btn btn-primary" type="submit">
                حفظ التعديلات
            </button>

            <a href="{{ route('admin.writers.index') }}"
               class="btn btn-light">
                رجوع
            </a>
        </div>

    </form>

</div>
@endsection
