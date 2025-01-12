<?php

namespace App\Livewire\Manager\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.manager.dashboard.index')
            ->layout('layouts.manager.app');
    }
}
