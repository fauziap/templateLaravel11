<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $nama, $username, $email, $password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function rules(){
        return [
            'nama' => ['required'],
            'username' => ['required', 'unique:users' ],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:8' ],
        ];

    }

    public function messages()
    {
        return [
        'nama.required' => 'Nama wajib diisi.',
        'username.required' => 'Username wajib diisi.',
        'username.unique' => 'Username sudah digunakan.',
        'email.unique' => 'Email sudah digunakan.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus minimal 8 karakter.',
    ];
    }


    public function registerUser()
    {
        // dd($this->password);
        $this->validate();

        $user = User::create([
            'nama'=> $this->nama,
            'username'=> $this->username,
            'email'=> $this->email,
            'password'=> $this->password,
        ]);
        Auth::login($user, true);
        return redirect()->route('dashboard');
    }

}
