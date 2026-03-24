<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', Password::default()],
        ]);

        if (! Auth::attempt($attributes)) {
            return back()
                ->withErrors([
                    'email' => 'We were unable to authenticate using the provided credentials.',
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', 'You are now logged in.');

    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
