<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\WithStringFromGenericHuman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Employee extends Authenticatable
{
    use HasFactory, SoftDeletes;
    use WithStringFromGenericHuman;

    protected $table = 'employees';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone',
        'department_id', 'birthday', 'password', 'manager_id', 'profile_image_path'];

    public function Manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function Department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function registrations()
    {
        return $this->hasMany(EmployeeTrainingRegistration::class, 'employee_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(ManagerFeedback::class, 'employee_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'employee_id');
    }

    public function getDepartmentNameAttribute()
    {
        return $this->getStringFromGenericHuman('Department', 'name');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImagePathAttribute()
    {
        $url = '#';
        if ($this->profile_image_path) {
            if (Storage::disk('employee')->exists($this->profile_image_path)) {
                $url = Storage::disk('employee')->url($this->profile_image_path);
            }
        }
        return $url;
    }

    public function getTotalProgramAttribute()
    {
        return count($this->registrations);
    }

    public function getTotalProgramCompletedAttribute()
    {
        return $this->registrations()
            ->where('status', StatusEnum::COMPLETED)
            ->count();
    }

    public function getTotalProgramCanceledAttribute()
    {
        return $this->registrations()
            ->where('status', StatusEnum::CANCELLED)
            ->count();
    }

    public function getCompletedProjectsPercentageAttribute()
    {
        $totalPrograms = $this->getTotalProgramAttribute();
        $totalCompleted = $this->getTotalProgramCompletedAttribute();

        if ($totalPrograms > 0) {
            return ($totalCompleted / $totalPrograms) * 100;
        }

        return 0;
    }

}
