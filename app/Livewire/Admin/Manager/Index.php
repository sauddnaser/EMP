<?php

namespace App\Livewire\Admin\Manager;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.manager.index')
            ->layout('layouts.admin.app');
    }

    public function showCreateManagerModal()
    {
        $this->dispatch('show-create-manager-modal');
    }
}
