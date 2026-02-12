<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    
    public function loginForm()
    {
        return view('seller.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $seller = Seller::where('email', $request->email)->first();

        if ($seller && Hash::check($request->password, $seller->password)) {
            Auth::guard('seller')->login($seller);
            return redirect()->route('seller.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {
        return view('seller.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        return redirect()->route('seller.login');
    }    
    


}
