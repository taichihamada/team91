<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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


Route::get('/event/top',[EventController::class,'top'])->name('top');


Route::get('/event/register',[EventController::class,'register'])->name('register');
Route::post('/event/registerConfirm',[EventController::class,'registerConfirm']);

Route::post('/event/eventRegister',[EventController::class,'eventRegister']);

Route::get('/event/update/{id}',[EventController::class,'update']);
Route::post('/event/updateConfirm',[EventController::class,'updateconfirm']);

Route::get('/event/eventDelete/{id}',[EventController::class,'eventDelete']);

Route::get('/event/entrylist',[EventController::class,'entrylist']);