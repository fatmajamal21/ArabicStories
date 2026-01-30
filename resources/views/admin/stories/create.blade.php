// resources/views/admin/stories/create.blade.php
@extends('admin.master')

@section('title', 'Add Story')
@section('page_title', 'Add Story')
@section('page_meta', 'إضافة قصة جديدة')

@section('content')
<div class="card">
    <form action="{{ route('admin.stories.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="grid grid2">
            <div class="form-row">
                <label>العنوان</label>
                <input name="title" value="{{ old('title') }}">
            </div>
<div class="form-row">
    <label>الكاتب</label>
    <select name="writer_id" required>
        <option value="">اختر الكاتب</option>
        @foreach($writers as $w)
            <option value="{{ $w->id }}" @selected(old('writer_id') == $w->id)>
                {{ $w->name }} @if($w->is_verified) (موثّق) @endif
            </option>
        @endforeach
    </select>
</div>

            <div class="form-row">
                <label>التصنيف</label>
                <select name="category_id">
                    <option value="">اختر</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" @selected(old('category_id')==$c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <label>الفئة العمرية</label>
                <select name="age_group">
                    <option value="">اختر</option>
                    <option value="3-5" @selected(old('age_group')==='3-5')>3-5</option>
                    <option value="5-7" @selected(old('age_group')==='5-7')>5-7</option>
                    <option value="7-9" @selected(old('age_group')==='7-9')>7-9</option>
                     <option value="9-12" @selected(old('age_group')==='9-12')>9-12</option>
                    <option value="12-15" @selected(old('age_group')==='12-15')>12-15</option>

                </select>
            </div>

            <div class="form-row">
                <label>الحالة</label>
                <select name="status">
                    <option value="pending" @selected(old('status','pending')==='pending')>pending</option>
                    <option value="published" @selected(old('status')==='published')>published</option>
                    <option value="rejected" @selected(old('status')==='rejected')>rejected</option>
                </select>
            </div>

            <div class="form-row">
                <label>صورة القصة</label>
                <input type="file" name="image">
            </div>

            <div class="form-row">
                <label>صورة الغلاف</label>
                <input type="file" name="cover">
            </div>

            <div class="form-row">
                <label>ملف صوت</label>
                <input type="file" name="audio">
            </div>
        </div>

        <div class="form-row">
            <label>وصف قصير</label>
            <textarea name="summary">{{ old('summary') }}</textarea>
        </div>

        <div class="form-row">
            <label>نص القصة</label>
            <textarea name="content">{{ old('content') }}</textarea>
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button class="btn btn-primary" type="submit">حفظ</button>
            <a class="btn btn-light" href="{{ route('admin.stories.index') }}">رجوع</a>
        </div>
    </form>
</div>
@endsection
