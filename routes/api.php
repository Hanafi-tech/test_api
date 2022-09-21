<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Users;
use App\Http\Controllers\Produk;
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

Route::post('register', [Users::class, 'register']);
Route::post('login', [Users::class, 'login']);
Route::post('produk/create', [Produk::class, 'create']);
// Route::post('register')

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
});
