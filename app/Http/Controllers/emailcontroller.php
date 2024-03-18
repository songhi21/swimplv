<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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
        Mail::to('project.swim3@isu.edu.ph')->send(new ContactMail($request->all()));

        return response()->json(['success' => true]);
    }
}
