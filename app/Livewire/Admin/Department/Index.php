<?php

namespace App\Livewire\Admin\Department;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.department.index')
            ->layout('layouts.admin.app');
    }

    public function showCreateDepartmentModal()
    {
        $this->dispatch('show-create-department-modal');
    }
}
