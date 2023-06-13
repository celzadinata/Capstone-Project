<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

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
        try {
            $request->validate([
                'email' => ['required', 'email'],
            ]);

            $response = $this->broker()->sendResetLink($request->only('email'));

            if ($response === Password::RESET_LINK_SENT) {
                return back()->with('status', trans($response));
            } else {
                throw ValidationException::withMessages([
                    'email' => [trans($response) ],
                ]);
            }
        } catch (ValidationException $exception) {
            throw $exception;
        }
    }

    protected function broker()
    {
        return Password::broker();
    }
}
