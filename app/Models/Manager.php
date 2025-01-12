<?php

namespace App\Models;

use App\Traits\WithStringFromGenericHuman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Manager extends Authenticatable
{
    use WithStringFromGenericHuman;
    use HasFactory, SoftDeletes;

    protected $table = 'managers';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone',
        'password', 'department_id', 'profile_image_path'];

    public function Department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(ManagerFeedback::class, 'manager_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'manager_id');
    }

    public function getDepartmentNameAttribute()
    {
        return $this->getStringFromGenericHuman('Department', 'name');
    }

    public function getManagerFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCountProgramsAttribute()
    {
        return count($this->Department->trainingPrograms);
    }

    public function getImagePathAttribute()
    {
        $url = '#';
        if ($this->profile_image_path) {
            if (Storage::disk('manager')->exists($this->profile_image_path)) {
                $url = Storage::disk('manager')->url($this->profile_image_path);
            }
        }

        return $url;
    }
}
