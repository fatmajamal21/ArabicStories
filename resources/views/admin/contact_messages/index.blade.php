@extends('admin.master')

@section('title', 'رسائل تواصل معنا')
@section('page_title', 'رسائل تواصل معنا')
@section('page_meta', 'إدارة رسائل التواصل')

@section('content')
<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الإيميل</th>
                <th>العنوان</th>
                <th>الرسالة</th>
                <th>التاريخ</th>
                <th>إجراءات</th>
            </tr>
        </thead>

        <tbody>
        @forelse($messages as $msg)
            <tr>
                <td>{{ $msg->id }}</td>
                <td>{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ $msg->address }}</td>
                <td style="max-width:300px;">
                    {{ $msg->message }}
                </td>
                <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <form method="POST"
                          action="{{ route('admin.contact-messages.destroy', $msg->id) }}"
                          onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">
                    لا توجد رسائل
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
