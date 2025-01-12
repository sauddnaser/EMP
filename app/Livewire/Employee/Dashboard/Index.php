<?php

namespace App\Livewire\Employee\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.employee.dashboard.index')->layout('layouts.employee.app');
    }
}
