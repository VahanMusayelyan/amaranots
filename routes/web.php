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

        Route::get('/home', function (){
            return view("home");
        });
        Route::get('/about', function (){
            return view("about");
        });
        Route::get('/career', function (){
            return view("career");
        });
        Route::get('/contact', function (){
            return view("contact");
        });
        Route::get('/day-with-us', function (){
            return view("day_with_us");
        });
        Route::get('/greening', function (){
            return view("greening");
        });
        Route::get('/offers', function (){
            return view("offers");
        });
        Route::get('/sales', function (){
            return view("sales");
        });
        Route::get('/terms', function (){
            return view("terms");
        });
        Route::get('/tours', function (){
            return view("tours");
        });
        Route::get('/weekend', function (){
            return view("weekend");
        });
        Route::get('/why-amaranots', function (){
            return view("why_amaranots");
        });

    });
