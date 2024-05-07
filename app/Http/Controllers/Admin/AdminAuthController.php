<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login_form(){
        return view('Admin.login');
    }

    public function register_form(){
        return view('Admin.register');
    }

    public function adminLogin(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.index');
        }

        // If both email and password are incorrect
        if (!Auth::guard('admin')->validate(['email' => $request->email, 'password'=>$request->password])) {
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
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin login page');
    }
    
}
