<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\master_cake;
use App\cake;
use Auth;
use App\contact;
use App\shipping;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type=='admin'){
        return view('home');
        }
        else{
            return redirect(url('welcome'));
        }
    }

    public function master_cake_add()
    {
        return view('/admin/master_cake/add');
    }
    public function master_cake_save()
    {
        $data = new master_cake;
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();
        return redirect(url('/master_cake/table'));
    }
    public function master_cake_table()
    {
        $data = master_cake::all();
        return view('/admin/master_cake/table')->with('data',$data);
    }

    public function master_cake_edit($id) 
    {
        $data = array('data'=>master_cake::find($id));
        return view('admin/master_cake/edit')->with($data);
    }
    public function master_cake_update()
    {
        $data = master_cake::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->name = Input::get('name');
        $data->save();
        return redirect(url('/master_cake/table'));
    }
     public function master_cake_delete($id)
    {
        master_cake::find($id)->delete();
        return redirect(url('/master_cake/table'));
    }

    public function cake_add()
    {
        $master_cake = master_cake::all();
        return view('/admin/cake/add')->with('master_cakes', $master_cake);
    }
    public function cake_save()
    {
        $data = new cake;
        $data->code = Input::get('code');
        $data->code_cake = Input::get('code_cake');
        $data->name = Input::get('name');
        $data->desc = Input::get('desc');
        $data->price = Input::get('price');
        $data->slug = str_slug(Input::get('name'));


        if(Input::hasFile('image')){
            $image = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('image')->getClientOriginalExtension();

            Input::file('image')->move(storage_path(),$image);
            $data->image = $image;

         }

        $data->save();
        return redirect(url('/cake/table'));
    }
    public function cake_table()
    {
        $data = cake::all();
        return view('/admin/cake/table')->with('data',$data);
    }

    public function cake_edit($id) 
    {
        $master_cake = master_cake::all();
        $data = array('data'=>cake::find($id));
        return view('admin/cake/edit')->with($data)->with('master_cakes', $master_cake);
    }
    public function cake_update()
    {
        $data = cake::find(Input::get('id'));
        $data->code = Input::get('code');
        $data->code_cake = Input::get('code_cake');
        $data->name = Input::get('name');
        $data->desc = Input::get('desc');
        $data->price = Input::get('price');
        $data->slug = str_slug(Input::get('name'));


        if(Input::hasFile('image')){
            $image = date('YmdHis')
            .uniqid()
            ."."
            .Input::file('image')->getClientOriginalExtension();

            Input::file('image')->move(storage_path(),$image);
            $data->image = $image;

         }
        $data->save();
        return redirect(url('/cake/table'));
    }
     public function cake_delete($id)
    {
        cake::find($id)->delete();
        return redirect(url('/cake/table'));
    }

    public function contact_table()
    {
        $data = contact::all();
        return view('/admin/contact/table')->with('datas',$data);
    }

    public function shipping_table()
    {
        $data = shipping::all();
        return view('/admin/shipping/table')->with('datas',$data);
    }

     public function shipping_delete($id)
    {
        shipping::find($id)->delete();
        return redirect(url('/shipping/table'));
    }

     public function shipping_accept($id)
    {
       $data = shipping::find($id);
       $data->status = "accepted";
       $data->save();
       return redirect(url('shipping/table'));
    }

     public function shipping_reject($id)
    {
       $data = shipping::find($id);
       $data->status = "rejected";
       $data->save();
       return redirect(url('shipping/table'));
    }

    public function shipping_sendemail(Request $r, $code_shipping)
    {
        $email= $r->input('email');
        $user = shipping::where('email', $email)->first();
        $code_shipping= $r->input('code_shipping');

        try{
            $a = new \PHPMailer(true);
            $a->isSMTP();
            $a->CharSet = "utf-8";
            $a->SMTPAuth = true;
            $a->SMTPSecure = "tls";
            $a->SMTPAuth = true;
            $a->Host = "smtp.gmail.com";
            $a->Port = 587;
            $a->Username = "widya985@gmail.com";
            $a->Password = "ariwidya";
            $a->SetFrom("widya985@gmail.com", "Widya Ari");
            $a->Subject = "Confirmation Order Butet Cakes";
            $a->MsgHTML('<h2> Hi'.$user->email.' ,</h2>'.
                        '<h3>'.$code_shipping.'</h3>'.
                        'Please confirmed check your order with an order code '. '<a href="http//butet.ga/cek_order">'.'click here'.'</a>'.'and would soon be at your adrress. For more information, please visit the Help Center or contact our'.'</a href="">'.' Customer Service.'.'</a>' );

            $a->addAddress($email);
            $a->send();
            }
            catch(Exception $e) {
                dd($e);
            }

            



        }

    public function cek_order()
    {
        $data = master_cake::all();
        return view('user.order.cek_order')->with('data',$datas);
    }

}
