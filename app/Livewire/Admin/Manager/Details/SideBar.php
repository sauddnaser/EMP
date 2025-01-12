<?php

namespace App\Livewire\Admin\Manager\Details;

use Livewire\Component;

class SideBar extends Component
{
    public $manager;

    public function mount($manager)
    {
        $this->manager = $manager;
    }

    public function render()
    {
        return view('livewire.admin.manager.details.side-bar');
    }
}
