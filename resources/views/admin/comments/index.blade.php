@extends('admin.layout')

@section('content')

<h2>رسائل تواصل معنا</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الإيميل</th>
            <th>العنوان</th>
            <th>الرسالة</th>
            <th>التاريخ</th>
        </tr>
    </thead>

    <tbody>
        @forelse($messages as $msg)
            <tr>
                <td>{{ $msg->id }}</td>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->address }}</td>
                <td>{{ $msg->message }}</td>
                <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6">لا توجد رسائل</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection
