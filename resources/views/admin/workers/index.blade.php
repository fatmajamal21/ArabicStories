@extends('admin.master')

@section('title', 'Workers')
@section('page_title', 'Workers')
@section('page_meta', 'إدارة العمال')

@section('content')
<div class="card" dir="rtl">

    <div style="display:flex; justify-content:space-between; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:12px;">
        <form method="get" style="display:flex; gap:10px; flex-wrap:wrap; align-items:center;">
            <input name="q" value="{{ request('q') }}" placeholder="بحث بالاسم أو الإيميل أو الهاتف"
                   style="padding:10px 12px; border-radius:10px; border:1px solid #e5e7eb; min-width:260px;">
            <button class="btn btn-dark" type="submit">بحث</button>
            <a class="btn btn-light" href="{{ route('admin.workers.index') }}">مسح</a>
        </form>

        <a class="btn btn-primary" href="{{ route('admin.workers.create') }}">إضافة عامل</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
             <th>العمل</th>
            <th>الإيميل</th>
            <th>الهاتف</th>
            <th>موثّق</th>
            <th>نشط</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($workers as $w)
            <tr>
                <td>
                    <div style="width:44px; height:44px; border-radius:10px; overflow:hidden; background:#f3f4f6;">
                        @if($w->avatar)
                            <img src="{{ asset('storage/'.$w->avatar) }}" style="width:100%; height:100%; object-fit:cover;">
                        @endif
                    </div>
                </td>
                <td>{{ $w->name }}</td>
                <td>{{ $w->bio }}</td>
                <td>{{ $w->email ?? '-' }}</td>
                <td>{{ $w->phone ?? '-' }}</td>
                <td style="color: black;">
                    @if($w->is_verified)
                        <span >موثّق</span>
                    @else
                        <span >غير موثّق</span>
                    @endif
                </td>
                <td style="color: black;">
                    @if($w->is_active)
                        <span >نشط</span>
                    @else
                        <span >غير نشط</span>
                    @endif
                </td>
                <td style="white-space:nowrap;">
                    <a class="btn btn-light" href="{{ route('admin.workers.edit', $w->id) }}">تعديل</a>

                    <form action="{{ route('admin.workers.toggleVerify', $w->id) }}" method="post" style="display:inline;">
                        @csrf
                        <button class="btn btn-primary" type="submit">
                            {{ $w->is_verified ? 'إلغاء التوثيق' : 'توثيق' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.workers.destroy', $w->id) }}" method="post" style="display:inline;" onsubmit="return confirm('حذف العامل؟');">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">لا يوجد عمال</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="height:12px;"></div>

    <div>
        {{ $workers->links() }}
    </div>
</div>
@endsection
