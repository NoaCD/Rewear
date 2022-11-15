<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component
{
    public $department, $cities, $city;

    public $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'cost' => null,
    ];

    public $editForm = [
        'name' => null,
        'cost' => null,
        'open' => false
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.cost' => 'required|numeric|min:1|max:100'
    ];

    public function getcities()
    {
        $this->cities = City::where('department_id', '=', $this->department->id)->get();
    }

    public function mount(Department $department)
    {
        $this->department = $department;
        $this->getCities();
    }


    public function save()
    {
        $this->validate([
            'createForm.name' => 'required',
            'createForm.cost' => 'required|numeric|min:1|max:100'
        ]);
        $this->department->cities()->create($this->createForm);
        $this->reset('createForm');
        $this->getCities();
        $this->emit('saved');
    }

    public function edit(City $city)
    {
        $this->city = $city;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $city->name;
        $this->editForm['cost'] = $city->cost;
    }


    public function update()
    {
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->city->update($this->editForm);
        $this->reset('editForm');
        $this->getCities();
    }


    public function delete(City $city)
    {
        $city->delete();
        $this->getCities();
    }


    public function render()
    {
        return view('livewire.admin.show-department')->layout('layouts.admin');
    }
}
