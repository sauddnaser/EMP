<?php

namespace App\Livewire\Employee\Program;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.employee.program.index')->layout('layouts.employee.app');
    }
}
