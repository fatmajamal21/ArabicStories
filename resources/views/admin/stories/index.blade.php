// resources/views/admin/stories/index.blade.php
@extends('admin.master')
@section('title', 'All Stories')
@section('page_title', 'All Stories')
@section('page_meta', 'قائمة القصص')

@section('content')
<div class="card"dir="rtl" >
    <div style="display:flex; gap:10px; align-items:center; justify-content:space-between; flex-wrap:wrap;">
        <form method="get" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <input name="q" value="{{ request('q') }}" placeholder="بحث بالعنوان" style="padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb;">
            <select name="status" style="padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb;">
                <option value="">كل الحالات</option>
                <option value="published" @selected(request('status')==='published')>published</option>
                <option value="pending" @selected(request('status')==='pending')>pending</option>
                <option value="rejected" @selected(request('status')==='rejected')>rejected</option>
            </select>
            <button class="btn btn-dark" type="submit">فلترة</button>
        </form>

        <div style="display:flex; gap:10px;">
            <a class="btn btn-primary" href="{{ route('admin.stories.create') }}">Add Story</a>
            <a class="btn btn-light" href="{{ route('admin.stories.pending') }}">Pending Review</a>
        </div>
    </div>

    <div style="height:12px;"></div>

    <table class="table">
        <thead>
        <tr>
            <th>صورة</th>
            <th>العنوان</th>
                        <th>الكاتب </th>

            <th>التصنيف</th>
            <th>العمر</th>
            <th>الحالة</th>
            <th>تاريخ</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stories as $s)
            <tr>
                <td>
                    <div style="width:46px; height:46px; border-radius:10px; overflow:hidden; background:#f3f4f6;">
                        @if($s->image)
                            <img src="{{ asset('storage/'.$s->image) }}" style="width:100%; height:100%; object-fit:cover;">
                        @elseif($s->cover)
                            <img src="{{ asset('storage/'.$s->cover) }}" style="width:100%; height:100%; object-fit:cover;">
                        @endif
                    </div>
                </td>
                <td>{{ $s->title }}</td>
             <td>   {{ $s->writer->name ?? '-' }}</td>

                <td>{{ $s->category->name ?? '-' }}</td>
                <td>{{ $s->age_group ?? '-' }}</td>
          <td>{{ $s->status }}</td>

                <td>{{ optional($s->created_at)->format('Y-m-d') }}</td>
                <td style="white-space:nowrap;">
                    <a class="btn btn-light" href="{{ route('admin.stories.edit', $s->id) }}">Edit</a>

                    @if($s->status === 'pending')
                        <form action="{{ route('admin.stories.approve', $s->id) }}" method="post" style="display:inline;">
                            @csrf
                            <button class="btn btn-primary" type="submit">Approve</button>
                        </form>

                        <form action="{{ route('admin.stories.reject', $s->id) }}" method="post" style="display:inline;">
                            @csrf
                            <button class="btn btn-danger" type="submit">Reject</button>
                        </form>
                    @endif

                    <form action="{{ route('admin.stories.destroy', $s->id) }}" method="post" style="display:inline;" onsubmit="return confirm('حذف القصة؟');">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">لا يوجد</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="height:12px;"></div>

    <div>
        {{ $stories->links() }}
    </div>
</div>
@endsection
