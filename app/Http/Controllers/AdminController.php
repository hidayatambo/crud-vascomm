<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\Product;



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
        $totalProducts = Product::count();
        $totalUsers = Customer::count();
        $activeProducts = Product::where('status', true)->count();
        $activeUsers = Customer::where('status', true)->count();
        $latestProducts = Product::where('status', true)->latest()->take(10)->get();

        return view('admin.dashboard', compact('totalProducts', 'totalUsers', 'activeProducts', 'activeUsers', 'latestProducts'));
    }
    
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    
    
}
