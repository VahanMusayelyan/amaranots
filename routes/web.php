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
    return redirect("/en");
});

Auth::routes();





// Backend routes
Route::prefix('{language}')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('locale');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
        Route::get('/main', [App\Http\Controllers\HomeController::class, 'main'])->name('main');

    });
