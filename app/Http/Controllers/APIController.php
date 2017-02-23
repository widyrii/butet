<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\cake;
use App\shipping;
class APIController extends Controller
{
    public function get_item($code)
    {
    	$response = [];
    	$shipping = Shipping::where('code_shipping', $code)->first();
    	if (count($shipping) == 0) {
    		$response['success'] = 0;
    		return response()->json($response);
    	}
    	$response['success'] = 1;
    	$response['shipping'] = $shipping;
    	return response()->json($response);
    }
}
