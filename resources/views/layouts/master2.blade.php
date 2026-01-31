<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Bookworm | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('CSS/styleVisitor.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    @yield('content') {{-- هنا سيتم حقن محتوى كل صفحة --}}
@if(session('success'))
<div id="successModal" class="success-modal-overlay">
    <div class="success-modal">
        <div class="success-icon">✔</div>
        <h3>تم بنجاح</h3>
        <p>{{ session('success') }}</p>
        <button onclick="closeSuccessModal()">حسناً</button>
    </div>
</div>
@endif
<script>
function closeSuccessModal() {
    document.getElementById('successModal').remove();
}

setTimeout(() => {
    const modal = document.getElementById('successModal');
    if (modal) modal.remove();
}, 4000);
</script>

</body>
</html>