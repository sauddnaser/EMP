<?php

namespace App\Livewire\Forms\Admin\Program;

use App\Models\TrainingProgram;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProgramForm extends Form
{
    public ?TrainingProgram $program;
    public $name;
    public $department_id;
    public $start_date;
    public $end_date;
    public $description;

    protected function rules()
    {
        return [
            'name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable',
        ];
    }

    public function store()
    {
        $trainingProgram = TrainingProgram::create($this->all());
        $this->reset();
        return $trainingProgram;
    }

    public function setProgram(TrainingProgram $program)
    {
        $this->program = $program;
        $this->name = $program->name;
        $this->department_id = $program->department_id;
        $this->start_date = $program->start_date;
        $this->end_date = $program->end_date;
        $this->description = $program->description;
    }

    public function update()
    {
        return $this->program->update($this->all());
    }
}
