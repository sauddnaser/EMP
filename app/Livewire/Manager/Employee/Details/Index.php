<?php

namespace App\Livewire\Manager\Employee\Details;

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
        return view('livewire.manager.employee.details.index')
            ->layout('layouts.manager.app');
    }
}
