<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $rand,$rand2, $categories, $category;
    protected $listeners = ['delete'];
    public $createForm = [
        'name' => null,
        'slug' => null,
        'image' => null,
        'image_en' => null,

    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'slug' => null,
        'image' => null,
        'image_en' => null,
    ];

    public $editImage,$editImage2;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.slug' => 'required|unique:categories,slug',
        'createForm.image' => 'required|image|max:1024',
        'createForm.image_en' => 'required|image|max:1024',
    ];


    public function mount()
    {
        $this->getCategories();
        $this->rand = rand();
        $this->rand2 = rand();
    }

    public function getCategories()
    {
        $this->categories = Category::all();
    }

    public function updatedCreateFormName($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatedEditFormName($value)
    {
        $this->editForm['slug'] = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $image = $this->createForm['image']->store('categories');
        $image_en = $this->createForm['image_en']->store('categories');

        $category = Category::create([
            'name' => $this->createForm['name'],
            'slug' => $this->createForm['slug'],
            'image' => $image,
            'image_en' => $image_en,
        ]);

        $this->rand = rand();
        $this->rand2 = rand();
        $this->getCategories();
        $this->reset('createForm');
        $this->emit('saved');
    }

    public function edit(Category $category)
    {
        $this->reset('editImage');
        $this->reset('editImage2');
        $this->resetValidation();
        $this->category = $category;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['image'] = $category->image;
        $this->editForm['image_en'] = $category->image_en;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.slug' => 'required|unique:categories,slug,' . $this->category->id,
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';

        }
        if ($this->editImage2) {
            $rules['editImage2'] = 'required|image|max:1024';
        }
        
        $this->validate($rules);


        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }
        if ($this->editImage2) {
            Storage::delete($this->editForm['image_en']);
            $this->editForm['image_en'] = $this->editImage2->store('categories');
        }
        $this->category->update($this->editForm);

        $this->reset(['editForm', 'editImage','editImage2']);
        $this->getCategories();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
