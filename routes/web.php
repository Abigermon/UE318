<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('membres', [ControleurMembres::class, 'index']);
Route::get('membre/{numero}', [ControleurMembres::class, 'afficher']);
Route::get('creer', [ControleurMembres::class, 'creer']);
Route::post('creation/membre', [ControleurMembres::class, 'enregistrer']);
Route::get('modifier/{id}', [ControleurMembres::class, 'editer']);
Route::patch('miseAJour/{id}', [ControleurMembres::class, 'miseAJour']);
Route::get('/identite','App\Http\Controllers\ControleurMembres@identite');
Route::get('/protege','App\Http\Controllers\ControleurMembres@acces_protege')
->middleware('auth');

require __DIR__.'/auth.php';
