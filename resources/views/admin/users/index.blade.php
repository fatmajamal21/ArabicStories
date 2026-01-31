

@php use Illuminate\Support\Facades\Storage; @endphp
{{-- resources/views/admin/users/index.blade.php --}}

@extends('admin.master')

@section('title', 'Users')
@section('page_title', 'Users')
@section('page_meta', 'إدارة المستخدمين')

@section('content')
<div class="card">

    <div style="display:flex; align-items:center; justify-content:space-between; gap:10px; flex-wrap:wrap;">

        <form  enctype="multipart/form-data" method="get" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">
            <input name="q" value="{{ request('q') }}" placeholder="بحث بالاسم أو الإيميل"
                   style="padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb;">
            <button class="btn btn-dark" type="submit">بحث</button>
        </form>

  

    </div>

    <div style="height:12px;"></div>

    <table class="table">
        <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>الإيميل</th>
            <th>الدور</th>
            <th>تاريخ</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $u)
            <tr>
     <td>
    @if($u->avatar)
        <img
            src="{{ Storage::url($u->avatar) }}"
            alt="{{ $u->name }}"
            style="width:45px; height:45px; border-radius:50%; object-fit:cover;"
        >
    @else
        <img
            src="{{ asset('img/default-user.png') }}"
            alt="default"
            style="width:45px; height:45px; border-radius:50%; object-fit:cover;"
        >
    @endif
</td>

                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role ?? '-' }}</td>
                <td>{{ optional($u->created_at)->format('Y-m-d') }}</td>
   <td style="display:flex; gap:6px;">
    <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-sm btn-warning">
        تعديل
    </a>

    <form method="post"
          action="{{ route('admin.users.destroy', $u->id) }}"
          onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger">
            حذف
        </button>
    </form>
</td>

            </tr>
        @empty
            <tr><td colspan="6">لا يوجد</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="height:12px;"></div>

    <div>
        {{ $users->links() }}
    </div>
</div>
@endsection
