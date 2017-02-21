<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\cake;
use App\master_cake;
use App\contact;
class WelcomeController extends Controller
{
    public function index()
    {
        $master_cake = master_cake::with('class')->get();
    	$cake = array('cake'=>cake::orderBy('id','desc')->limit(6)->get());
        $cart = session('cart');
    	return view('welcome')->with($cake)->with('master_cakes',$master_cake)->with('cart',$cart);
    }

    public function cakes_detail($slug)
    {
        $master_cake = master_cake::with('class')->get();
    	$data = array('data'=>cake::where('slug',$slug)->first());
        $cart = session('cart');
    	return view('/user/cakes/detail')->with($data)->with('master_cakes',$master_cake)->with('cart',$cart);
    }
    public function category($code_cake)
    {

        // $master_cake = master_cake::where('name', $code_cake)->get();
        $cart = session('cart');
        $master_cake = master_cake::with('class')->get();
        $cake = cake::where('code_cake',$code_cake)->get();
        // $cake = [];

        // foreach ($master_cake as $key) {
        //     $data = cake::where('code_cake', $key->name)->first();
        //     if (count($data) > 0) {
        //         $cake = array_prepend($cake, $data);
        //     }
        // }
        
        return view('/user/cakes/category')->with('cake', $cake)->with('master_cakes',$master_cake)->with('cart',$cart);

        // return $cake;
    }

    public function contact()
    {
        $master_cake = master_cake::with('class')->get();
        $cake = array('cake'=>cake::orderBy('id','desc')->limit(6)->get());
        $cart = session('cart');
        return view('/user/contacts/contact')->with($cake)->with('master_cakes',$master_cake)->with('cart',$cart);
    }

    public function contact_save()
    {
            $data = new contact;
            $data->name=Input::get('name');
            $data->email = Input::get('email');
            $data->sub = Input::get('sub');
            $data->mess = Input::get('mess');


            $data->save();

            return redirect(url('/'));
    }

     public function checkout()
    {
        $master_cake = master_cake::with('class')->get();
        $cake = array('cake'=>cake::orderBy('id','desc')->limit(6)->get());
        $cart = session('cart');
        return view('/user/order/checkout')->with($cake)->with('master_cakes',$master_cake)->with('cart',$cart);
        return $cart;
    }

    public function save_cart(Request $r)
    {
        $key = count(session('cart'));
        $array  = session('cart');
        $array[$key+1]['id'] = Input::get('id');
        $array[$key+1]['code'] = Input::get('code');
        $array[$key+1]['code_cake'] = Input::get('code_cake');
        $array[$key+1]['name'] = Input::get('name');
        $array[$key+1]['desc'] = Input::get('desc');
        $array[$key+1]['price'] = Input::get('price');
        $array[$key+1]['image'] = Input::get('image');
        $array[$key+1]['slug'] = Input::get('slug');
        $array[$key+1]['quantity'] = "1";
        $array[$key+1]['subtotal'] = Input::get('subtotal');
        $array[$key+1]['total'] = Input::get('subtotal')+10000;

        $r->session()->put('cart',  $array);
        
         // return $cart;
        return redirect()->back();


    }

     public function shipping()

    {      
            return view('/order.shipping');
    }

}

