<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontEndController extends Controller
{
    public function index(){

        $products = Product::paginate(3);
        return view('index')->with('products',$products);
    }

    public function single(Product $product){

        return view('single')->with('product',$product);
    }
}
