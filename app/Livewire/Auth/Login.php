<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    public $email, $password, $remember;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function rules(){
        return [
            'email' => ['required' ],
            'password' => ['required', 'min:8' ],
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password harus memiliki minimal 8 karakter',
        ];
    }


    public function loginUser()
{
    $this->validate();

    $throttleKey = strtolower($this->email) . '|' . request()->ip();

    // Cek jika terlalu banyak percobaan
    if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
        $seconds = RateLimiter::availableIn($throttleKey);
        session()->flash('seconds', $seconds);
        $this->addError('email', "Terlalu banyak percobaan gagal. Silakan coba lagi dalam {$seconds} detik.");
        return null;
    }

    // Cek jika email tidak terdaftar
    $user = \App\Models\User::where('email', $this->email)->first();
    if (!$user) {
        RateLimiter::hit($throttleKey);
        $this->addError('email', 'Email tidak terdaftar.');
        return null;
    }

    // Cek jika autentikasi gagal (password salah)
    if (!Auth::attempt($this->only(['email', 'password']), $this->remember)) {
        RateLimiter::hit($throttleKey);
        $this->addError('password', 'Password salah.');
        return null;
    }

    // Reset rate limiter jika login berhasil
    RateLimiter::clear($throttleKey);

    return redirect()->route('dashboard');
}
public function updated($field)
    {
        if ($field === 'email' && session()->has('seconds')) {
            $this->dispatchBrowserEvent('start-timer', ['seconds' => session('seconds')]);
        }
    }

}
