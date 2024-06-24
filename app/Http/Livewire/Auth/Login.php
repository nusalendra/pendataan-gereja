<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{

    public $username='';
    public $password='';

    protected $rules= [
        'username' => 'required',
        'password' => 'required'

    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    // public function mount() {
      
    //     $this->fill(['email' => 'admin@material.com', 'password' => 'secret']);    
    // }
    
    public function store()
    {
        $attributes = $this->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        
        if (! auth()->attempt(['username' => $attributes['username'], 'password' => $attributes['password']])) {
            throw ValidationException::withMessages([
                'message' => 'Username Atau Password anda salah!'
            ]);
        }

        session()->regenerate();
        if(Auth::user()->role == "Admin") {
            return redirect('/dashboard')->with(['success'=>'Kamu sudah login']);
        } else if(Auth::user()->role == "Jemaat") {
            return redirect('/beranda')->with(['success'=>'Kamu sudah login']);
        }
    }
}
