<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userr;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Userr::where('username', $request->username)->first();

        if ($user && $request->password === $user->password) {
        } else {    
            return back()->withErrors(['login' => 'Username atau password salah']);
        }

        session(['userr_id' => $user->id, 'userr_role' => $user->role]);

        if ($user->role === 'Pengurus') {
            return redirect()->route('home');
        } elseif ($user->role === 'Jamaah') {
            return redirect()->route('landing'); 
        }

        return back()->withErrors(['login' => 'Role tidak dikenali']);
    }

    public function logout()
    {
        session()->forget(['userr_id', 'userr_role']);
        return redirect()->route('login.form');
    }
}