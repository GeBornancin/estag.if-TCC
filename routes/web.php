<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\VinculoController;
use App\Http\Controllers\OrientadorController;
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
Route::resource('/empresas', EmpresaController::class);
Route::resource('/vagas', VagaController::class);
Route::resource('/vinculos', VinculoController::class);
Route::get('/orientadores', [OrientadorController::class, 'index'])->name('orientadores.index');
Route::get('/orientadores/create', [OrientadorController::class, 'create'])->name('orientadores.create');
Route::post('/orientadores', [OrientadorController::class, 'store'])->name('orientadores.store');
Route::get('/orientadores/{orientador}/edit', [OrientadorController::class, 'edit'])->name('orientadores.edit');
Route::put('/orientadores/{orientador}', [OrientadorController::class, 'update'])->name('orientadores.update');
Route::delete('/orientadores/{orientador}', [OrientadorController::class, 'destroy'])->name('orientadores.destroy');


require __DIR__.'/auth.php';
