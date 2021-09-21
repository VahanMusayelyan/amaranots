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

Route::prefix('dashboard')
    ->namespace('App\Http\Controllers')
    ->group(function () {
    Route::get('/', "AdminController@index")->name("admin.dashboard");

    Route::get('/rooms', "AdminController@rooms")->name("admin.room");
    Route::get('/rooms/{id}/edit', "AdminController@roomEdit")->name("admin.room.edit");
    Route::get('/rooms/{id}/delete', "AdminController@roomDelete")->name("admin.room.delete");
    Route::post('/rooms/update', "AdminController@roomUpdate")->name("admin.room.update");

    Route::get('/attributes', "AdminController@attributes")->name("admin.attributes");
    Route::post('/attribute/add', "AdminController@addAttribute")->name("admin.attribute.add");
    Route::get('/attribute/{id}/edit', "AdminController@attributeEdit")->name("admin.attr.edit");
    Route::get('/attribute/{id}/delete', "AdminController@attributeDelete")->name("admin.attr.delete");
    Route::post('/attribute/update', "AdminController@attributeUpdate")->name("admin.attr.update");

    Route::get('/other-attributes', "AdminController@otherAttributes")->name("admin.otherattributes");
    Route::post('/other-attribute/add', "AdminController@addOtherAttribute")->name("admin.otherattribute.add");
    Route::get('/other-attribute/{id}/edit', "AdminController@otherAttributeEdit")->name("admin.otherattr.edit");
    Route::get('/other-attribute/{id}/delete', "AdminController@otherAttributeDelete")->name("admin.otherattr.delete");
    Route::post('/other-attribute/update', "AdminController@otherAttributeUpdate")->name("admin.otherattr.update");

    Route::get('/blogs', "AdminController@blogs")->name("admin.blogs");
    Route::post('/blog/add', "AdminController@addBlog")->name("admin.blog.add");
    Route::get('/blog/{id}/edit', "AdminController@blogEdit")->name("admin.blog.edit");
    Route::get('/blog/{id}/delete', "AdminController@blogDelete")->name("admin.blog.delete");
    Route::post('/blog/update', "AdminController@blogUpdate")->name("admin.blog.update");
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
