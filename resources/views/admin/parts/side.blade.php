<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <img src="{{ asset('admin_assets_rtl/images/logo-icon.png') }}" class="logo-icon" alt="logo">
        <h4 class="logo-text">Bookworm</h4>
        <div class="toggle-icon"><i class="bi bi-list"></i></div>
    </div>

    <ul class="metismenu sidebar-menu" id="menu">

        <li class="menu-label">مرحباً بك 👋</li>

        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span>لوحة التحكم</span>
            </a>
        </li>

        <li class="has-arrow">
            <a href="javascript:void(0)">
                <i class="bi bi-book"></i>
                <span>إدارة القصص</span>
            </a>
            <ul>
                <li><a href="{{ route('admin.stories.index') }}">جميع القصص</a></li>
                <li><a href="{{ route('admin.stories.pending') }}">قيد المراجعة</a></li>
                <li><a href="{{ route('admin.stories.create') }}">إضافة قصة</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ route('admin.users.index') }}">
                <i class="bi bi-people"></i>
                <span>المستخدمون</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.writers.index') }}">
                <i class="bi bi-pencil-square"></i>
                <span>الكتّاب</span>
            </a>
        </li>
    <li>
            <a href="{{ route('admin.workers.index') }}">
              <i class="bi bi-people"></i>
                <span>العملون</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.categories.index') }}">
                <i class="bi bi-tags"></i>
                <span>التصنيفات</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.comments.index') }}">
                <i class="bi bi-chat-dots"></i>
                <span>التعليقات</span>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.reports.index') }}">
                <i class="bi bi-bar-chart"></i>
                <span>التقارير</span>
            </a>
        </li>

        <li class="menu-divider"></li>

     <li>
    <form action="{{ route('admin.logout') }}"
          method="post"
          style="display:block;">
        @csrf
        <button type="submit"
                style="background:none;
                       border:none;
                       color:inherit;
                       width:100%;
                       text-align:right;
                       padding:10px 16px;
                       cursor:pointer;">
            <i class="bi bi-box-arrow-right"></i>
            <span>تسجيل الخروج</span>
        </button>
    </form>
</li>


    </ul>
</aside>
