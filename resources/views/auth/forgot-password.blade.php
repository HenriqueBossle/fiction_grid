@extends('layouts.app')
@section('content')

<div class="min-h-screen bg-gray-100 pt-20">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Esqueceu sua senha?</h2>
                <p class="text-gray-600 mt-2">Não tem problema. Apenas informe seu email e enviaremos um link para redefinir sua senha.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-6">
                    <x-input-label for="email" class="text-gray-700 font-medium" :value="__('Email')" />
                    <x-text-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Voltar ao login') }}
                    </a>

                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Enviar link de redefinição') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
