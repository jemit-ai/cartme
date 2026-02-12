<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    
    public function loginForm()
    {
        return view('supplier.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $supplier = Supplier::where('email', $request->email)->first();

        if ($supplier && Hash::check($request->password, $supplier->password)) {
            Auth::guard('supplier')->login($supplier);
            return redirect()->route('supplier.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function dashboard()
    {
        return view('supplier.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('supplier')->logout();
        return redirect()->route('supplier.login');
    }    
    
        
         
}
