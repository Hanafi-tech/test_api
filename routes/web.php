<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\V1\Users;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::post('api/v1/login', [Users::class, 'login']);
// Route::post('api/v1/register', [Users::class, 'register']);
