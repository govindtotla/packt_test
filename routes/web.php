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


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
	
		Route::post('/posts/create', [App\Http\Controllers\PostController::class, 'create']);
		Route::post('/posts', [App\Http\Controllers\PostController::class, 'store']);

		Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show']);
		Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit']);
		Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update']);
		Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy']);

	});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);


Route::post('/storeCar','CarsController@storeCar');
Route::get('/getCars', 'CarsController@getCars');
Route::post('/deleteCar/{id}', 'CarsController@deleteCar');
Route::post('/editCars/{id}', 'CarsController@editCar');

Route::get('/word', [App\Http\Controllers\CarsController::class, 'word'])->name('word');


