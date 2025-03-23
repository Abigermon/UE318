<?php

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

Route::get('/hello', function () {
echo '<h1>Bonjour !</h1>';
});

Route::get('/bonjour/{nom}', function ($nom) {
echo "Bonjour " . $nom;
});

Route::get('nouvellepage','App\Http\Controllers\MonControleur@retourneNouvellePage');

Route::get('exemple', 'App\Http\Controllers\MonControleur@retournePageExemple');
Route::get('membres', 'App\Http\Controllers\ControleurMembres@index');
