<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterForm extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => ['required', 'string', 'min:2','max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'password_confirmation' => ['required']
    ];

    protected $messages = [
        'name.required' => 'Il nome è obbligatorio',
        'name.min' => 'Il nome deve essere di almeno 2 caratteri',
        'name.max' => 'Il nome non può superare i 255 caratteri',
        'email.required' => 'L\'email è obbligatoria',
        'email.email' => 'Inserisci un indirizzo email valido',
        'email.unique' => 'Questa email è già registrata',
        'password.required' => 'La password è obbligatoria',
        'password.min' => 'La password deve essere di almeno 8 caratteri',
        'password.confirmed' => 'Le password non coincidono',
        'password_confirmation.required' => 'La conferma password è obbligatoria'
    ];

    // Questa funzione aggiorna il validation messagge della conferma password in questo modo, 
    //se le password non coincidono, viene aggiornato solo la conferma password e non la password.

    public function updated($propertyName)
    {
        if ($propertyName === 'password' || $propertyName === 'password_confirmation') {
            $this->validateOnly('password');
            $this->validateOnly('password_confirmation');
        } else {
            $this->validateOnly($propertyName);
        }
    }

    public function register()
    {
        $validatedData = $this->validate();
        
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        
        return redirect()->route('home')->with('success', 'Registrazione effettuata con successo! Benvenuto su Atlas Avenue.');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
