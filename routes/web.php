<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Usercontroller;
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

// 新規ユーザー登録画面
Route::get('/user/register', [Usercontroller::class, 'register'])->name('register');
// 登録ボタン（このボタンでユーザー情報をデータベースに登録）
Route::post('/user/Register', [Usercontroller::class, 'userRegister']);
// 確認画面
Route::post('/user/show', [Usercontroller::class, 'show'])->name('show');
// 登録されたユーザーを一覧表示
Route::get('/user/list', [Usercontroller::class, 'userlist'])->name('userlist');
// 誰の情報を更新するかを選択する更新ボタン
Route::get('/user/edit/{id}', [Usercontroller::class, 'edit'])->name('edit');
// 更新画面からの更新ボタン
Route::post('/user/edit', [Usercontroller::class, 'useredit'])->name('useredit');
// 検索ボタン
Route::get('/user/serch', [Usercontroller::class, 'serch'])->name('serch');
Route::get('/event/top',[EventController::class,'top'])->name('top');


Route::get('/event/register',[EventController::class,'register'])->name('register');
Route::post('/event/registerConfirm',[EventController::class,'registerConfirm']);

Route::post('/event/eventRegister',[EventController::class,'eventRegister']);

Route::get('/event/update/{id}',[EventController::class,'update']);
Route::post('/event/updateConfirm',[EventController::class,'updateConfirm']);

Route::get('/event/eventDelete/{id}',[EventController::class,'eventDelete']);

Route::get('/event/entrylist',[EventController::class,'entrylist']);

Route::get('/entry', [App\Http\Controllers\EntryController::class, 'index'])->name('entry');
Route::get('/entry/summry/{id}', [App\Http\Controllers\EntryController::class, 'summry']);
Route::get('/entry/confirm/{id}', [App\Http\Controllers\EntryController::class, 'confirm']);
Route::post('/entry/complete', [App\Http\Controllers\EntryController::class, 'complete']);