<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskReply extends Model
{
    use HasFactory;

    protected $table = 'task_replies';
    protected $fillable = ['task_id', 'manager_id', 'employee_id', 'description'];

    public function Manager()
    {
        return $this->belongsTo(Manager::class, 'manager_id');
    }

    public function Employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function getAuthorNameAttribute()
    {
        $name = '-';

        if ($this->is_manager) {
            $name = $this->Manager->manager_full_name;

        } elseif ($this->is_employee) {
            $name = $this->Employee->full_name;
        }
        return $name;
    }

    public function getAuthorImageAttribute()
    {
        $name = '-';

        if ($this->is_manager) {
            $name = $this->Manager->image_path;

        } elseif ($this->is_employee) {
            $name = $this->Employee->image_path;
        }
        return $name;
    }

    public function getAuthorClassAttribute()
    {
        $class = 'light';
        if ($this->is_manager) {
            $class = 'danger';

        } elseif ($this->is_employee) {
            $class = 'success';

        }

        return $class;
    }

    public function getAuthorStringAttribute()
    {
        $string = '';
        if ($this->is_manager) {
            $string = 'manager';

        } elseif ($this->is_employee) {
            $string = 'staff';
        }

        return $string;
    }

    public function getIsManagerAttribute()
    {
        return !is_null($this->manager_id);
    }

    public function getIsEmployeeAttribute()
    {
        return !is_null($this->employee_id);
    }


    public function getUpdatedAtHumanAttribute()
    {
        return Carbon::parse($this->updated_at)->diffForHumans();
    }
}
