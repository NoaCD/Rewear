<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Color;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Product;



class PageController extends Controller
{
    public function index(){
        if (!session()->has('locale')) {
            $locale = session()->put('locale','es');
            if ($locale == 'es') {
                session(['divisa'=> 'MXN']);
            }else{
                session(['divisa'=> 'USD']);
            }
        }
        $colors = Color::all();
        $hombre = Category::where('name','LIKE','Hombre')->first();
        $mujer = Category::where('name','LIKE','Mujer')->first();
        $plans = Plan::all();
        $posts = Post::paginate(3);
        return view('rewear.index',compact('colors','hombre','mujer','plans','posts'));
    }

    public function about(){
        $plans = Plan::all();
        return view('rewear.nosotros',compact('plans'));
    }

    public function faq(){
        return view('rewear.faq');
    }

    public function contact(){
        return view('rewear.contacto');
    }

    public function setPlan(Plan $plan){
        /* session(['plan'=> $plan->id]); */
        /* Cart::destroy('default'); */
        switch ($plan->id) {
            case '1':
                session(['plan'=> $plan->id]);
                break;
            case '2':
                session(['plan'=> $plan->id]);
                break;
            case '3':
                session(['plan'=> $plan->id]);
                break;
        }
        return redirect()->route('catalogue.index');
    }


    public function setDivisas($divisa){
        session(['divisa'=> $divisa]);
        return back();
    }


    public function checkout(){
        $plan = Plan::find(session()->get('plan'));
        $products = Product::inRandomOrder()->paginate(4);
        $addresses = Address::where('user_id',auth()->user()->id)->get();
        return view('rewear.catalogo.purchase',compact('plan','products','addresses'));
    }
}
