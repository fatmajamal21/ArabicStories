@extends('admin.master')



@section('content')
<div class="container mt-4" dir="rtl">
    <h1>لوحة التحكم</h1>
    <div class="row">


        <!-- الإداريين -->
<div class="col-md-3">
    <div class="card text-white" style="background-color:#6610f2;">
        <div class="card-header fs-5 fw-bold">الإداريين</div>
        <div class="card-body">
            <h5 class="card-title">{{ $stats['total_stories'] }}</h5>
            <p class="card-text">إجمالي القصص  (الإداريين)</p>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card text-white" style="background-color:#008229;">
        <div class="card-header fs-5 fw-bold">الإداريين</div>
        <div class="card-body">
            <h5 class="card-title">{{ $stats['published_stories'] }}</h5>
            <p class="card-text">  القصص المنشورة</p>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card text-white" style="background-color:#ffcc00;">
        <div class="card-header fs-5 fw-bold">الإداريين</div>
        <div class="card-body">
            <h5 class="card-title">{{ $stats['pending_stories'] }}</h5>
            <p class="card-text">  قصص بانتظار المراجعة</p>
        </div>
    </div>
</div>
<div class="col-md-3">
    <div class="card text-white" style="background-color:#ff0000;">
        <div class="card-header fs-5 fw-bold">الإداريين</div>
        <div class="card-body">
            <h5 class="card-title">{{ $stats['rejected_stories'] }}</h5>
            <p class="card-text">  القصص مرفوضة</p>
        </div>
    </div>
</div>

        <!-- العملاء -->
        <div class="col-md-3">
            <div class="card text-white" style="background-color:#007bff;">
                <div class="card-header fs-5 fw-bold">العملاء</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $stats['total_users'] }}</h5>
                    <p class="card-text">إجمالي عدد المستخدمين</p>
                </div>
            </div>
        </div>
        <!-- العملاء -->
        <div class="col-md-3">
            <div class="card text-white" style="background-color:#003874;">
                <div class="card-header fs-5 fw-bold">العملاء</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $stats['total_writers'] }}</h5>
                    <p class="card-text">إجمالي عدد الكتّاب</p>
                </div>
            </div>
        </div>

        <!-- العملاء -->
        <div class="col-md-3">
            <div class="card text-white" style="background-color:#6b4400;">
                <div class="card-header fs-5 fw-bold">العملاء</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $stats['active_writers'] }}</h5>
                    <p class="card-text">إجمالي عدد كتّاب نشطين</p>
                </div>
            </div>
        </div>
        <!-- العملاء -->
        <div class="col-md-3">
            <div class="card text-white" style="background-color:#ffc107;">
                <div class="card-header fs-5 fw-bold">العملاء</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $stats['verified_writers'] }} </h5>
                    <p class="card-text">إجمالي عدد كتّاب موثّقين</p>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="card text-white" style="background-color:#20c997;">
                <div class="card-header fs-5 fw-bold">الفريلانسر</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $stats['active_verified_writers'] }} </h5>
                    <p class="card-text">إجمالي عدد كتّاب النشطين والموثقين</p>
                </div>
            </div>
        </div>


</div>

<div style="height:20px;"></div>

<div class="grid grid2">

    <div class="card p-3">
        <h4>أحدث القصص</h4>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>العنوان</th>
                <th>الكاتب</th>
                <th>الحالة</th>
            </tr>
            </thead>
            <tbody>
            @forelse($latestStories as $s)
                <tr>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->writer->name ?? '-' }}</td>
                    <td>{{ $s->status }}</td>
                </tr>
            @empty
                <tr><td colspan="3">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="card p-3">
        <h4>قصص بانتظار المراجعة</h4>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>العنوان</th>
                <th>الكاتب</th>
                <th>تاريخ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($pendingStories as $s)
                <tr>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->writer->name ?? '-' }}</td>
                    <td>{{ optional($s->created_at)->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr><td colspan="3">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>

<div style="height:20px;"></div>

<div class="grid grid2">

    <div class="card p-3">
        <h4>أكثر الكتّاب كتابة</h4>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>الكاتب</th>
                <th>عدد القصص</th>
                <th>موثّق</th>
                <th>نشط</th>
            </tr>
            </thead>
            <tbody>
            @forelse($topWriters as $w)
                <tr>
                    <td>{{ $w->name }}</td>
                    <td>{{ $w->stories_count }}</td>
                    <td>{{ $w->is_verified ? 'نعم' : 'لا' }}</td>
                    <td>{{ $w->is_active ? 'نعم' : 'لا' }}</td>
                </tr>
            @empty
                <tr><td colspan="4">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="card p-3">
        <h4>أحدث الكتّاب</h4>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>الكاتب</th>
                <th>موثّق</th>
                <th>نشط</th>
            </tr>
            </thead>
            <tbody>
            @forelse($latestWriters as $w)
                <tr>
                    <td>{{ $w->name }}</td>
                    <td>{{ $w->is_verified ? 'نعم' : 'لا' }}</td>
                    <td>{{ $w->is_active ? 'نعم' : 'لا' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
        <div class="card p-3">
        <h4>العاملون </h4>
        <div style="height:10px;"></div>

        <table class="table">
            <thead>
            <tr>
                <th>الكاتب</th>
                <th>موثّق</th>
                <th>نشط</th>
            </tr>
            </thead>
            <tbody>
            @forelse($latestWorkers as $w)
                <tr>
                    <td>{{ $w->name }}</td>
                    <td>{{ $w->is_verified ? 'نعم' : 'لا' }}</td>
                    <td>{{ $w->is_active ? 'نعم' : 'لا' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">لا يوجد</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

</div>

</div>
@endsection
