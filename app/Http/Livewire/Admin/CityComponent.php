<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CityComponent extends Component
{
    public $city, $districts, $district;

    public $listeners = ['delete'];

    public $createForm = [
        'name' => null,
    ];

    public $editForm = [
        'name' => null,
        'open' => false
    ];
    /*
    protected $rules = [
        'createForm.name' => 'required',
    ]; */


    public function getDistricts()
    {
        $this->districts = District::where('city_id', '=', $this->city->id)->get();
    }


    public function save()
    {
        $this->validate([
            'createForm.name' => 'required',
        ]);
        $this->city->districts()->create($this->createForm);
        $this->reset('createForm');
        $this->getDistricts();
        $this->emit('saved');
    }

    public function edit(District $district)
    {
        $this->district = $district;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $district->name;
    }


    public function update()
    {
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->district->update($this->editForm);
        $this->reset('editForm');
        $this->getDistricts();
    }


    public function delete(District $district)
    {
        $district->delete();
        $this->getDistricts();
    }

    public function mount(District $city)
    {
        $this->city = $city;
        $this->getDistricts();
    }


    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}
