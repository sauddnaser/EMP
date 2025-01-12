<?php

namespace App\Livewire\Manager\Auth;

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
        return view('livewire.manager.auth.login')->layout('layouts.manager.auth');
    }

    public function login()
    {
        $validated_data = $this->validate();
        $email = $validated_data['email'];
        $password = $validated_data['password'];

        if (Auth::guard('manager')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended(route('manager.dashboard'));

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
