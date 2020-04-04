<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function home()
    {
        return view('home/post',['post'=>'Please Write some Post Here']);
    }
}
