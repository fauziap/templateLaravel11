@extends('layouts.app')
@section('tittle', 'Lupa Password')

@section('content')

@livewire('auth.reset-password', ['token' => $token, 'email' => $email])


@endsection
