@extends('layouts.app')
@section('content')

<div class="min-h-screen bg-gray-100 pt-20">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Confirmar Senha</h2>
                <p class="text-gray-600 mt-2">Esta é uma área segura da aplicação. Por favor, confirme sua senha antes de continuar.</p>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-6">
                    <x-input-label for="password" class="text-gray-700 font-medium" :value="__('Senha')" />
                    <x-text-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center">
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Confirmar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
