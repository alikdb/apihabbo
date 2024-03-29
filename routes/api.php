<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BadgesName;
use App\Http\Controllers\API\ShowBadge;
use App\Http\Controllers\API\FurnisController;
use App\Http\Controllers\API\ShowFurnis;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('badge/name/scanner', [BadgesName::class, 'scanBadgeName']);
Route::get('furni/scanner', [FurnisController::class, 'scanFurnis']);
Route::get('badges', [ShowBadge::class, 'index']);
Route::get('furnis', [ShowFurnis::class, 'index']);
