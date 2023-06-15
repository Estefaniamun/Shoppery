<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas user
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/show/{id}', [userController::class, 'show'])->middleware('auth', 'verified')->middleware('admin')->name('user.show');
Route::get('/user/edit/{id}', 'userController@edit')->middleware('auth', 'verified')->middleware('admin')->name('user.edit');
Route::put('/user/edit/{id}', 'userController@update')->middleware('auth', 'verified')->middleware('admin')->name('user.update');
Route::delete('/user/delete/{user}', 'userController@destroy')->middleware('auth', 'verified')->middleware('admin')->name('user.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
