<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskApiController;
use App\Http\Controllers\AuthApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[AuthApiController::class, 'login']); 


Route::group(['middleware' => ['auth']], function () {   
  Route::apiResource('task', TaskApiController::class);
});
