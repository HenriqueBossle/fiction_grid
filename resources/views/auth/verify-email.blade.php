@extends('layouts.app')
@section('content')

<div class="min-h-screen bg-gray-100 pt-20">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Verificar Email</h2>
                <p class="text-gray-600 mt-2">Obrigado por se cadastrar! Antes de começar, você poderia verificar seu endereço de email clicando no link que acabamos de enviar? Se você não recebeu o email, ficaremos felizes em enviar outro.</p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-md">
                    {{ __('Um novo link de verificação foi enviado para o endereço de email fornecido durante o registro.') }}
                </div>
            @endif

            <div class="flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                        {{ __('Reenviar Email de Verificação') }}
                    </x-primary-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900 underline">
                        {{ __('Sair') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
