<?php

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


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/project')->group(function () {
    Route::get("/create", "ProjectController@create")->name("project.create");
    Route::get("/edit/{project}", "ProjectController@edit")->name("project.edit");
    Route::post("/store", "ProjectController@store")->name("project.store");
    Route::post("/edit/store/{project}", "ProjectController@update")->name("project.edit.action");
    Route::get("/index/{project}", "ProjectController@index")->name("project.index");
});
Route::prefix('/user')->group(function () {
    Route::post("/edit/{user}", "HomeController@store")->name("user.edit.action");
    Route::get("/edit/{user}", "HomeController@edit")->name("user.edit");
});
Route::prefix('/task')->group(function () {
    Route::post("/store", "TaskController@store")->name("task.store");
    Route::post("/delete", "TaskController@destroy")->name("task.delete");
});
