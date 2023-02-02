<?php

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProjectsController;

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

Route::post('login', [UsersController::class, 'login']);
Route::post('register', [UsersController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('user-details', [UsersController::class, 'userDetails']);

    Route::group(["prefix"=>"todo"],function(){
        Route::get("/get/{id}",[TodoController::class,"get"]);
        Route::get("/getList",[TodoController::class,"getList"]);
        Route::post("/store",[TodoController::class,"store"]);
        Route::put("/update/{id}",[TodoController::class,"update"]);
        Route::put("/doneTodo/{id}",[TodoController::class,"doneTodo"]);
        Route::delete("/delete/{id}",[TodoController::class,"delete"]);
    });

    Route::group(["prefix"=>"project"],function(){
        Route::get("/getList",[ProjectsController::class,"getList"]);
        Route::post("/store",[ProjectsController::class,"store"]);
    });
});


