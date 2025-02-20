<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/production', 'HomeController@production')->name('production');

use App\Http\Controllers\ProductionController;

Route::get('/production', [ProductionController::class, 'index'])->name('production');
Route::delete('/production/{id}', [ProductionController::class, 'destroy'])->name('production.destroy');

Route::get('/center', function () {
    return view('center');
});

Route::get('/about', function () {
    return view('about', ['name' => 'Ozibiusz Gergő', 'email' => 'gergo.ozibiusz@email.com']);
});

