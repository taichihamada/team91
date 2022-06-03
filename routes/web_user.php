<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

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