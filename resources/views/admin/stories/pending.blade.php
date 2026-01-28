// resources/views/admin/stories/pending.blade.php
@extends('admin.master')


@section('title', 'Pending Review')
@section('page_title', 'Pending Review')
@section('page_meta', 'قصص في انتظار المراجعة')

@section('content')
<div class="card">
    <div style="display:flex; align-items:center; justify-content:space-between; gap:10px; flex-wrap:wrap;">
        <div style="font-weight:800; color:#111827;">طلبات المراجعة</div>
        <a class="btn btn-light" href="{{ route('admin.stories.index') }}">All Stories</a>
    </div>

    <div style="height:12px;"></div>

    <table class="table">
        <thead>
        <tr>
            <th>العنوان</th>
            <th>الكاتب</th>
            <th>التصنيف</th>
            <th>تاريخ</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stories as $s)
            <tr>
                <td>{{ $s->title }}</td>
                <td>{{ $s->writer->name ?? '-' }}</td>
                <td>{{ $s->category->name ?? '-' }}</td>
                <td>{{ optional($s->created_at)->format('Y-m-d') }}</td>
                <td style="white-space:nowrap;">
                    <a class="btn btn-light" href="{{ route('admin.stories.edit', $s->id) }}">Preview</a>

                    <form action="{{ route('admin.stories.approve', $s->id) }}" method="post" style="display:inline;">
                        @csrf
                        <button class="btn btn-primary" type="submit">Approve</button>
                    </form>

                    <form action="{{ route('admin.stories.reject', $s->id) }}" method="post" style="display:inline;">
                        @csrf
                        <input name="reason" placeholder="سبب الرفض" style="padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb; width:180px;">
                        <button class="btn btn-danger" type="submit">Reject</button>
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
        {{ $stories->links() }}
    </div>
</div>
@endsection
