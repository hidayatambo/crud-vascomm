<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerRegistrationMail;
use Str;
use App\Models\Customer;
use Auth;

class CustomerController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:customers,email',
        ]);

        // Generate random password
        $password = Str::random(10);

        $customer = Customer::create([
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);

        // Send email with generated password
        Mail::to($customer->email)->send(new CustomerRegistrationMail($customer, $password));

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Cek email Anda untuk informasi login.');
    }
        public function showLoginForm()
        {
            return view('auth.login');
        }

        public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('customer')->attempt($credentials)) {
                // Check if password matches using Hash::check
                if (Hash::check($request->password, Auth::guard('customer')->user()->password)) {
                    // Successful login
                    return redirect('/home');
                }
            }
            
            // Login failed
            return back()->withErrors(['email' => 'Invalid login credentials']);
        }
        public function logout()
        {
            Auth::guard('customer')->logout();
            return redirect('/');
        }

        public function home()
        {
            $user = auth('customer')->user();
            return view('home', ['user' => $user]);// Ganti 'home' dengan nama view halaman beranda Anda
        }
      
}
