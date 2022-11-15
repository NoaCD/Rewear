<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use Livewire\Component;

class ShowPlans extends Component
{
    public function render()
    {   $plans = Plan::all();
        return view('livewire.admin.show-plans',compact('plans'))->layout('layouts.admin');
    }
}
