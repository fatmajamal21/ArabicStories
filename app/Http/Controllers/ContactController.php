<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function create()
    {
        return view('visitor.contact-us');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'   => 'required|email',
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($request->only([
            'email',
            'name',
            'address',
            'message',
        ]));

        return back()->with('success', 'تم إرسال رسالتك بنجاح');
    }
}
