// resources/views/admin/stories/edit.blade.php
@extends('admin.master')
@section('title', 'Edit Story')
@section('page_title', 'Edit Story')
@section('page_meta', 'تعديل قصة')

@section('content')
<div class="card">
    <form action="{{ route('admin.stories.update', $story->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="grid grid2">
            <div class="form-row">
                <label>العنوان</label>
                <input name="title" value="{{ old('title', $story->title) }}">
            </div>
<div class="form-row">
    <label>الكاتب</label>
    <select name="writer_id" required>
        <option value="">اختر الكاتب</option>
        @foreach($writers as $w)
            <option value="{{ $w->id }}" @selected(old('writer_id', $story->writer_id) == $w->id)>
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
                        <option value="{{ $c->id }}" @selected(old('category_id', $story->category_id)==$c->id)>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-row">
                <label>الفئة العمرية</label>
                <select name="age_group">
                    <option value="">اختر</option>
                    <option value="3-5" @selected(old('age_group', $story->age_group)==='3-5')>3-5</option>
                    <option value="6-8" @selected(old('age_group', $story->age_group)==='6-8')>6-8</option>
                    <option value="9-12" @selected(old('age_group', $story->age_group)==='9-12')>9-12</option>
                </select>
            </div>

            <div class="form-row">
                <label>الحالة</label>
                <select name="status">
                    <option value="pending" @selected(old('status', $story->status)==='pending')>pending</option>
                    <option value="published" @selected(old('status', $story->status)==='published')>published</option>
                    <option value="rejected" @selected(old('status', $story->status)==='rejected')>rejected</option>
                </select>
            </div>

            <div class="form-row">
                <label>سبب الرفض</label>
                <input name="reject_reason" value="{{ old('reject_reason', $story->reject_reason) }}">
            </div>

            <div class="form-row">
                <label>صورة القصة</label>
                <input type="file" name="image">
                @if($story->image)
                    <div style="height:8px;"></div>
                    <img src="{{ asset('storage/'.$story->image) }}" style="width:110px; border-radius:12px;">
                @endif
            </div>

            <div class="form-row">
                <label>صورة الغلاف</label>
                <input type="file" name="cover">
                @if($story->cover)
                    <div style="height:8px;"></div>
                    <img src="{{ asset('storage/'.$story->cover) }}" style="width:110px; border-radius:12px;">
                @endif
            </div>

            <div class="form-row">
                <label>ملف صوت</label>
                <input type="file" name="audio">
            </div>
        </div>

        <div class="form-row">
            <label>وصف قصير</label>
            <textarea name="summary">{{ old('summary', $story->summary) }}</textarea>
        </div>

        <div class="form-row">
            <label>نص القصة</label>
            <textarea name="content">{{ old('content', $story->content) }}</textarea>
        </div>

        <div style="display:flex; gap:10px; margin-top:10px;">
            <button class="btn btn-primary" type="submit">تحديث</button>
            <a class="btn btn-light" href="{{ route('admin.stories.index') }}">رجوع</a>
        </div>
    </form>
</div>
@endsection
