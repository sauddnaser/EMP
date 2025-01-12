<?php

namespace App\Livewire\Forms\Manager\Task;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ReplyForm extends Form
{
    #[Validate('required|max:255')]
    public $description;
    public ?Task $task;

    public function setTask(Task $task)
    {
        $this->task = $task;
    }

    public function create()
    {
        if (auth('employee')->check()) {
            $user_id = auth('employee')->id();
        } elseif (auth('manager')->check()) {
            $user_id = auth('manager')->id();
        } else {
            abort(403, 'Unauthorized');
        }

        $reply = $this->task->replies()->create(
            [
                'description' => $this->description,
                'manager_id' => auth('manager')->check() ? $user_id : null,
                'employee_id' => auth('employee')->check() ? $user_id : null,

            ]
        );
        $this->reset('description');
        return $reply;
    }
}
