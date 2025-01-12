<?php

namespace App\Models;

use App\Traits\WithStringFromGenericHuman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingProgram extends Model
{
    use WithStringFromGenericHuman;
    use HasFactory, SoftDeletes;

    protected $table = 'training_programs';
    protected $fillable = ['name', 'department_id', 'description', 'start_date', 'end_date'];

    public function Department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function registrations()
    {
        return $this->hasMany(EmployeeTrainingRegistration::class, 'program_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(ManagerFeedback::class, 'program_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'program_id');
    }

    public function getDepartmentNameAttribute()
    {
        return $this->getStringFromGenericHuman('Department', 'name');
    }

    public function scopeWhereDepartmentId($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }
}
