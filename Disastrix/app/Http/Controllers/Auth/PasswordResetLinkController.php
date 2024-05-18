<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Resetmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Attempt to send the password reset link
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Check the status of the password reset link
        if ($status == Password::RESET_LINK_SENT) {
            // Retrieve the user by email
            $user = User::where('email', $request->email)->first();
            if ($user) {
                // Generate the token
                $token = app('auth.password.broker')->createToken($user);
                // Generate the reset link
                $resetLink = url(config('app.url') . route('password.reset', ['token' => $token, 'email' => $request->email], false));

                // Send the reset email
                Mail::to($request->email)->send(new Resetmail($resetLink));
            }

            return back()->with('status', __($status));
        } else {
            return back()->withInput($request->only('email'))
                         ->withErrors(['email' => __($status)]);
        }
    }
}

