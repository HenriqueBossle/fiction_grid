@extends('layouts.app')

@section('content')
<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Personagens
</nav>

<div class="flex flex-wrap justify-center gap-6 p-6">
    @foreach($characters as $character)
        <div class="bg-white shadow-lg border border-slate-200 rounded-lg w-2xs flex flex-col hover:shadow-xl transition-shadow">
            <div class="m-2.5 overflow-hidden rounded-md h-60 flex justify-center items-center">
                @if($character->image)
                    <img class="w-full h-full object-cover" src="{{ asset($character->image) }}" alt="imagem do {{ $character->name }}" />
                @else
                    <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-user text-4xl text-gray-400"></i>
                    </div>
                @endif
            </div>
            <div class="p-4 text-center flex-grow">
                <h4 class="mb-1 text-xl font-semibold text-slate-800">
                    {{ $character->name }}
                </h4>
                <p class="font-semibold text-indigo-600">{{ $character->franchise->name }}</p>
                <p class="text-sm text-slate-600 mt-2 font-light line-clamp-3">
                    {{ $character->description }}
                </p>
            </div>
            <div class="flex justify-center p-4 gap-2 mt-auto">
                <a href="{{ route('characters.show', $character) }}" 
                   class="inline-flex items-center px-3 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-eye mr-2"></i>
                    Ver
                </a>
                <a href="{{ route('characters.edit', $character->id) }}" 
                   class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-edit mr-2"></i>
                    Editar
                </a>
                <form action="{{ route('characters.destroy', $character->id) }}" 
                      method="POST" 
                      class="inline-block"
                      onsubmit="return confirm('Tem certeza que deseja excluir este personagem?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                        <i class="fas fa-trash mr-2"></i>
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection