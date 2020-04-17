<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HellowController extends Controller
{
    public function verification()
    {
        return view('home/about',['about'=>'This is Our about Page']);
    }
    public function validation(Request $request)
    {
        $request->session()->flash('contact','This is our contact page');
        return view('home/contact');
    }
}
