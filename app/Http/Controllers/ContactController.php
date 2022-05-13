<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        return view('user.contact');
    }
    public function store()
    {
        $contact_form_data = request()->all();
        Mail::to('alisamicse320@gmail.com')->send(new ContactFormMail($contact_form_data));
        return redirect()->route('contact')->with('message','Your message has been submitted successfully');
    }
}
