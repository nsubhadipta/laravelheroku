<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/allUser', [UserController::class, 'getAllUser']);
Route::post('/signup', [UserController::class, 'createUser']);
Route::get('/getUser/{id}', [UserController::class, 'getUser']);

Route::get('/alluff/{name?}', [UserController::class, 'alluff']);
Route::get('/search/{query?}', [UserController::class, 'search']);


Route::get('/getUserDetails/{id}', [UserController::class, 'getUserDetails']);
Route::post('/AddUserDetails/{user_id}', [UserController::class, 'AddUserDetails']);
Route::delete('/deleteUserDetails/{id}', [UserController::class, 'deleteUserDetails']);
Route::post('/login', [UserController::class, 'login']);
