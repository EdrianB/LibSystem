<?php

namespace App\Http\Controllers\Students\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    public function login_page()
    {
        return view('Students.auth.login');
    }

    public function register_page()
    {
        //return view('Students.auth.register');
    }

    public function loginStudent(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('student')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('student.index');
        }

        // If both email and password are incorrect
        if (!Auth::guard('student')->validate(['email' => $request->email])) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email' => 'Invalid email or password']);
        }

        // If only the password is incorrect
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['password' => 'Invalid password']);
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('student_login_form');
    }
}
