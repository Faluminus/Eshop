<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

class HomeController extends Controller
{
    public function redirect(Request $request){
        $usertype=Auth::user()->usertype;
        if($usertype=='admin'){
            $data = product::all();
            return view('admin.home',compact('data'));
        }else{
            $cart = $request->session()->get('cart',[]);
            return view('dashboard',compact('cart'));
        }
    }

    public function index(){
        $data = product::all();
        return view('welcome',compact('data'));
    }

    public function addcart(Request $request,$id){
        if(Auth::id()){
            $user = auth()->user();
            
            $product = Product::find($id);

            $cart = session()->get('cart', []);

            if(isset($cart[$request->id])) {
                $cart[$request->id]['quantity']++;
            } else {
                $cart[$request->id] = [
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "id" => $product->id
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
            return redirect('login');
        }
    }

    public function removecart(Request $request ,$id)
    {
        if(Auth::id()){
            $user = auth()->user();
            
            $cart = session()->get('cart', []);

            if($cart[$request->id] > 1) {
                $cart[$request->id]['quantity']--;
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
        else{
            return redirect('login');
        }
    }
    public function cleancart(Request $request)
    {
        if(Auth::id()){
            $user = auth()->user();
            
            $cart = [];
            
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
        else{
            return redirect('login');
        }
    }
}
