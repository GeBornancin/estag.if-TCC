<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
<<<<<<< HEAD
use App\Http\Controllers\EmpresaController;
=======
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
use Illuminate\Support\Facades\Route;
use App\Models\User;


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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/cursos', CursoController::class);
<<<<<<< HEAD
Route::resource('/empresas', EmpresaController::class);

Route::get('/empresas/{empresa}/logo', [EmpresaController::class, 'getAwsFile'])->name('empresas.logo');
=======
>>>>>>> 75697dd7a8bea343fba3233ad01e61981ebaa017
require __DIR__.'/auth.php';
