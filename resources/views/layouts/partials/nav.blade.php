    <nav>
        <div class="nav-container">
            <div class="logo">
                <div class="logo-text"><img src="../img/logo.png" alt=""></div>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('home') }}" class="active">الرئيسية</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="{{ route('all_story') }}">قصص الأطفال</a></li>
        <li><a href="{{ route('home') }}#team">العاملون في الموقع</a></li>
    <li><a href="{{ route('home') }}#features">مميزات المنصة</a></li>
            </ul>

 <div class="user-section">
            @if(auth()->check())
                {{-- إذا كان المستخدم مسجل دخول --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="auth-btn signout ">تسجيل الخروج</button>
                </form>
            @else
                {{-- إذا كان زائراً --}}
                {{-- {{ route('login') }} --}}
                <a href="#" class="auth-btn Login">تسجيل دخول</a>
            @endif
        </div>

            {{-- <div class="user-section">
                <a href="#" class="auth-btn Login">تسجيل الدخول</a>
                <a href="#" class="auth-btn register">تسجيل </a>
            </div> --}}

            <!-- <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div> -->
        </div>
    </nav>