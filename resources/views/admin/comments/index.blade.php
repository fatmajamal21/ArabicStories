// resources/views/admin/comments/index.blade.php
@extends('admin.master')

@section('title', 'Comments')
@section('page_title', 'Comments')
@section('page_meta', 'إدارة التعليقات')

@section('content')
<div class="card">
    <table class="table">
        <thead>
        <tr>
            <th>القصة</th>
            <th>المستخدم</th>
            <th>التعليق</th>
            <th>تاريخ</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($comments as $c)
            <tr>
                <td>{{ $c->story->title ?? '-' }}</td>
                <td>{{ $c->user->name ?? '-' }}</td>
                <td>{{ $c->body ?? '-' }}</td>
                <td>{{ optional($c->created_at)->format('Y-m-d') }}</td>
                <td style="white-space:nowrap;">
           <form action="{{ route('admin.comments.destroy', $c->id) }}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger" type="submit">حذف</button>
</form>

                </td>
            </tr>
        @empty
            <tr><td colspan="5">لا يوجد</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="height:12px;"></div>

    <div>
        {{ $comments->links() }}
    </div>
</div>
@endsection
