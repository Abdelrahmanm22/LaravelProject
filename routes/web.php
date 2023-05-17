<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\SettingsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['namespace'=>'Front'],function(){

    Route::get('/', [HomeController::class, 'index']);
});

Route::group(['namespace'=>'Back','prefix'=>'admin'],function(){

    Route::get('/register', [AdminController::class, 'register'])->name('register');
    // echo "hh";die;
    Route::post('/registration', [AdminController::class, 'postRegister'])->name('postRegister');


    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/postLogin', [AdminController::class, 'postLogin'])->name('postLogin');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::group(['middleware'=>'auth'],function(){
        Route::get('/home',[AdminController::class, 'index'])->name('adminHome');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/setting',[SettingsController::class, 'index'])->name('settings');
        Route::get('/updateSetting/{id}',[SettingsController::class,'update']);
        Route::post('/postUpdate/{id}',[SettingsController::class,'postUpdate'])->name('admin.update.setting');
    });
    
});

