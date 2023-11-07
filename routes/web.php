<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;

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



Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'auth/login','middleware' => 'admin.notlogged'], function () {
        Route::get("", [AdminController::class, "login"])->name("admin.login");
        Route::post("", [AdminController::class, "loginPost"])->name("admin.login.post");
    });

    Route::get("logout", [AdminController::class, "logout"])->name("admin.logout");
    
    Route::group(['middleware' => 'admin.logged'],function(){

        Route::get("home", [AdminController::class, "home"])->name("admin.home"); 
        Route::group(['prefix' => 'blog'],function(){
            Route::get("", [BlogController::class, "blog"])->name("admin.blog");
            Route::group(['prefix' => 'add'],function(){ //prefixe sadece string değil data da girilebilir {blog} gibi
                Route::get("", [BlogController::class, "blogAdd"])->name("admin.blogAdd");
                Route::post("", [BlogController::class, "blogStore"])->name("admin.blogStore");
            });
            
            Route::get("edit/{blog}", [BlogController::class, "blogEdit"])->name("admin.blogEdit");
            Route::post("update/{blog}", [BlogController::class, "blogUpdate"])->name("admin.blogUpdate");
            Route::get("delete/{blog}", [BlogController::class, "blogDelete"])->name("admin.blogDelete");
        });
    });
 
});