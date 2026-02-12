<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    //
    public function loginForm()
    {
        return view('admin.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Log::info($request->all());   

        $admin = Admin::where('email', $request->email)->first();

        Log::info($admin);   

        if ($admin && Hash::check($request->password, $admin->password)) {

            Log::info('admin'.$admin);

            Auth::guard('admin')->login($admin);

            Log::info('auth'.Auth::guard('admin')->user());

            return redirect()->route('admin.dashboard');

        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }    
    




}
