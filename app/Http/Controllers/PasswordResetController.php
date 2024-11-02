<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password; // Import the Password facade
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;

class PasswordResetController extends Controller
{
    /**
     * Show the form for requesting a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showResetRequestForm()
    {
        return view('auth.reset'); // Adjust the view path as needed
    }

    /**
     * Send a password reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email address
        $request->validate(['email' => 'required|email']);

        // Attempt to send the password reset link
        $response = Password::sendResetLink($request->only('email'));

        // Check the response and return appropriate feedback
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }

    /**
     * Show the form for resetting the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        return view('auth.reset2')->with(
            ['token' => $request->route('token'), 'email' => $request->email]
        );
    }

    /**
     * Reset the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if (!$user) {
            return back()->withErrors(['email' => trans('passwords.user')]);
        }

        // Reset the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Fire the PasswordReset event
        event(new PasswordReset($user));

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('status', trans('passwords.reset'));
    }
}