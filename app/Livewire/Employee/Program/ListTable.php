<?php

namespace App\Livewire\Employee\Program;

use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListTable extends Component
{
    use WithPagination;
    use WithLazyLoad;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        $programs = ($this->ready_to_load) ? $this->getProgramList() : [];
        $view_data = [
            'programs' => $programs,
        ];
        return view('livewire.employee.program.list-table', $view_data);
    }

    public function getProgramList()
    {
        return Auth::guard('employee')->user()
            ->registrations()
            ->when($this->search, function ($query) {
                $query->whereHas('TrainingProgram', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate();
    }

}
