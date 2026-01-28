<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Login')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            margin:0;
            font-family: system-ui, sans-serif;
            background:#f3f4f6;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .card{
            background:#fff;
            padding:50px;
            border-radius:14px;
            width:100%;
            max-width:420px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }
        .form-row{
            margin-bottom:14px;
        }
        label{
            display:block;
            font-weight:600;
            margin-bottom:6px;
        }
        input{
            width:100%;
            padding:10px 12px;
            border-radius:10px;
            border:1px solid #e5e7eb;
            outline:none;
        }
        .btn{
            padding:10px 16px;
            border-radius:10px;
            border:none;
            cursor:pointer;
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-weight:600;
        }
        .btn-primary{
            background:#111827;
            color:#fff;
        }
        .btn-light{
            background:#e5e7eb;
            color:#111827;
        }
    </style>
</head>
<body>

    @yield('content')

</body>
</html>
