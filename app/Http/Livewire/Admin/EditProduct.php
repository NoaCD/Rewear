<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class EditProduct extends Component
{
    public $product, $categories, $subcategories, $slug,$slug_en;
    public $category_id;
    public $id_color="",$id_size="",$SKU,$colors,$sizes;

    protected $listeners = ['refreshProduct', 'delete'];

    protected $rules = [
        'category_id' => 'required',
        'product.subcategory_id' => 'required',
        'product.name' => 'required',
        'slug' => 'required|unique:products,slug',
        'product.description' => 'required',
        'product.measure' => 'required',
        'product.size' => 'required',
        'product.name_en' => 'required',
        'slug_en' => 'required|unique:products,slug_em',
        'product.description_en' => 'required',
        'product.measure_en' => 'required',
        'product.size_en' => 'required',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->categories = Category::all();
        $this->category_id = $product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id', $this->category_id)->get();
        $this->slug = $this->product->slug;
        $this->slug_en = $this->product->slug_en;
        $this->colors = $this->product->colors;
        $this->sizes = $this->product->sizes;
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
        $this->product->subcategory_id = "";
    }

    public function updatedProductName($value)
    {
        $this->slug = Str::slug($value);
    }
    public function updatedProductNameEn($value)
    {
        $this->slug_en = Str::slug($value);
    }

    public function getSubcategoryProperty()
    {
        return Subcategory::find($this->product->subcategory_id);
    }

    public function refreshProduct()
    {
        $this->product = $this->product->fresh();
    }


    public function update()
    {
        $rules = $this->rules;

        $rules['slug'] = 'required|unique:products,slug,' . $this->product->id;
        $rules['slug_en'] = 'required|unique:products,slug_en,' . $this->product->id;

        $this->validate($rules);

        $this->product->slug = $this->slug;
        $this->product->slug_en = $this->slug_en;
        $this->product->save();

        $this->emit('saved');
    }

    public function deleteImage(Image $image)
    {
        Storage::delete($image->url);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function delete()
    {
        $images = $this->product->images;

        foreach ($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();

        return redirect()->route('admin.products');
    }


    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
