<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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

// De menu route moet buiten de closure van de hoofdpagina staan.
Route::get('/menu', [MenuController::class, 'index']);

Route::get('/menu/afrekenen', function () {
    return view('menu.afrekenen');
});

Route::post('/menu/betalen', [MenuController::class, 'storeOrder']);