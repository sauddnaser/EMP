<?php

namespace App\Livewire\Admin\Employee\Details;

use Livewire\Component;

class Toolbar extends Component
{
    public function render()
    {
        return view('livewire.admin.employee.details.toolbar')->layout('layouts.admin.app');
    }
}
