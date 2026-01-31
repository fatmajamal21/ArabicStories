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
   @guest
        <a href="{{ route('login') }}" class="auth-btn signout">تسجيل الدخول</a>
        <a href="{{ route('register') }}" class="auth-btn Login">إنشاء حساب</a>
    @endguest

    @auth
        <form method="post" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" class="nav-logout-btn auth-btn signout">تسجيل الخروج</button>
        </form>
                       <div class="user-profile">
                    <img src="../img/user - Copy.png" alt="صورة المستخدم" class="user-img">


                    <div class="dropdown-menu">
                        <a href="{{ route('edit.account') }}"> إعدادات الحساب</a>
                        <a href="{{ route('favorites') }}">المفضلة</a>
                        <!-- <a href="#"><i class="fas fa-user"></i>الملف الشخصي</a> -->
                        <!-- <a href="#"><i class="fas fa-cog"></i> إعدادات الحساب</a> -->
                        <!-- <a href="#"><i class="fas fa-book"></i>المفضلة</a> -->
                        <!-- <a href="#"><i class="fas fa-history"></i>السجل</a> -->
                        <!-- <a href="#"><i class="fas fa-question-circle"></i>المساعدة</a> -->
                    </div>
                </div>
    @endauth
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