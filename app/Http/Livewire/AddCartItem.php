<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddCartItem extends Component
{
    public $qty = 1;
    public $quantity = 0;
    public $product;
    public $options = [];


    public function mount()
    {
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }

    public function decrement()
    {
        $this->qty -= 1;
    }

    public function increment()
    {
        $this->qty += 1;
    }

    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);
        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
    }
}
