<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class, 'index'])->name('home');

Route::prefix('test')->group(function(){

    Route::get ('login',   [TestController::class, 'login'])->name('t.login');
    Route::post('login',   [TestController::class, 'store']);

    Route::get('logout',   [TestController::class, 'logout'])->name('t.logout');
    Route::get ('register',[TestController::class, 'register'])->name('t.register');
    Route::post('register',[TestController::class, 'doRegister'])->name('t.register.do');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
