@extends('layouts.app')

@section('content')
<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Personagens
</nav>

<div class="flex flex-wrap justify-center gap-6 p-6">
    @foreach($characters as $character)
        <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-64">
            <div class="m-2.5 overflow-hidden rounded-md h-60 flex justify-center items-center">
                <img class="w-full h-full object-cover" src="{{ $character->image }}" alt="imagem do {{ $character->name }}" />
            </div>
            <div class="p-4 text-center">
                <h4 class="mb-1 text-xl font-semibold text-slate-800">
                    {{ $character->name }}
                </h4>
                <p class="font-semibold text-gray-600">{{ $character->franchise->name }}</p>
                <p class="text-sm text-slate-600 mt-2 font-light">
                    {{ $character->description }}
                </p>
            </div>
            <div class="flex justify-center p-4 gap-4">
                <button class="min-w-24 rounded-md bg-slate-800 py-2 px-3 text-sm text-white transition hover:bg-slate-700">
                    Ver mais
                </button>
                <a href="{{ route('characters.edit', $character->id) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">
                    Editar
                </a>
                <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection