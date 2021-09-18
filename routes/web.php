<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Session;

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



Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::get('/dashboard', "AdminController@index")->name("admin.dashboard");

    Route::get('/dashboard/rooms', "AdminController@rooms")->name("admin.room");
    Route::get('/dashboard/rooms/{id}/edit', "AdminController@roomEdit")->name("admin.room.edit");
    Route::get('/dashboard/rooms/{id}/delete', "AdminController@roomDelete")->name("admin.room.delete");
    Route::post('/dashboard/rooms/update', "AdminController@roomUpdate")->name("admin.room.update");

    Route::get('/dashboard/attributes', "AdminController@attributes")->name("admin.attributes");
    Route::post('/dashboard/attribute/add', "AdminController@addAttribute")->name("admin.attribute.add");
    Route::get('/dashboard/attribute/{id}/edit', "AdminController@attributeEdit")->name("admin.attr.edit");
    Route::get('/dashboard/attribute/{id}/delete', "AdminController@attributeDelete")->name("admin.attr.delete");
    Route::post('/dashboard/attribute/update', "AdminController@attributeUpdate")->name("admin.attr.update");
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('locale');

Route::prefix('{language}')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('locale');

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
