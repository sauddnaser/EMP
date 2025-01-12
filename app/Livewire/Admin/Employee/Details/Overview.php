<?php

namespace App\Livewire\Admin\Employee\Details;

use App\Models\Employee;
use Livewire\Attributes\On;
use Livewire\Component;

class Overview extends Component
{
    public $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    #[On('employee-details-updated')]
    public function render()
    {
        return view('livewire.admin.employee.details.overview')->layout('layouts.admin.app');
    }
}
