@extends('admin.master')

@section('title', 'Writers')
@section('page_title', 'Writers')
@section('page_meta', 'إدارة الكتّاب')

@section('content')
<div class="card">

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
        <h3>قائمة الكتّاب</h3>
        <a href="{{ route('admin.writers.create') }}" class="btn btn-primary">
            إضافة كاتب
        </a>
    </div>

    <table class="table">
        <thead>
        <tr>
                <th>الصورة</th>
            <th>الاسم</th>
            <th>الإيميل</th>
            <th>عدد القصص</th>
            <th>موثّق</th>
            <th>نشط</th>
            <th>إجراءات</th>
        </tr>
        </thead>
        <tbody>
        @forelse($writers as $w)
            <tr>
                    <td>
        @if($w->avatar)
            <img src="{{ asset('storage/'.$w->avatar) }}"
                 style="width:45px; height:45px; object-fit:cover; border-radius:50%;">
        @else
            <div style="width:45px; height:45px; border-radius:50%; background:#e5e7eb;
                        display:flex; align-items:center; justify-content:center; font-weight:700;">
                {{ mb_substr($w->name, 0, 1) }}
            </div>
        @endif
    </td>
                <td>{{ $w->name }}</td>
                <td>{{ $w->email }}</td>
                <td>{{ $w->stories_count ?? 0 }}</td>
                
         <td>{{ $w->is_verified ? 'موثّق' : 'غير موثّق' }}</td>
<td>{{ $w->is_active ? 'نشط' : 'غير نشط' }}</td>

                <td style="white-space:nowrap;">
                    <a href="{{ route('admin.writers.edit', $w->id) }}" class="btn btn-light">
                        تعديل
                    </a>

                    <form action="{{ route('admin.writers.toggleVerify', $w->id) }}"
                          method="post"
                          style="display:inline;">
                        @csrf
                        <button class="btn btn-primary" type="submit">
                            {{ $w->is_verified ? 'إلغاء التوثيق' : 'توثيق' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.writers.destroy', $w->id) }}"
                          method="post"
                          style="display:inline;"
                          onsubmit="return confirm('حذف الكاتب؟');">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">
                            حذف
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">لا يوجد كتّاب</td></tr>
        @endforelse
        </tbody>
    </table>

    <div style="height:12px;"></div>

    <div>
        {{ $writers->links() }}
    </div>
</div>
@endsection
