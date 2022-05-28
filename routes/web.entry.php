<?php
use Illuminate\Support\Facades\Route;
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

Route::get('/entry', [App\Http\Controllers\EntryController::class, 'index']);
Route::get('/entry/summry/{id}', [App\Http\Controllers\EntryController::class, 'summry']);
Route::get('/entry/confirm/{id}', [App\Http\Controllers\EntryController::class, 'confirm']);
Route::post('/entry/complete', [App\Http\Controllers\EntryController::class, 'complete']);