<?php

use App\Http\Controllers\Website\HomeController;
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
require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::post('/store', [HomeController::class, 'store'])->name('post.store');
});
Route::get('/', [HomeController::class, 'index'])->name('website.index');
