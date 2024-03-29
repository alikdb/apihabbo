<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Badges;
use App\Http\Controllers\API\BadgesName;
use App\Http\Controllers\Home;
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

Route::get('/', [Home::class, 'index']);
Route::get('/badges', [Home::class, 'listBadges'])->name('listBadge');
Route::get('/furnis', [Home::class, 'listFurnis'])->name('listFurnis');
Route::get('/docs/badge', function () {
  return view('docs.badge');
});
Route::get('/about', function () {
    return view('about');
});


