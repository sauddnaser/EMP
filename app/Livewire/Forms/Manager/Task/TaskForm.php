<?php

namespace App\Livewire\Forms\Manager\Task;

use App\Enums\TaskStatusEnum;
use App\Models\EmployeeTrainingRegistration;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|max:255')]
    public $description;
    #[Validate('required|date')]
    public $due_date;
    #[Validate('required|in:new,processing,completed,cancelled')]
    public $status;


    public ?EmployeeTrainingRegistration $employeeTrainingRegistration;
    public ?Task $task;

    public function setEmployeeTrainingRegistration(EmployeeTrainingRegistration $employeeTrainingRegistration)
    {
        $this->employeeTrainingRegistration = $employeeTrainingRegistration;
    }

    public function create()
    {
        $task = $this->employeeTrainingRegistration->tasks()->create([
            'description' => $this->description,
            'due_date' => $this->due_date,
            'manager_id' => Auth('manager')->user()->id,
            'training_id' => $this->employeeTrainingRegistration->id,
            'status' => TaskStatusEnum::NEW,
        ]);
        $this->restParams();

        return $task;
    }

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->status = $task->status;
    }

    public function update()
    {
        $task = $this->task->update($this->all());
        $this->restParams();
        return $task;
    }

    public function assignProgramCompleted()
    {
        if ($this->employeeTrainingRegistration->completed()) {
            $this->employeeTrainingRegistration->tasks()->update(['status' => TaskStatusEnum::COMPLETED]);
            return true;
        }
        return false;
    }

    public function assignProgramCanceled()
    {
        if ($this->employeeTrainingRegistration->cancel()) {
            $this->employeeTrainingRegistration->tasks()->update(['status' => TaskStatusEnum::CANCELLED]);
            return true;
        }
        return false;
    }

    public function restParams()
    {
        $this->reset([
            'description',
            'due_date',
            'status'
        ]);
    }

}
