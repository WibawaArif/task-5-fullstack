<?php

use App\Http\Controllers\API\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('get', [DataController::class, 'index']); // route untuk read
Route::get('get/show/{id}', [DataController::class, 'show']); // route untuk read berdasarkan ID per item
Route::post('get/update/{id}', [DataController::class, 'update']); // route untuk update data
Route::get('get/destroy/{id}', [DataController::class, 'destroy']); // route untuk update data

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
