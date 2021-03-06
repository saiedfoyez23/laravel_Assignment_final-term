<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NameController extends Controller
{
    public function home()
    {
        return view('home/buses');
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:buses|max:30|min:8',
            'operator' => 'required|max:30|min:3',
            'location' => 'required|max:100|min:3',
            'seat_row' => 'required',
            'seat_column' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['operator']=$request->operator;
        $data['location']=$request->location;
        $data['seat_row']=$request->seat_row;
        $data['seat_column']=$request->seat_column;
        $buses=DB::table('buses')->insert($data);
        if($buses)
        {
            $request->session()->flash('messege','Successfully buses inserted');
            $request->session()->flash('alert-type','success');
            
            return Redirect()->route('view');
        }
        else
        {

            $request->session()->flash('messege','Something wrong with db connection');
            $request->session()->flash('alert-type','error');
            return Redirect()->route('buses');
        }

    }
    public function view()
    {
        $buses=DB::table('buses')->get();
        return view('home/view_buses',compact('buses'));
    }
    public function edit($id)
    {
        $buses=DB::table('buses')->where('id',$id)->first();

        return view('home/edit_buses',compact('buses'));
    }
    public function edit_bus(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:buses|max:30|min:8',
            'operator' => 'required|max:30|min:3',
            'location' => 'required|max:100|min:3',
            'seat_row' => 'required',
            'seat_column' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['operator']=$request->operator;
        $data['location']=$request->location;
        $data['seat_row']=$request->seat_row;
        $data['seat_column']=$request->seat_column;
        $buses=DB::table('buses')->where('id',$id)->update($data);
        if($buses)
        {
            $notification= array(
                'messege'=>'Successfully bus information is updated',
                'alert-type'=>'info'
            );
            return Redirect()->back()->with($notification);
        }
        else
        {
            $notification= array(
                'messege'=>'Something wrong with db connection',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function delete($id)
    {
        $buses=DB::table('buses')->where('id',$id)->delete();
        $notification= array(
            'messege'=>'The bus information is deleted',
            'alert-type'=>'warning'
        );
        return Redirect()->back()->with($notification);
        
    }
}
