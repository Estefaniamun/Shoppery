<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
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
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/show/{id}', [userController::class, 'show'])->middleware('auth', 'verified')->middleware('admin')->name('user.show');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth', 'verified')->middleware('admin')->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->middleware('auth', 'verified')->middleware('admin')->name('user.update');
Route::delete('/user/delete/{user}', [UserController::class, 'destroy'])->middleware('auth', 'verified')->middleware('admin')->name('user.destroy');

//Rutas productos
Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/show/{id}', [ProductoController::class, 'show'])->middleware('auth', 'verified')->name('producto.show');
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit'])->middleware('auth', 'verified')->middleware('admin')->name('producto.edit');
Route::put('/producto/edit/{id}',[ ProductoController::class, 'update'])->middleware('auth', 'verified')->middleware('admin')->name('producto.update');
Route::delete('/producto/delete/{producto}', [ProductoController::class, 'destroy'])->middleware('auth', 'verified')->middleware('admin')->name('producto.destroy');

//Rutas descuentos



//Rutas compras


//Rutas detalles


//Rutas categorias


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
