<?php

use App\Http\Controllers\BestellingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TableController;


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
Route::get('/tafel-overzicht', [BestellingController::class, 'tafelOverzicht'])->name('tafelOverzicht');
Route::get('/tafel-overzicht/{orderId}', [BestellingController::class, 'showItems'])->name('order.items');
Route::post('/orders/{orderId}/send-out', [BestellingController::class, 'sendOut'])->name('send.out');

Route::delete('/delete-order/{orderId}', [BestellingController::class, 'deleteOrder'])->name('delete.order');



Route::get('/tafel-overzichtapi', [BestellingController::class, 'apiTafelOverzicht']);


Route::get('/', function () {
    return view('home');
});

// De menu route moet buiten de closure van de hoofdpagina staan.
Route::get('/menu', [MenuController::class, 'index']);

Route::get('/menu/afrekenen', function () {
    return view('menu.afrekenen');
});


Route::post('/menu/betalen', [MenuController::class, 'storeOrder']);

Route::get('/tafel/{id}', [TableController::class, 'index']);

