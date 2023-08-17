<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('new',[usercontroller::class, 'fetchdata'])->name('fetch');

Route::get('users', [usercontroller::class, 'fetchyajradata'])->name('users');
    
Route::get('edit/{id}', [usercontroller::class, 'edityajradata'])->name('users.edit');

Route::post('update/{id}', [usercontroller::class, 'updateyajradata'])->name('users.update');

Route::get('delete/{id}', [usercontroller::class, 'deleteyajradata'])->name('users.delete');

Route::get('mail/{id}', [usercontroller::class, 'mailyajradata'])->name('users.mail');
