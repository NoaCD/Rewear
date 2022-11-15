<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DropdownCart extends Component
{
    protected $listeners = ['render'];

    public function delete($rowId){
        Cart::instance('caja1')->remove($rowId);
    }

    public function delete2($rowId){
        Cart::instance('caja2')->remove($rowId);
    }

    public function delete3($rowId){
        Cart::instance('caja3')->remove($rowId);
    }

    public function delete4($rowId){
        Cart::instance('caja4')->remove($rowId);
    }

    public function delete5($rowId){
        Cart::instance('caja5')->remove($rowId);
    }

    public function delete6($rowId){
        Cart::instance('caja6')->remove($rowId);
    }

    public function delete7($rowId){
        Cart::instance('caja7')->remove($rowId);
    }

    public function delete8($rowId){
        Cart::instance('caja8')->remove($rowId);
    }

    public function delete9($rowId){
        Cart::instance('caja9')->remove($rowId);
    }

    public function delete10($rowId){
        Cart::instance('caja10')->remove($rowId);
    }

    public function render()
    {
        $plan = Plan::find(session()->get('plan'));
        return view('livewire.dropdown-cart',compact('plan'));
    }
}
