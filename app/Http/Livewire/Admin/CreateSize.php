<?php

namespace App\Http\Livewire\Admin;

use App\Models\Size;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateSize extends Component
{
    use WithFileUploads;

    public $rand, $sizes, $size;
    protected $listeners = ['delete'];
    public $createForm = [
        'name' => null,
        'code' => null,
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'code' => null,
    ];

    public $editImage;

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.code' => 'required',
    ];


    public function mount()
    {
        $this->getSizes();
        $this->rand = rand();
    }

    public function getSizes()
    {
        $this->sizes = Size::all();
    }

    public function save()
    {
        $this->validate();

        $size = Size::create([
            'name' => $this->createForm['name'],
            'code' => $this->createForm['code'],
        ]);

        $this->rand = rand();
        $this->getSizes();
        $this->reset('createForm');
        $this->emit('saved');
    }

    public function edit(Size $size)
    {
        $this->reset('editImage');
        $this->resetValidation();
        $this->size = $size;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $size->name;
        $this->editForm['code'] = $size->code;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.code' => 'required',
        ];

        $this->validate($rules);

        $this->size->update($this->editForm);
        $this->getSizes();
        $this->reset(['editForm', 'editImage']);
    }

    public function delete(Size $size)
    {
        $size->delete();
        $this->getSizes();
    }


    public function render()
    {
        return view('livewire.admin.create-size');
    }
}
