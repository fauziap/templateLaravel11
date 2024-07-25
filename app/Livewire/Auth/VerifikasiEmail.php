<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;


class VerifikasiEmail extends Component
{
    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.verifikasi-email');
    }

    public function resendVerification()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        Auth::user()->sendEmailVerificationNotification();

        session()->flash('message', 'Link verifikasi email baru telah dikirim.');
    }
}


