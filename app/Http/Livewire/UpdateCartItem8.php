<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItem8 extends Component
{
    public $rowId, $qty;
    public $quantity;

    public function mount()
    {
        $item = Cart::instance('caja8')->get($this->rowId);
        $this->qty = $item->qty;
        $this->quantity = qty_available($item->id);
    }

    public function decrement()
    {
        if ($this->qty > 6) {
            $this->qty = $this->qty - 6;
        }
        Cart::instance('caja8')->update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function increment()
    {
        if (Cart::instance('caja8')->count()<72) {
            $this->qty += 6;
        }
        Cart::instance('caja8')->update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item8');
    }
}
