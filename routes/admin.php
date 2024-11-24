<?php

use App\Http\Controllers\Dashboard\WelcomeController;
use App\Http\Controllers\Dashboard\AuthController;

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware'=>['auth:admin']], function () {

    Route::get('/',[WelcomeController::class,'index'])->name('welcome');

    //logout route
    Route::post('logout', [AuthController::class,'logout'])->name('logout');

    //admin route
    Route::resource('admin', AdminController::class)->except('show');

    //post route
    Route::resource('post', PostController::class)->except('show');

});  /** End of Route Group  */



/** Start Auth Section */

Route::group(['middleware'=>'guest:admin'], function () {

    Route::get('login',  [AuthController::class,'getLogin'])->name('getLogin');
    Route::post('login',  [AuthController::class,'login'])->name('login');

});
