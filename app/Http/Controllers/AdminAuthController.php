<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    protected $guard = 'admin';

    public function showLoginForm()
    {
        $user = Auth::user();
      
        if (isset($user) && $user->role_id === 1) {
            return redirect()->intended('/admin/dashboard');
        } 
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role_id === 1) {
                return redirect()->intended('/admin/dashboard');
            } else {
                Auth::logout(); 
            }
        }

      

        // Authentication failed
        return redirect()->route('admin.login')
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();

        return redirect('/admin/login');
    }
}
