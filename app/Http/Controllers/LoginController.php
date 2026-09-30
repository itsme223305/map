<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function getLogin()
    {
        return view('auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('admin.dashboard.get');
        }

        return back()->withErrors(['login' => 'Neuspesan pokušaj. Pogresan email ili lozinka.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/admin/login');
    }
}
