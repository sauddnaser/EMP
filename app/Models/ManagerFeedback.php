<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagerFeedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'manager_feedback';
    protected $fillable = ['manager_id', 'employee_id', 'program_id', 'feedback', 'rating'];

    public function Manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function Program()
    {
        return $this->belongsTo(TrainingProgram::class, 'program_id');
    }
}
