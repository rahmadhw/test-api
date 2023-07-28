<?php


use App\Http\Controllers\Api\produkcontroller;
use App\Http\Controllers\Api\registercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('register', [registercontroller::class, 'store']);



Route::get('produk', [produkcontroller::class, 'index']);
Route::get('produk/{id}', [produkcontroller::class, 'show']);
Route::post('produk', [produkcontroller::class, 'store']);
Route::put('produk/{id}', [produkcontroller::class, 'update']);
Route::delete('produk/{id}', [produkcontroller::class, 'destroy']);
