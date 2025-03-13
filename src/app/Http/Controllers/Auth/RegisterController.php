<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // 登録フォームを表示
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    public function register(StoreUserRequest $request)
    {
        // バリデーションが成功した場合にユーザーを作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ログインして管理画面にリダイレクト
        Auth::login($user);

        return redirect()->route('login'); // ログイン画面へリダイレクト
    }
}
