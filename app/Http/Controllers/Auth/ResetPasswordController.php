<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\ResetsPasswords;

// class ResetPasswordController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Password Reset Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller is responsible for handling password reset requests
//     | and uses a simple trait to include this behavior. You're free to
//     | explore this trait and override any methods you wish to tweak.
//     |
//     */

//     use ResetsPasswords;

//     /**
//      * Where to redirect users after resetting their password.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;
// }


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        // Validate the password reset request
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Validate the reCAPTCHA response
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Retrieve the token and email from the request
        $token = $request->input('token');
        $email = $request->input('email');

        // Attempt to reset the password
        $response = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Update the user's password
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->setRememberToken(Str::random(60)); // Regenerate the remember token
                $user->save();
            }
        );

        // Check the response and handle accordingly
        switch ($response) {
            case Password::PASSWORD_RESET:
                // Expire the password reset token
                DB::table('password_resets')
                    ->where('email', $email)
                    ->delete();
                
                // Redirect the user to the appropriate page with a success message
                return redirect()->route('login')->with('status', trans($response));

            default:
                // Redirect the user back to the reset password form with the appropriate error message
                return back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }
}
