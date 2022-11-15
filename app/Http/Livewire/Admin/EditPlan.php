<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use Livewire\Component;

class EditPlan extends Component
{
    public $plan;

    protected $rules = [
        'plan.name' => 'required',
        'plan.MXN' => 'required',
        'plan.MXN_L' => 'required',
        'plan.USD' => 'required',
        'plan.USD_L' => 'required',
    ];


    public function mount(Plan $plan){
        $this->plan = $plan;
    }


    public function update(){
        $this->validate();
        $this->plan->save();
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.edit-plan')->layout('layouts.admin');
    }
}
