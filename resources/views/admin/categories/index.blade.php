// resources/views/admin/categories/index.blade.php
@extends('admin.master')

@section('title', 'Categories')
@section('page_title', 'Categories')
@section('page_meta', 'إدارة التصنيفات')

@section('content')
<div class="grid grid2">
    <div class="card">
        <div style="font-weight:800; color:#111827;">إضافة تصنيف</div>
        <div style="height:10px;"></div>

<form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="form-row">
                <label>الاسم</label>
                <input name="name" value="{{ old('name') }}">
            </div>
            <button class="btn btn-primary" type="submit">حفظ</button>
        </form>
    </div>

    <div class="card">
        <div style="font-weight:800; color:#111827;">قائمة التصنيفات</div>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>الاسم</th>
                <th>إجراءات</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td style="white-space:nowrap;">
                        <form action="{{ route('admin.categories.destroy', $c->id) }}" method="post" style="display:inline;" onsubmit="return confirm('حذف التصنيف؟');">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>

        <div style="height:12px;"></div>

        <div>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
