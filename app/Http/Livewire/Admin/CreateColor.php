<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateColor extends Component
{
    use WithFileUploads;

    public $rand, $colors, $color;
    protected $listeners = ['delete'];
    public $createForm = [
        'name' => null,
        'bgcolor' => '#000000 ',
        'txtcolor' => '#FFFFFF',
        'image' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'bgcolor' => null,
        'txtcolor' => null,
        'image' => null,
    ];

    public $editImage;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.bgcolor' => 'required',
        'createForm.txtcolor' => 'required',
        'createForm.image' => 'required|image|max:1024',
    ];


    public function mount()
    {
        $this->getColors();
        $this->rand = rand();
    }

    public function getColors()
    {
        $this->colors = Color::all();
    }

    public function save()
    {
        $this->validate();

        $image = $this->createForm['image']->store('colors');

        $color = Color::create([
            'name' => $this->createForm['name'],
            'bgcolor' => $this->createForm['bgcolor'],
            'txtcolor' => $this->createForm['txtcolor'],
            'image' => $image,
        ]);

        $this->rand = rand();
        $this->getColors();
        $this->reset('createForm');
        $this->emit('saved');
    }

    public function edit(Color $color)
    {
        $this->reset('editImage');
        $this->resetValidation();
        $this->color = $color;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $color->name;
        $this->editForm['bgcolor'] = $color->bgcolor;
        $this->editForm['txtcolor'] = $color->txtcolor;
        $this->editForm['image'] = $color->image;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.bgcolor' => 'required',
            'editForm.txtcolor' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }
        $this->validate($rules);


        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('colors');
        }
        $this->color->update($this->editForm);
        $this->getColors();
        $this->reset(['editForm', 'editImage']);
    }

    public function delete(Color $color)
    {
        $color->delete();
        $this->getColors();
    }


    public function render()
    {
        return view('livewire.admin.create-color');
    }
}
