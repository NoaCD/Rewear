<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Plan;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CatalogueFilter extends Component
{
    public $colors=[],$sizes=[],$categories=[],$subcategories=[];
    public $products=[];
    public $category_id,$subcategory_id,$color_id,$size_id;
    public $color;
    public $plans;

    public function mount(){
        $this->plans = Plan::all();
        $this->colors = Color::all();
        $this->sizes = Size::all();
        $this->categories = Category::all();
        $this->subcategories = Subcategory::where('category_id',$this->category_id)->get();

        if ($this->color) {
            $this->color_id = $this->color->id;
            $this->products = Product::whereHas('colors',function(Builder $query){
                $query->where('color_id',$this->color->id);
            })->get();
        }else{
            $this->products = Product::where('status',2)->get();
        }

    }

    public function filter(){

        $productsQuery = Product::query()->where('status',2);

        if ($this->color_id) {
            $productsQuery = $productsQuery->whereHas('colors',function(Builder $query){
                $query->where('color_id',$this->color_id);
            });
        }

        if ($this->size_id) {
            $productsQuery = $productsQuery->whereHas('sizes',function(Builder $query){
                $query->where('size_id',$this->size_id);
            });
        }

        if ($this->subcategory_id) {
            $productsQuery = $productsQuery->where('subcategory_id',$this->subcategory_id);
        }

        $this->products = $productsQuery->get();
    }

    public function filterClean(){
        $this->products = Product::where('status',2)->get();

        $this->reset(['color_id','size_id','subcategory_id','category_id']);
    }

    public function getSubcategories(){
        $this->subcategories = Subcategory::where('category_id',$this->category_id)->get();
        if (!$this->subcategories) {
            $this->subcategory_id = $this->subcategories->first()->id;
        }
    }

    public function render()
    {
        return view('livewire.catalogue-filter');
    }
}
