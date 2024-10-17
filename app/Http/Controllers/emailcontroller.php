<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\AutoresponderMail;

class emailcontroller extends Controller
{

    public function showForm()
    {
        return view('about');
    }

    public function sendEmail(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('this is not the actual http request address or value')->send(new ContactMail($request->all()));

        Mail::to($request->input('email'))->send(new AutoresponderMail());

        return response()->json(['success' => true]);
    }
}
