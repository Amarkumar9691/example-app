<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route for display adding task form*/
Route::get('add_task_form',[App\Http\Controllers\TaskController::class,'add_task_form'])->name('add-task-form')->middleware('auth');

/*Route to fetch record from tasklist and display in update form*/
Route::get('taskupdateform/{id}',[App\Http\Controllers\TaskController::class,'edit_task_form'])->name('edit-task-form')->middleware('auth');

/*Route to delete Task from tasklist*/
Route::delete('taskremove/{id}',[App\Http\Controllers\TaskController::class,'task_remove'])->name('task-remove')->middleware('auth');


Route::resource('profile',App\Http\Controllers\ProfileController::class)->middleware('auth');

