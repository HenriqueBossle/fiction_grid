@extends('layouts.app')

@section('content')
<div class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Dados do personagem
</div>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Imagem do Personagem -->
        <div class="text-center mb-8">
            @if($character->image)
                <img src="{{ asset($character->image) }}" 
                     alt="Imagem do {{ $character->name }}" 
                     class="mx-auto max-w-md h-auto rounded-lg shadow-lg">
            @else
                <div class="mx-auto w-64 h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user text-6xl text-gray-400"></i>
                </div>
            @endif
        </div>

        <!-- Dados do Personagem -->
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="space-y-4">
                <div class="border-b border-gray-200 pb-3">
                    <h2 class="text-lg font-semibold text-gray-700">Nome:</h2>
                    <p class="text-2xl font-bold text-gray-900">{{ $character->name }}</p>
                </div>

                <div class="border-b border-gray-200 pb-3">
                    <h2 class="text-lg font-semibold text-gray-700">Franquia:</h2>
                    <p class="text-xl text-indigo-600 font-semibold">{{ $character->franchise->name }}</p>
                </div>

                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Descrição:</h2>
                    <p class="text-gray-700 leading-relaxed">{{ $character->description }}</p>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="mt-8 flex justify-center space-x-4">
                <a href="{{ route('characters.index') }}" 
                   class="bg-gray-600 text-white px-6 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Voltar
                </a>
                <a href="{{ route('characters.edit', $character->id) }}" 
                   class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>Editar
                </a>
                <form method="POST" action="{{ route('characters.destroy', $character->id) }}" 
                      onsubmit="return confirm('Tem certeza que deseja excluir este personagem?')" 
                      class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-trash mr-2"></i>Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection