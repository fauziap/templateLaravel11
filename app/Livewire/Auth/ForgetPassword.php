<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgetPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.auth.forget-password');
    }

    public function sendResetLink()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Link reset password sudah terkirim ke email mu yaa!');
        } else {
            throw ValidationException::withMessages([
                'email' => 'Email kamu belum terdaftar',
            ]);
        }
        $this->email = '';
    }
}
