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
</body>
</html>