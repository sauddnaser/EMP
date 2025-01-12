<?php

namespace App\Livewire\Employee\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        return $rules;
    }

    public function render()
    {
        return view('livewire.employee.auth.login')->layout('layouts.employee.auth');
    }

    public function login()
    {
        $validated_data = $this->validate();
        $email = $validated_data['email'];
        $password = $validated_data['password'];

        if (Auth::guard('employee')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended(route('employee.dashboard'));

        }

        $this->addError('email', 'The provided credentials are incorrect.');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->reset([
            'password',
        ]);
    }
}
