<?php

namespace App\Livewire\Forms\Admin\Employee;

use App\Models\Employee;
use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EmployeeForm extends Form
{
    public ?Employee $employee;
    public $update_mode = false;
    public $first_name;
    public $last_name;
    public $email;
    public $birthday;
    public $profile_image_path;
    public $department_id;
    public $manager_id;
    public $phone;
    public $password;
    public $rest_password;

    protected function rules()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required|date',
            'department_id' => 'required|exists:departments,id',
            'manager_id' => 'required|exists:managers,id',
            'phone' => 'required',
            'rest_password' => 'nullable|min:8',
        ];
        if ($this->update_mode) {
            $rules['email'] = Rule::unique('employees', 'email')->ignore($this->employee->id);
        } else {
            $rules['password'] = 'required|min:8';
            $rules['profile_image_path'] = 'required|mimes:jpg,jpeg,png';
        }
        return $rules;
    }


    public function store()
    {
        $employee = new Employee();
        $employee->first_name = $this->first_name;
        $employee->last_name = $this->last_name;
        $employee->email = $this->email;
        $employee->birthday = $this->birthday;
        $employee->department_id = $this->department_id;
        $employee->manager_id = $this->manager_id;
        $employee->phone = $this->phone;
        $employee->password = Hash::make($this->password);

        if (is_file($this->profile_image_path)) {
            $employee->profile_image_path = $this->profile_image_path->store('', 'employee');
        }
        $employee->save();

        $this->reset();

        return $employee;
    }

    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
        $this->update_mode = true;

        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->email = $employee->email;
        $this->birthday = $employee->birthday;
        $this->department_id = $employee->department_id;
        $this->manager_id = $employee->manager_id;
        $this->phone = $employee->phone;
        $this->password = $employee->password;
        $this->profile_image_path = $employee->profile_image_path;
    }

    public function setManager(Manager $manager)
    {
        $this->manager_id = $manager->id;
        $this->department_id = $manager->department_id;
    }

    public function update()
    {
        if ($this->rest_password) {
            $this->password = Hash::make($this->rest_password);
        }
        if (is_file($this->profile_image_path)) {
            $this->profile_image_path = $this->profile_image_path->store('', 'employee');
        }
        return $this->employee->update($this->all());
    }

}
