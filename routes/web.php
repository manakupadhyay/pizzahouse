<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth;

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

// NOTE: they are ranked in order of preference
Route::get('/pizzas', 'App\Http\Controllers\PizzaController@index')->middleware('auth');
Route::get('/pizzas/create', 'App\Http\Controllers\PizzaController@create');
Route::post('/pizzas', 'App\Http\Controllers\PizzaController@store');
Route::get('/pizzas/{id}', 'App\Http\Controllers\PizzaController@show')->middleware('auth'); 
Route::delete('/pizzas/{id}', 'App\Http\Controllers\PizzaController@destroy')->middleware('auth');
 
// this creates all the routes like login, register that laravel generated for us
// register => false deletes the register route...
Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
