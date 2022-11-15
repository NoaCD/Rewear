<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Sku;
use Livewire\Component;

class SkuProduct extends Component
{
    public $product,$colors,$sizes;
    public $id_color="",$id_size="",$SKU;

    public function mount(){
        $this->colors = $this->product->colors;
        $this->sizes = $this->product->sizes;
    }

    public function save(){
        Sku::create([
           'color_product_id' => $this->id_color,
           'product_size_id' => $this->id_size,
           'SKU' => $this->SKU
        ]);
        $this->reset(['id_color','id_size','SKU']);
    }

    public function render()
    {
        return view('livewire.admin.sku-product');
    }
}
