<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{

    public $username = '';
    public $password = '';

    protected $rules = [
        'username' => 'required',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function store()
    {
        $attributes = $this->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!auth()->attempt(['username' => $attributes['username'], 'password' => $attributes['password']])) {
            throw ValidationException::withMessages([
                'message' => 'Username atau password Anda salah!'
            ]);
        }

        session()->regenerate();

        $user = Auth::user();
        if ($user->role == "Admin") {
            return redirect('/dashboard')->with(['success' => 'Kamu sudah login']);
        } elseif ($user->role == "Jemaat") {
            return redirect('/profil')->with(['success' => 'Kamu sudah login']);
        }
    }
}
