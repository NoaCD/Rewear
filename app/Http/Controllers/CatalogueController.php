<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;


class CatalogueController extends Controller
{
    public function index(Color $color = null){
            return view('rewear.catalogo.index',compact('color'));
    }

    public function product(Product $product){
        $products = Product::inRandomOrder()->paginate(4);
        return view('rewear.catalogo.producto',compact('product','products'));
    }
}
