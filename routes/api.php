<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\UsersApiController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
//rutas para los endpoints users
Route::apiResource('users', UsersApiController::class);
//rutas para los endpoints posts
Route::apiResource('posts', PostsApiController::class)->only(['show']);
Route::get('/posts/top', 'App\Http\Controllers\PostsApiController@postsTop')->name('posts.top');
