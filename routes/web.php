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
        Route::get('/news',function(){
            return view('home/news',['news'=>'This is Our New Portal']);
        });
        
        Route::get('/contact',function(){
            return view('home/contact',['contact'=>'This is our contact page']);
        });
        
        Route::get('/order',function(){
            return view('home/order',['orders'=>'This is our Order page']);
        });

    });
});


Route::prefix('pizza')->group(function(){
    Route::group(['middleware' => ['age']], function () {
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
});


//match('get','post')