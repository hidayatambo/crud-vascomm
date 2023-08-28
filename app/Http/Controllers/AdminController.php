<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    
    public function showAdminLoginForm()
    {
        return view('admin.login');
    }
    
    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Check if password matches using Hash::check
            if (Hash::check($request->password, Auth::guard('admin')->user()->password)) {
                // Successful login
                return redirect()->route('admin.dashboard');
            }
        }
        return back()->withErrors(['email' => 'Invalid login credentials']);
    }
    
    public function adminDashboard()
    {
        return view('admin.dashboard');
    }
    
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
    
}
