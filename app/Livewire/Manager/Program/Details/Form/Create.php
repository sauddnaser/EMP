<?php

namespace App\Livewire\Manager\Program\Details\Form;

use App\Enums\StatusEnum;
use App\Livewire\Manager\Employee\Details\Program;
use App\Models\TrainingProgram;
use App\Traits\AlertMessageTrait;
use App\Traits\WithLazyLoad;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use AlertMessageTrait;

    public $users = [];
    public $program;

    #[Validate('required')]
    public $selectedUser;


    #[On('show-manager-add-employee-modal')]
    public function resolveParams(TrainingProgram $program)
    {
        $this->restParams();

        $this->program = $program;

        $registration = $this->program->registrations->pluck('employee_id');
        $this->users = Auth::guard('manager')->user()
            ->employees()
            ->whereNotIn('id', $registration)
            ->get();
    }


    public function render()
    {
        return view('livewire.manager.program.details.form.create');
    }

    public function save()
    {
        $this->validate();
        $registration = $this->program->registrations()->create([
            'employee_id' => $this->selectedUser,
            'registration_date' => now(),
            'status' => StatusEnum::PENDING,
        ]);
        if ($registration) {
            $this->showSuccessAlertMessage('employee registration successfully!');
        } else {
            $this->showErrorAlertMessage('employee registration failed!');
        }
        $this->dispatch('employee-program-registration');
        $this->discard();
    }

    public function restParams()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    public function discard()
    {
        $this->dispatch('hide-manager-add-employee-modal');
    }
}
