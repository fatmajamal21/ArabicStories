<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        ContactMessage::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الرسالة');
    }
}
