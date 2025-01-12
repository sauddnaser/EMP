<?php

namespace App\Livewire\Manager\Employee\Details;

use App\Models\Employee;
use Livewire\Component;

class Program extends Component
{
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.manager.employee.details.program')
            ->layout('layouts.manager.app');
    }

}
