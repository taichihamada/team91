<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Password;

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

Route::get('/', function () {
    return view('welcome');
});


//ログイン画面表示
Route::get('/login', [LoginController::class, 'login'])->name('login');
//認証処理
Route::post('/login',[LoginController::class, 'authenticate'])->name('authenticate');

//パスワード再発行(送信)フォーム表示
Route::get('/login/contact', [LoginController::class, 'index'])->name('index');
//パスワード再発行メールの自動送信設定
Route::post('/login/contact', [LoginController::class,'send'])->name('send');

//メールに添付のパスワード再発行URL画面を表示
Route::get('/login/posts/{token}', [LoginController::class,'posts']);
//パスワード変更のURL付きメールの送信処理
Route::post('/login/posts', [LoginController::class,'send']);

//メール送信完了のお知らせ画面表示
Route::get('/login/notice',[LoginController::class,'send']);

//パスワードのリセット処理後、ログイン画面に遷移
Route::get('/login/update', [LoginController::class,'update']);
//パスワードをハッシュ化してDBに保存
Route::post('/login/update', [LoginController::class,'update']);

//ログアウト
Route::get('/logout', [LoginController::class,'logout']);
