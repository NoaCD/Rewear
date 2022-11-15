<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductSize as ModelsProductSize;
use App\Models\Size;
use Livewire\Component;

class ProductSize extends Component
{
    public $product,$sizes,$sizes_id,$size_product,$open=false;
    public $size,$size_id,$sku;
    protected $listeners = ['render'];


    public function mount(){
        $this->sizes = Size::all();
        $this->size_product = ModelsProductSize::where('product_id',$this->product->id)->get();
    }

    public function edit(ModelsProductSize $size){
        $this->open = true;
        $this->sku = $size->sku;
        $this->size_id = $size->id;
        $this->size = $size;
    }

    public function save(){
        $product = $this->product;
        $product->sizes()->attach($this->sizes_id);
        $this->size_product = ModelsProductSize::where('product_id',$product->id)->get();
    }

    public function update(ModelsProductSize $size){

        $size->update([
            'sku' => $this->sku,
        ]);
        $this->open = false;
    }

    public function delete(ModelsProductSize $size){
        $size->delete();
        $this->size_product = ModelsProductSize::where('product_id',$this->product->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.product-size');
    }
}
