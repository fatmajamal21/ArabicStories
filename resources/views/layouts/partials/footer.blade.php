<footer class="footer">
    <div class="footer-container">

        <!-- العمود الأول (اللوجو) -->
        <div class="footer-logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Book Worm Logo">
            </a>
        </div>

        <!-- العمود الثاني -->
        <div class="footer-col">
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('about') }}">من نحن</a></li>
                <li><a href="#">تواصل معنا</a></li>
            </ul>
        </div>

        <!-- العمود الثالث -->
        <div class="footer-col">
            <ul>
                <li><a href="{{ route('home') }}#team">العاملون في الموقع</a></li>
                <li><a href="{{ route('home') }}#features">ميزات المنصة</a></li>
                <li><a href="{{ route('all_story') }}">قصص الأطفال</a></li>
            </ul>
        </div>

        <!-- العمود الرابع -->
        <div class="footer-col">
            <ul>
                <li><a href="{{ route('all_story', ['category'=>'ethical']) }}">قصص أخلاقية</a></li>
                <li><a href="{{ route('all_story', ['category'=>'scientific']) }}">قصص علمية</a></li>
                <li><a href="{{ route('all_story', ['category'=>'cultural']) }}">قصص ثقافية</a></li>
            </ul>
        </div>

        <!-- العمود الخامس -->
        <div class="footer-col">
            <ul>
                <li><a href="{{ route('all_story', ['category'=>'religious']) }}">قصص دينية</a></li>
                <li><a href="{{ route('all_story', ['category'=>'audio']) }}">قصص صوتية</a></li>
                <li><a href="{{ route('all_story', ['category'=>'fantasy']) }}">قصص خيالية</a></li>
            </ul>
        </div>

        <!-- العمود السادس -->
        <div class="footer-col">
            <h4>تواصل معنا</h4>
            <p><i class="fas fa-phone"></i> +966 123456789</p>
            <p><i class="fas fa-envelope"></i> Bookworm@gmail.com</p>
        </div>

    </div>

    <!-- الخط الفاصل -->
    <hr class="footer-line">

    <!-- السوشيال ميديا -->
    <div class="footer-social">
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://wa.me/966123456789" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
    </div>
</footer>
