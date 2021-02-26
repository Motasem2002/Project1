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





Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix'=>'dashboard'],function (){
        Route::get('/',[\App\Http\Controllers\homeController::class, 'index'])->name('dashboard');
        Route::get('/users/user',[\App\Http\Controllers\usersController::class, 'create']);
        Route::post('/users/serv',[\App\Http\Controllers\usersController::class, 'store']);

    });

});



require __DIR__.'/auth.php';