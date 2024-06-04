<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Product;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='admin'){
            $data = product::all();
            return view('admin.home',compact('data'));
        }else{
            return view('dashboard');
        }
    }

    public function index(){
        $data = product::all();
        return view('welcome',compact('data'));
    }
}
