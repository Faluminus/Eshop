<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;


class AdminController extends Controller
{
    public function uploadproduct(Request $request){
        $data=new product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        
        $data->save();

        return redirect()->back();
    }
    public function deleteproduct($id){
        $data = product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updateview($id){
        $data = product::find($id);
        return view('admin.updateproduct',compact('data'));
    }
    public function updateproduct(Request $request ,$id){
        $data = product::find($id);

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        
        $data->save();

        return redirect() ->back()->with('message','Product update successfully');
    }
}
