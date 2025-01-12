<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use App\Traits\WithStringFromGenericHuman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    use WithStringFromGenericHuman;

    protected $table = 'tasks';
    protected $fillable = ['manager_id', 'employee_id', 'training_id',
        'description', 'due_date', 'status'];

    public function TrainingRegistration()
    {
        return $this->belongsTo(EmployeeTrainingRegistration::class, 'training_id');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function Manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function replies()
    {
        return $this->hasMany(TaskReply::class, 'task_id');
    }

    public function getManagerNameAttribute()
    {
        return $this->getStringFromGenericHuman('Manager', 'manager_full_name');
    }

    public function getManagerImagePathAttribute()
    {
        return $this->getStringFromGenericHuman('Manager', 'image_path');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', TaskStatusEnum::COMPLETED);
    }
}
