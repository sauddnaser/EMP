<?php

namespace App\Livewire\Manager\Employee\Details;

use App\Livewire\Forms\Manager\Task\ReplyForm;
use App\Livewire\Forms\Manager\Task\TaskForm;
use App\Models\Task;
use App\Traits\AlertMessageTrait;
use Livewire\Attributes\On;
use Livewire\Component;

class TaskItem extends Component
{
    use AlertMessageTrait;

    public ReplyForm $form;
    public Task $task;

    public function mount(Task $task)
    {
        $this->form->setTask($task);
    }

    #[On('task-updated')]
    #[On('program-updated')]
    public function render()
    {
        return view('livewire.manager.employee.details.task-item');
    }

    public function reply()
    {
        $this->validate();
        if ($this->form->create()) {
            $this->showSuccessAlertMessage('reply successfully');
        } else {
            $this->showErrorAlertMessage('reply failed');
        }
    }

    public function EditTask()
    {
        $this->dispatch('edit-task', ['task' => $this->task]);
    }
}
