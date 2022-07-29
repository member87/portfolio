<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, "index"]);
Route::get('/get/readme/{project}', [Controller::class, "getReadme"])->name('getReadme');
Route::get('/get/info/{project}', [Controller::class, "getInfo"])->name('getInfo');
Route::get('/get/language/{project}', [Controller::class, "getLanguage"])->name('getLanguage');
Route::get('/get/cache/{project}', [Controller::class, "getCachedTime"])->name('getCache');
Route::get('/view/{project}', [Controller::class, "view"])->name('view');
