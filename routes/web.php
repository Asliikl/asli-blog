<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

    });
 
});