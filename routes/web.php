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
Route::get('/home',function(){
   return view('home/index');
})->name('blogs');


Route::get('/pizza','PizzaController@pizza')->name('pizza');

Route::get('/news','HellowController@verification')->name('news');
Route::get('/contact','HellowController@validation')->name('contact');

Route::prefix('home.')->group(function(){
    Route::group(['middleware' => ['verify']],function(){
        
        

    });
});


Route::prefix('pizza')->group(function(){
    Route::group(['middleware' => ['pizza']], function () {
        Route::get('/bigpizza','PizzaController@bigpizza');
        Route::get('/medumpizza','PizzaController@midumpizza');
        Route::get('/smallpizza','PizzaController@smallpizza');
    });
});


//match('get','post')