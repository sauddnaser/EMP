<?php

namespace App\Livewire\Forms\Admin\Department;

use App\Models\Department;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DepartmentForm extends Form
{
    public ?Department $department;

    #[Validate('required|max:255')]
    public $name;
    public $description;


    public function setDepartment(Department $department)
    {
        $this->department = $department;
        $this->name = $department->name;
        $this->description = $department->discription;
    }

    public function update()
    {
        $this->validate();
        return $this->department->update(
            $this->all()
        );
    }
}
