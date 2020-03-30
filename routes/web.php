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
    echo " Hi! saied ahammed Foyez this is your home";
});

Route::get('/news',function(){
    echo "This is our news protal";
});

Route::get('/contact',function(){
    echo "view all contact in our protal";
});

Route::get('/order',function(){
    echo "<h1>Place some order in here </h1>";
});
//match('get','post')