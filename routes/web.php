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
    return view('home.index');
});

route::get('/pizza',function(){
    return view('pizza',['resorse' => 'Welcome To Pizza Ordering Site']);
});

Route::prefix('home')->group(function(){
    Route::get('/news',function(){
        echo "This is our news protal";
    });
    
    Route::get('/contact',function(){
        echo "view all contact in our protal";
    });
    
    Route::get('/order',function(){
        echo "<h1>Place some order in here </h1>";
    });
});
Route::prefix('pizza')->group(function(){
    Route::get('/bigpizza',function(){
        echo "<h1>please order a big pizza</h1>";
    });
    Route::get('/medumpizza',function(){
        echo"<h1> please order a midum pizza </h1>";
    });
    Route::get('/smallpizza',function(){
        echo"<h1> please order a small pizza </h1>";
    });
});
//match('get','post')