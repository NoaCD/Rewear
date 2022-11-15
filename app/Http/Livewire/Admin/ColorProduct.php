<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use App\Models\ColorProduct as ModelsColorProduct;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ColorProduct extends Component
{
    use WithFileUploads;
    public $product,$colors,$colors_id,$color_product;
    protected $listeners = ['render'];
    public $images,$rand,$open=false,$files=[],$color_id,$color;
    public $SKU;
    protected $rules = ['files.*' => 'required|image|mimes:jpg,jpeg,png,svg,gif',];


    public function mount(){
        $this->colors = Color::all();
        $this->color_product = ModelsColorProduct::where('product_id',$this->product->id)->get();
    }

    public function save(){
        $product = $this->product;
        $product->colors()->attach($this->colors_id);
        $this->color_product = ModelsColorProduct::where('product_id',$product->id)->get();
    }

    public function edit(ModelsColorProduct $color){
        $this->open = true;
        $this->SKU = $color->SKU;
        $this->images = $color->images;
        $this->color_id = $color->id;
        $this->color = $color;
    }

    public function uploadPhotos(ModelsColorProduct $color){
        $color->update([
            'SKU' => $this->SKU,
        ]);
        foreach ($this->files as $file) {
            $url = $file->store('colors');
            $color->images()->create([
                'url' => $url,
            ]);
        }
        $this->images = $color->images;
        $this->reset('files');
    }

    public function deleteImage(Image $image,ModelsColorProduct $color){
        Storage::delete($image->url);
        $image->delete();
        $this->images = $color->images;
    }

    public function delete(ModelsColorProduct $color){
        $color->delete();
        $this->color_product = ModelsColorProduct::where('product_id',$this->product->id)->get();
    }

    public function render()
    {
        return view('livewire.admin.color-product');
    }
}
