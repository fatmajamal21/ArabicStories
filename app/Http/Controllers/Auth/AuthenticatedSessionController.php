<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        // محاولة تسجيل الدخول
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // إعادة توليد الجلسة بعد تسجيل الدخول
            $request->session()->regenerate();

            // الحصول على اسم المستخدم
            $username = Auth::user()->name;

            // توجيه المستخدم إلى /{username} بعد تسجيل الدخول
            return redirect()->intended("/$username");
        }

        // في حال فشل تسجيل الدخول
        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }

    public function destroy(Request $request)
    {
        // تسجيل الخروج
        Auth::logout();

        // إلغاء الجلسة وتوليد مفتاح جديد
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // إعادة التوجيه إلى الصفحة الرئيسية
        return redirect('/');
    }
}
