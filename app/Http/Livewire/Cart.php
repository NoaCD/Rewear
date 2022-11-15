<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Livewire\Component;

class Cart extends Component
{   public $plan;
    public $listeners = ['render'];


    public function delete($rowId){
        FacadesCart::instance('caja1')->remove($rowId);
    }

    public function delete2($rowId){
        FacadesCart::instance('caja2')->remove($rowId);
    }

    public function delete3($rowId){
        FacadesCart::instance('caja3')->remove($rowId);
    }

    public function delete4($rowId){
        FacadesCart::instance('caja4')->remove($rowId);
    }

    public function delete5($rowId){
        FacadesCart::instance('caja5')->remove($rowId);
    }

    public function delete6($rowId){
        FacadesCart::instance('caja6')->remove($rowId);
    }

    public function delete7($rowId){
        FacadesCart::instance('caja7')->remove($rowId);
    }

    public function delete8($rowId){
        FacadesCart::instance('caja8')->remove($rowId);
    }

    public function delete9($rowId){
        FacadesCart::instance('caja9')->remove($rowId);
    }

    public function delete10($rowId){
        FacadesCart::instance('caja10')->remove($rowId);
    }


    public function destroy($value){
        switch ($value) {
            case '1':
                FacadesCart::instance('caja1')->destroy();
                break;
            case '2':
                FacadesCart::instance('caja2')->destroy();
                break;
            case '3':
                FacadesCart::instance('caja3')->destroy();
                break;
            case '4':
                FacadesCart::instance('caja4')->destroy();
                break;
            case '5':
                FacadesCart::instance('caja5')->destroy();
                break;
            case '6':
                FacadesCart::instance('caja6')->destroy();
                break;
            case '7':
                FacadesCart::instance('caja7')->destroy();
                break;
            case '8':
                FacadesCart::instance('caja8')->destroy();
                break;
            case '9':
                FacadesCart::instance('caja9')->destroy();
                break;
            case '10':
                FacadesCart::instance('caja10')->destroy();
                break;

            default:
                # code...
                break;
        }
    }

    public function empty(){
        FacadesCart::instance('caja1')->destroy();
        FacadesCart::instance('caja2')->destroy();
        FacadesCart::instance('caja3')->destroy();
        FacadesCart::instance('caja4')->destroy();
        FacadesCart::instance('caja5')->destroy();
        FacadesCart::instance('caja6')->destroy();
        FacadesCart::instance('caja7')->destroy();
        FacadesCart::instance('caja8')->destroy();
        FacadesCart::instance('caja9')->destroy();
        FacadesCart::instance('caja10')->destroy();
    }


    public function render()
    {
        return view('livewire.cart');
    }
}
