<?php

namespace App\Livewire\Manager\Employee;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.manager.employee.index')
            ->layout('layouts.manager.app');

    }
}
