<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

// class ForgotPasswordController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Password Reset Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller is responsible for handling password reset emails and
//     | includes a trait which assists in sending these notifications from
//     | your application to your users. Feel free to explore this trait.
//     |
//     */

//     use SendsPasswordResetEmails;
// }
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Call Laravel's built-in password broker to send the reset link
        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        // Determine the response to send back to the user
        return $response == Password::RESET_LINK_SENT
                    ? response()->json(['message' => 'Password reset link sent successfully'], 200)
                    : response()->json(['message' => 'Unable to send reset link'], 422);
    }
}