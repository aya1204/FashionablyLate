<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\AuthenticateSession;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Fortify\Facades\Fortify;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// お問い合わせフォーム入力画面
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

// お問い合わせフォームの送信
Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');


// 確認画面（GET）
Route::get('/confirm', function() {
    return view('confirm');
})->name('contact.confirm');

// 確認画面送信（POST）
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm.submit');

// 送信処理（POST）
Route::post('/store', [ContactController::class, 'store'])->name('store');

// 完了画面（GET）
Route::get('/thanks', function() {
    return view('thanks');
})->name('complete.thanks');


// 新規登録画面
Route::get('register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


// ログイン処理のPOSTルート
Route::post('/login', [LoginController::class, 'login'])->name('login');

// ログイン画面
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');



// 管理画面
// Route::middleware('auth')->group(function () {
//     Route::get('/admin', [CategoryController::class, 'index'])->name('admin');
// });
// Route::get('/admin', [CategoryController::class, 'admin']);

// /adminにgetリクエストが来たら管理画面を表示
Route::get('/admin', [CategoryController::class, 'index'])->name('admin')->middleware('auth');

// Route::post('/admin', [CategoryController::class, 'admin'])->name('admin');