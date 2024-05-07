<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('Admin.dashboard',['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admins', // Check uniqueness in admins table
                'password' => 'required|string|min:4',
            ]);
        } catch (ValidationException $e) {
            // If validation fails, redirect back with errors
            dd($e);
            return redirect()->back()->withErrors($e->validator->errors()->toArray())->withInput();
        }
    
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Create new admin
        $admin = Admin::create($validatedData);
        // Redirect to login page with success message
        return redirect()->route('admin login page')->with('success', 'Registration successful. Please login.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
