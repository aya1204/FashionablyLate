<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('admin');
        }

        return redirect()->back()->withErrors(['email' => 'メールアドレスまたはパスワードが違います']);
    }
    protected function redirectTo()
    {
        return route('index');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('admin');  // /admin にリダイレクト
    }
}
