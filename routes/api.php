<?php

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/user', function (){
    return \request()->user();
})->middleware('auth:sanctum');

Route::get('products', [ProductController::class,'index']);
Route::get('product/{slug}/show', [ProductController::class,'show']);

Route::post('/product/add', [ProductController::class,'store']);
Route::put('product/{id}/update',[ProductController::class,'update']);
Route::delete('product/{id}/delete',[ProductController::class,'destroy']);