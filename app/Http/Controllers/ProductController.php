<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    //
    public function getProduct(){

        $http = new \GuzzleHttp\Client();
        
        $response = $http->get(env('API_URL').'api/product');
        // $response = $http->request('GET', 'http://127.0.0.1:8000/api/product');
        $result = json_decode((string)$response->getBody(), true);
        // dd($result);
        // return $result;
        session()->put([
            'products' => $result

        ]);

        return view('ShowProduct', ['products'=>session('products')]);
    }

    public function sellProduct(){
        return view('SellProduct');
    }

    public function postProduct(Request $req){
        
    }

    
}
