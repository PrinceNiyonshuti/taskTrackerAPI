<?php

use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tasks',[TaskController::class,'index']);
Route::get('/tasks/read/{id}',[TaskController::class,'show']);
Route::prefix('/tasks')->group(function(){
    Route::post('/store',[TaskController::class,'store']);
    Route::put('/{id}',[TaskController::class,'update']);
    Route::delete('/{id}',[TaskController::class,'destroy']);
});
