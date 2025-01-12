<?php

namespace App\Livewire\Admin\Employee\Details;

use App\Models\Employee;
use Livewire\Component;

class Index extends Component
{
    public $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.admin.employee.details.index')->layout('layouts.admin.app');
    }
}
