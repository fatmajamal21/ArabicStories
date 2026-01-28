@extends('admin.master')



@section('content')
<div class="container p-4 "dir="rtl">
    <h1>مرحبا بك في لوحة الأدمن</h1>
    <p>يمكنك إدارة القصص والمستخدمين والتقارير من هنا.</p>

    <div class="quick-links mt-4">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-2">الذهاب إلى لوحة التحكم</a>
        <a href="{{ route('admin.stories.index') }}" class="btn btn-secondary mb-2">إدارة القصص</a>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mb-2">إدارة المستخدمين</a>
    </div>
</div>
@endsection
