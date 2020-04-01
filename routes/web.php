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
});


Route::get('/pizza',function(){
    return view('pizza',['resorse' => 'Welcome To Pizza Ordering Site']);
});



Route::prefix('home')->group(function(){
    Route::group(['middleware' => ['verify']],function(){
        Route::get('/news','HellowController@verification');
        Route::get('/contact','HellowController@validation');
        Route::get('/order','NameController@home');

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