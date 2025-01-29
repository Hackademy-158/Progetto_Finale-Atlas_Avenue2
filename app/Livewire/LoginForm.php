<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    protected $messages = [
        'email.required' => 'L\'email è obbligatoria',
        'email.email' => 'Inserisci un indirizzo email valido',
        'password.required' => 'La password è obbligatoria',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->intended(route('home'));
        }

        $this->addError('email', 'Le credenziali inserite non sono corrette.');
        $this->reset('password');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
