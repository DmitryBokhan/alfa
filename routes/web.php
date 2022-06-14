<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//маршруты для админа
Route::middleware(['role:admin'])->prefix('admin_panel')->group( function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);

});


//маршруты пользователя 
Route::group(['middleware' => ['role:user']], function () {
   
});