<?php

namespace App\Livewire\Admin\Program;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.program.index')->layout('layouts.admin.app');
    }

    public function showCreateProgramModal()
    {
        $this->dispatch('show-create-program-modal');
    }
}
