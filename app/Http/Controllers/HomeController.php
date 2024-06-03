<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='admin'){
            return view('admin.home');
        }else{
            return view('dashboard');
        }
    }
}
