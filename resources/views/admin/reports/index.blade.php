@extends('admin.master')

@section('title', 'Reports')
@section('page_title', 'Reports')
@section('page_meta', 'تقارير الموقع')

@section('content')

<div class="grid grid3">

    <div class="card p-3">
        <div style="font-size:12px; color:#6b7280; font-weight:700;">
            القصص المنشورة
        </div>
        <div style="font-size:26px; font-weight:800; color:#111827; margin-top:6px;">
            {{ $reports['published'] ?? 0 }}
        </div>
    </div>

    <div class="card p-3">
        <div style="font-size:12px; color:#6b7280; font-weight:700;">
            قصص بانتظار المراجعة
        </div>
        <div style="font-size:26px; font-weight:800; color:#111827; margin-top:6px;">
            {{ $reports['pending'] ?? 0 }}
        </div>
    </div>

    <div class="card p-3">
        <div style="font-size:12px; color:#6b7280; font-weight:700;">
            إجمالي التعليقات
        </div>
        <div style="font-size:26px; font-weight:800; color:#111827; margin-top:6px;">
            {{ $reports['comments'] ?? 0 }}
        </div>
    </div>

</div>

<div style="height:20px;"></div>

<div class="card p-3">

    <div style="font-weight:800; color:#111827;">
        تصدير البيانات
    </div>

    <div style="height:12px;"></div>

    <div style="display:flex; gap:10px; flex-wrap:wrap;">

        <a class="btn btn-light"
           href="{{ route('admin.reports.export', 'stories') }}">
            تصدير القصص
        </a>

        <a class="btn btn-light"
           href="{{ route('admin.reports.export', 'comments') }}">
            تصدير التعليقات
        </a>

        <a class="btn btn-light"
           href="{{ route('admin.reports.export', 'users') }}">
            تصدير المستخدمين
        </a>

        <a class="btn btn-light"
           href="{{ route('admin.reports.export', 'writers') }}">
            تصدير الكتّاب
        </a>

    </div>

</div>

@endsection
