<?php

namespace App\Http\Livewire\Admin;

use App\Models\Department;
use Livewire\Component;

class DepartmentComponent extends Component
{
    public $departments, $department;
    public $listeners = ['delete'];

    public $createForm = [
        'name' => null
    ];

    public $editForm = [
        'name' => null,
        'open' => false
    ];

    protected $rules = [
        'createForm.name' => 'required'
    ];


    public function getDepartments()
    {
        $this->departments = Department::all();
    }

    public function mount()
    {
        $this->getDepartments();
    }

    public function save()
    {
        $this->validate([
            'createForm.name' => 'required'
        ]);
        Department::create($this->createForm);
        $this->reset('createForm');
        $this->getDepartments();
        $this->emit('saved');
    }

    public function edit(Department $department)
    {
        $this->department = $department;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $department->name;
    }


    public function update()
    {
        $this->validate([
            'editForm.name' => 'required'
        ]);

        $this->department->update($this->editForm);
        $this->reset('editForm');
        $this->getDepartments();
    }


    public function delete(Department $department)
    {
        $department->delete();
        $this->getDepartments();
    }

    public function render()
    {
        return view('livewire.admin.department-component')->layout('layouts.admin');
    }
}
