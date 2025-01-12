<?php

namespace App\Livewire\Admin\Employee;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.employee.index')->layout('layouts.admin.app');
    }

    public function showCreateEmployeeModal()
    {
        $this->dispatch('show-create-employee-modal');
    }
}
