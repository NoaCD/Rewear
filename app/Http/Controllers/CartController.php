<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $plan = Plan::find(session()->get('plan'));
        $products = Product::inRandomOrder()->paginate(4);
        return view('rewear.catalogo.cart',compact('plan','products'));
    }
}
