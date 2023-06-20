<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', [CategoriaController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas user
Route::get('/user', [UserController::class, 'index'])->middleware('auth', 'verified')->name('user.index');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth', 'verified')->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->middleware('auth', 'verified')->name('user.update');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->middleware('auth', 'verified')->name('user.destroy');

//Rutas productos
Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/create', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->middleware('auth', 'verified')->name('producto.edit');
Route::put('/producto/edit/{id}',[ ProductoController::class, 'update'])->middleware('auth', 'verified')->name('producto.update');
Route::delete('/producto/delete/{producto}', 'ProductoController@destroy' )->middleware('auth', 'verified')->name('producto.destroy');

//Rutas descuentos



//Rutas compras
Route::get('/compra', [CompraController::class, 'index'])->middleware('auth')->name('compras.index');

//Rutas detalles


//Rutas categorias


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Ruta verificacion email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
require __DIR__.'/auth.php';
