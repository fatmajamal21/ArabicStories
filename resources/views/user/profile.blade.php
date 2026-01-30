<!-- resources/views/user/profile.blade.php -->

@extends('layouts.master')

@section('title', 'الصفحة الشخصية')

@section('content')
    {{-- <div class="profile-container">
        <h1>مرحباً بك، {{ $user->name }}</h1>
        <p>البريد الإلكتروني: {{ $user->email }}</p>

        <h3>معلومات إضافية:</h3>
        <!-- هنا يمكن عرض أي بيانات أخرى متعلقة بالمستخدم -->
        <ul>
            <li>تاريخ الإنشاء: {{ $user->created_at->format('d-m-Y') }}</li>
            <li>آخر تحديث: {{ $user->updated_at->format('d-m-Y') }}</li>
        </ul>

        <!-- يمكنك إضافة أي بيانات أخرى هنا -->
    </div> --}}
@endsection
