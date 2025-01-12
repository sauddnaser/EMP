<?php

namespace App\Livewire\Manager\Program;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.manager.program.index')
            ->layout('layouts.manager.app');
    }
}
