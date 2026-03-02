<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\SessionDataController;
use App\Http\Middleware\AppMiddleware;

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
Route::middleware([AppMiddleware::class])->group(function () {
Route::get('/', [AppController::class, 'homePage'])->name("home");
Route::get('/services', [AppController::class, 'services'])->name("services");
Route::get('/technologies', [AppController::class, 'technologies'])->name("technologies");
Route::get('/dynamic-slider', [AppController::class, 'dynamic_slider'])->name("dynamic_slider");
Route::get('/learn', [AppController::class, 'learn'])->name("learn");
Route::get('/contact', [AppController::class, 'contact'])->name("contact");
Route::get('/store', [AppController::class, 'store'])->name("store");
Route::get('/start-a-project', [AppController::class, 'start_a_project'])->name("start_a_project");
Route::post('/lang/{id}', [LangController::class, 'switch'])->name("langSwitch");
Route::post('/theme/{id}', [SessionDataController::class, 'switch'])->name("themeSwitch");
Route::post('/session/{id}/{value}', [SessionDataController::class, 'saveSession'])->name("saveSession");
Route::post('/file-uploader-free', [SessionDataController::class, 'fileUploaderFree'])->name("file-uploader-free");
});
