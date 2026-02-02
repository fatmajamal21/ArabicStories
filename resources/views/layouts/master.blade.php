<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Bookworm | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('CSS/styleVisitor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @include('layouts.partials.nav') {{-- استدعاء الناف بار --}}

    @yield('content') {{-- هنا سيتم حقن محتوى كل صفحة --}}

    @include('layouts.partials.footer') {{-- استدعاء الفوتر --}}
    @if(session('success'))
<div id="successModal" class="success-modal-overlay">
    <div class="success-modal">
        <div class="success-icon">✔</div>
        <h3>تم بنجاح</h3>
        <p>{{ session('success') }}</p>
<button onclick="goHome()">تم</button>
    </div>
</div>
@endif
<script>
function goHome() {
    window.location.href = "{{ route('home') }}";
}

setTimeout(() => {
    const modal = document.getElementById('successModal');
    if (modal) {
        window.location.href = "{{ route('home') }}";
    }
}, 4000);
</script>
@stack('scripts')
</body>
</html>