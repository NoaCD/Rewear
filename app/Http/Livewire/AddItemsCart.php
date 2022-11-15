<?php

namespace App\Http\Livewire;

use App\Models\ColorProduct;
use App\Models\Image;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductSize;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AddItemsCart extends Component
{
    public $product,$images=[],$colors,$color_id="",$size_id="", $color_limite=0;
    public $qty=6;
    public $options = [];

    public function mount(Product $product){
        $this->images = $product->images->where('main','!=','si');
        $this->colors = $product->colors;
        $this->color_id = $product->colors->first()->pivot->id;
        /* Cart::instance('caja1')->destroy();
        Cart::instance('caja2')->destroy();
        Cart::instance('caja3')->destroy();
        Cart::instance('caja6')->destroy();
        session()->forget('caja');
        session()->forget('plan'); */
    }

    public function increment(){
        switch (session()->get('caja')) {
            case '1':
                if ($this->qty+Cart::instance('caja1')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '2':
                if ($this->qty+Cart::instance('caja2')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '3':
                if ($this->qty+Cart::instance('caja3')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '4':
                if ($this->qty+Cart::instance('caja4')->count() < 72) {
                    $this->qty = $this->qty+ 6;
                }
            break;
            case '5':
                if ($this->qty+Cart::instance('caja5')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '6':
                if ($this->qty+Cart::instance('caja6')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '7':
                if ($this->qty+Cart::instance('caja7')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '8':
                if ($this->qty+Cart::instance('caja8')->count() < 72) {
                    $this->qty = $this->qty+ 6;
                }
            break;
            case '9':
                if ($this->qty+Cart::instance('caja9')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;
            case '10':
                if ($this->qty+Cart::instance('caja10')->count() < 72) {
                    $this->qty = $this->qty + 6;
                }
            break;

            default:
                if ($this->qty < 72) {
                    $this->qty = $this->qty + 6;
                }
                break;
        }
    }

    public function decrement(){
        if ($this->qty > 6) {
            $this->qty = $this->qty - 6;
        }
    }

    public function addItems(){
        $color = ColorProduct::find($this->color_id);
        $size = ProductSize::find($this->size_id);
        $this->options['image'] = Storage::url($this->product->images->where('main','si')->first()->url);
        /* $size = $this->product->size->find($this->color_id); */
        $this->options['color'] = $color->color->name;
        $this->options['color_id'] = $color->color->id;
        $this->options['size'] = $size->size->code;
        $this->options['size_id'] = $size->id;
        $this->options['sku'] = $size->sku;
        $this->options['manga'] = $this->product->subcategory->name;
        $this->options['name_en'] = $this->product->name_en;


        $color_limite=0;
        $color_limite2=0;
        $color_limite3=0;
        $manga_limit = 0;
        $manga_limit2 = 0;
        $manga_limit3 = 0;
        $manga_limit4 = 0;
        $manga_limit5 = 0;
        $manga_limit6 = 0;
        $manga_limit7 = 0;
        $manga_limit8 = 0;
        $manga_limit9 = 0;
        $manga_limit10 = 0;
        $colors_array=[];



        if (session()->has('plan')) {
            $plan = Plan::find(session()->get('plan'));
            switch (session()->get('plan')) {
                //Validaciones para el plan Start
                case '1':
                    //Creamos el array para validar que solo 2 colores se pueden agregar a la cesta en este plan
                    if (Cart::instance('caja1')->count()) {
                        foreach (Cart::instance('caja1')->content() as $item) {
                            array_push($colors_array,$item->options->color);
                        }
                        //Generamos un array de los valores del color sin repetir
                        $colors_array = array_unique($colors_array);
                        foreach ($colors_array as $color_item) {
                            if ($color_item != $color->color->name) {
                                $color_limite++;
                            }
                        }
                        foreach (Cart::instance('caja1')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit++;
                            }
                        }
                    }
                    //Condiciones para agregar mas productos segun la cantidad del paquete y los colores permitidos
                    if (Cart::instance('caja1')->count()+$this->qty <= 72 && Cart::instance('caja1')->count() <= 72 && $color_limite < 2 && $manga_limit == 0) {
                        Cart::instance('caja1')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja1')->count()==72) {
                            session(['caja'=> 2]);
                        }else{
                            session(['caja'=> 1]);
                        }
                    }else{
                        if ($color_limite >= 2) {
                            if (Cart::instance('caja1')->count() == 72) {
                                session()->flash('message', 'Limite de prendas alcanzado, puedes aumentar tu plan <strong><a href="/planes">Aqui</a></strong>');
                            }elseif($manga_limit!=0){
                                session()->flash('message', 'Las cajas solo deben ser de un tipo de manga');
                            }else{
                                session()->flash('message', 'Tu plan no permite agregar mas de 2 colores diferentes, aumenta tu plan <strong><a href="/planes">Aqui</a></strong>');
                            }
                        }else{
                            if ($manga_limit != 0) {
                                session()->flash('message', 'Las cajas solo deben ser de un tipo de manga');
                            }else{
                                session()->flash('message', 'Limite de prendas alcanzado, puedes aumentar tu plan <strong><a href="/planes">Aqui</a></strong>');
                            }
                        }
                    }
                break;
                case '2':
                    //Validacion de managas por caja
                    if (Cart::instance('caja1')->count()) {
                        foreach (Cart::instance('caja1')->content() as $item) {
                            array_push($colors_array,$item->options->color);
                        }
                        //Generamos un array de los valores del color sin repetir
                        $colors_array = array_unique($colors_array);
                        foreach ($colors_array as $color_item) {
                            if ($color_item != $color->color->name) {
                                $color_limite++;
                            }
                        }
                        foreach (Cart::instance('caja1')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit++;
                            }
                        }
                    }


                    if (Cart::instance('caja2')->count()) {
                        foreach (Cart::instance('caja2')->content() as $item) {
                            array_push($colors_array,$item->options->color);
                        }
                        //Generamos un array de los valores del color sin repetir
                        $colors_array = array_unique($colors_array);
                        foreach ($colors_array as $color_item) {
                            if ($color_item != $color->color->name) {
                                $color_limite2++;
                            }
                        }
                        foreach (Cart::instance('caja2')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit2++;
                            }
                        }
                    }


                    if (Cart::instance('caja3')->count()) {
                        foreach (Cart::instance('caja3')->content() as $item) {
                            array_push($colors_array,$item->options->color);
                        }
                        //Generamos un array de los valores del color sin repetir
                        $colors_array = array_unique($colors_array);
                        foreach ($colors_array as $color_item) {
                            if ($color_item != $color->color->name) {
                                $color_limite3++;
                            }
                        }
                        foreach (Cart::instance('caja3')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit3++;
                            }
                        }
                    }


                    if (Cart::instance('caja1')->count()+$this->qty <= 72 && Cart::instance('caja1')->count() <= 72 && $color_limite < 4 && $manga_limit == 0) {
                        Cart::instance('caja1')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja1')->count()==72) {
                            session(['caja'=> 2]);
                        }else{
                            session(['caja'=> 1]);
                        }
                    }else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+$this->qty <= 144 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count() >= 72 && $color_limite2 < 4 && $color_limite < 4 && $manga_limit2 == 0){
                        Cart::instance('caja2')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja2')->count()==72) {
                            session(['caja'=> 3]);
                        }
                        }else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+$this->qty <= 216 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count() >= 144 && $color_limite3 < 4 && $color_limite2 < 4 && $color_limite < 4 && $manga_limit3 == 0){
                        Cart::instance('caja3')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja3')->count()==72) {
                            session(['caja'=> 4]);
                        }
                    }else{

                        if ($manga_limit != 0 || $manga_limit2 != 0 || $manga_limit3 != 0) {
                            session()->flash('message', 'Las cajas solo deben ser de un tipo de manga');
                        }else if($color_limite < 4 || $color_limite2 < 4 || $color_limite3 < 4){
                            session()->flash('message', 'Tu plan solo acepta 4 colores por caja, puedes aumentar tu plan <strong><a href="/planes">Aqui</a></strong>');
                        }else{
                            session()->flash('message', 'Limite de prendas alcanzado, puedes aumentar tu plan <strong><a href="/planes">Aqui</a></strong>');
                        }
                    }
                break;
                case '3':
                    //Validacion de managas por caja
                    if (Cart::instance('caja1')->count()) {
                        foreach (Cart::instance('caja1')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit++;
                            }
                        }
                    }
                    if (Cart::instance('caja2')->count()) {
                        foreach (Cart::instance('caja2')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit2++;
                            }
                        }
                    }
                    if (Cart::instance('caja3')->count()) {
                        foreach (Cart::instance('caja3')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit3++;
                            }
                        }
                    }
                    if (Cart::instance('caja4')->count()) {
                        foreach (Cart::instance('caja4')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit4++;
                            }
                        }
                    }
                    if (Cart::instance('caja5')->count()) {
                        foreach (Cart::instance('caja5')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit5++;
                            }
                        }
                    }
                    if (Cart::instance('caja6')->count()) {
                        foreach (Cart::instance('caja6')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit6++;
                            }
                        }
                    }
                    if (Cart::instance('caja7')->count()) {
                        foreach (Cart::instance('caja7')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit7++;
                            }
                        }
                    }
                    if (Cart::instance('caja8')->count()) {
                        foreach (Cart::instance('caja8')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit8++;
                            }
                        }
                    }
                    if (Cart::instance('caja9')->count()) {
                        foreach (Cart::instance('caja9')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit9++;
                            }
                        }
                    }
                    if (Cart::instance('caja10')->count()) {
                        foreach (Cart::instance('caja10')->content() as $item) {
                            if ($item->model->subcategory->name != $this->product->subcategory->name) {
                                $manga_limit10++;
                            }
                        }
                    }
                    if (Cart::instance('caja1')->count()+$this->qty <= 72 && Cart::instance('caja1')->count() <= 72 && $manga_limit == 0) {
                        Cart::instance('caja1')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja1')->count()==72) {
                            session(['caja'=> 2]);
                        }else{
                            session(['caja'=> 1]);
                        }
                    }else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+$this->qty <= 144 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count() >= 72 && $manga_limit2 == 0){
                        Cart::instance('caja2')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja2')->count()==72) {
                            session(['caja'=> 3]);
                        }
                    }else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+$this->qty <= 216 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count() >= 144 && $manga_limit3 == 0){
                        Cart::instance('caja3')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja3')->count()==72) {
                            session(['caja'=> 4]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+$this->qty <= 288 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count() >= 216 && $manga_limit4 == 0){
                        Cart::instance('caja4')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja4')->count()==72) {
                            session(['caja'=> 5]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+$this->qty <= 360 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count() >= 288 && $manga_limit5 == 0){
                        Cart::instance('caja5')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja5')->count()==72) {
                            session(['caja'=> 6]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+$this->qty <= 432 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count() >= 360 && $manga_limit6 == 0){
                        Cart::instance('caja6')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja6')->count()==72) {
                            session(['caja'=> 7]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+$this->qty <= 504 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count() >= 432 && $manga_limit7 == 0){
                        Cart::instance('caja7')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja7')->count()==72) {
                            session(['caja'=> 8]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count()+$this->qty <= 576 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count() >= 504 && $manga_limit8 == 0){
                        Cart::instance('caja8')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja8')->count()==72) {
                            session(['caja'=> 9]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count()+Cart::instance('caja9')->count()+$this->qty <= 648 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count()+Cart::instance('caja9')->count() >= 504 && $manga_limit9 == 0){
                        Cart::instance('caja9')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                        if (Cart::instance('caja9')->count()==72) {
                            session(['caja'=> 10]);
                        }
                    }
                    else if (Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count()+Cart::instance('caja9')->count()+Cart::instance('caja10')->count()+$this->qty <= 720 && Cart::instance('caja1')->count()+Cart::instance('caja2')->count()+Cart::instance('caja3')->count()+Cart::instance('caja4')->count()+Cart::instance('caja5')->count()+Cart::instance('caja6')->count()+Cart::instance('caja7')->count()+Cart::instance('caja8')->count()+Cart::instance('caja9')->count()+Cart::instance('caja10')->count() >= 648 && $manga_limit10 == 0){
                        Cart::instance('caja10')->add([
                            'id' => $this->product->id,
                            'name' => $this->product->name,
                            'price' => 1,
                            'qty' => $this->qty,
                            'weight' => 550,
                            'options' => $this->options
                        ])->associate('App\Models\Product');
                    }
                    else{
                        if ($manga_limit != 0 || $manga_limit2 != 0 || $manga_limit3 != 0|| $manga_limit4 != 0|| $manga_limit5 != 0|| $manga_limit6 != 0|| $manga_limit7 != 0|| $manga_limit8 != 0|| $manga_limit9 != 0|| $manga_limit10 != 0) {
                            session()->flash('message', 'Las cajas solo deben ser de un tipo de manga');
                        }else{
                            session()->flash('message', 'Limite de prendas alcanzado, puedes aumentar tu plan <strong><a href="/planes">Aqui</a></strong>');
                        }
                    }
                break;
            }
        }else{
            return redirect('/planes');
        }
        $this->reset('qty');
        $this->emitTo('dropdown-cart','render');
    }

    public function render(){
        $imagesColor = Image::where('imageable_id',$this->color_id)->where('imageable_type','App\Models\ColorProduct')->get();

        return view('livewire.add-items-cart',compact('imagesColor'));
    }
}
