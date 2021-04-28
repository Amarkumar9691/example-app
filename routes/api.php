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


Route::post('register',[App\Http\Controllers\ApiController::class,'register']);
Route::post('login',[App\Http\Controllers\ApiController::class,'login']);

Route::any('Unauthorized',function(){

      return response(['message'=>'Invalid Api Key or Token','status'=>0]);

})->name('apifails');



Route::prefix('todo')->middleware('auth:api')->group(function(){

       Route::post('/add',[App\Http\Controllers\TaskController::class, 'add']);
       Route::post('/status',[App\Http\Controllers\TaskController::class, 'status']);


});