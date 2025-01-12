<?php

namespace App\Livewire\Manager\Program;

use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListTable extends Component
{
    use WithLazyLoad;

    public function render()
    {
        $programs = ($this->ready_to_load) ? $this->getProgramsList() : [];
        $view_data = [
            'programs' => $programs,
        ];
        return view('livewire.manager.program.list-table', $view_data);
    }

    public function getProgramsList()
    {
        return Auth::guard('manager')->user()
            ->Department
            ->trainingPrograms()
            ->paginate();
    }
}
