<?php

namespace App\Livewire\Forms\Admin\Manager;

use App\Models\Manager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ManagerForm extends Form
{
    public ?Manager $manager;
    public $update_mode = false;
    public $first_name;
    public $last_name;
    public $email;
    public $department_id;
    public $phone;
    public $profile_image_path;
    public $password;
    public $rest_password;

    protected function rules()
    {
        $rules = [
            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'department_id' => [Rule::exists('departments', 'id'), 'required'],
            'phone' => 'required|numeric',
            'email' => ['required', 'email'],
        ];
        if ($this->update_mode) {
            $rules['email'][] = Rule::unique('managers', 'email')->ignore($this->manager->id);
            $rules['rest_password'] = 'nullable|min:8';
            $rules['profile_image_path'] = ['nullable', 'mimes:jpg,jpeg,png'];

        } else {
            $rules['email'][] = Rule::unique('managers', 'email');
            $rules['password'] = ['required', 'min:8'];
            $rules['profile_image_path'] = ['required', 'mimes:jpg,jpeg,png'];
        }

        return $rules;
    }


    public function setManager(Manager $manager)
    {
        $this->manager = $manager;
        $this->update_mode = true;
        $this->first_name = $manager->first_name;
        $this->last_name = $manager->last_name;
        $this->email = $manager->email;
        $this->department_id = $manager->department_id;
        $this->phone = $manager->phone;
        $this->password = $manager->password;
    }

    public function store()
    {
        $this->validate();
        $this->password = Hash::make($this->password);
        if ($this->profile_image_path) {
            $this->profile_image_path = $this->profile_image_path->store('', 'manager');
        }
        return Manager::create(
            $this->all()
        );
    }

    public function update()
    {
        if ($this->rest_password) {
            $this->password = Hash::make($this->rest_password);
        }
        if ($this->profile_image_path) {
            $this->profile_image_path = $this->profile_image_path->store('', 'manager');
        } else {
            $this->profile_image_path = $this->manager->profile_image_path;
        }
        $manager = $this->manager->update($this->all());
        $this->reset();
        return $manager;
    }


}
