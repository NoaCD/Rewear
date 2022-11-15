<?php

namespace App\Http\Livewire\Admin;

use App\Models\PostCategory as ModelsPostCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostCategory extends Component
{
    public $categories, $category;
    protected $listeners = ['delete'];
    public $createForm = [
        'name' => null,
        'name_en' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'name_en' => null
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.name_en' => 'required',
    ];


    public function mount()
    {
        $this->getCategories();
    }

    public function getCategories()
    {
        $this->categories = ModelsPostCategory::all();
    }

    public function save()
    {
        $this->validate();

        ModelsPostCategory::create([
            'name' => $this->createForm['name'],
            'name_en' => $this->createForm['name_en'],
        ]);

        $this->getCategories();
        $this->reset('createForm');
        $this->emit('saved');
    }

    public function edit(ModelsPostCategory $category)
    {
        $this->resetValidation();
        $this->category = $category;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $category->name;
        $this->editForm['name_en'] = $category->name_en;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.name_en' => 'required',
        ];

        $this->validate($rules);

        $this->category->update($this->editForm);

        $this->reset(['editForm']);
        $this->getCategories();
    }

    public function delete(ModelsPostCategory $category)
    {
        $category->delete();
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.admin.post-category')->layout('layouts.admin');
    }
}
