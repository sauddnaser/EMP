<?php

namespace App\Livewire\Admin\Manager\Details;

use App\Livewire\Forms\Admin\Manager\ManagerForm;
use App\Models\Manager;
use Livewire\Component;

class Index extends Component
{
    public ManagerForm $form;

    public function mount(Manager $manager)
    {
        $this->form->setManager($manager);
    }

    public function render()
    {
        return view('livewire.admin.manager.details.index')
            ->layout('layouts.admin.app');
    }
}
