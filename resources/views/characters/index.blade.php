@extends('layouts.app')

@section('content')
<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Personagens
</nav>

<div class="flex flex-wrap justify-center gap-6 p-6">
    @foreach($characters as $character)
        <div class="bg-white shadow-sm border border-slate-200 rounded-lg w-2xs flex flex-col">
            <div class="m-2.5 overflow-hidden rounded-md h-60 flex justify-center items-center">
                <img class="w-full h-full object-cover" src="{{ $character->image }}" alt="imagem do {{ $character->name }}" />
            </div>
            <div class="p-4 text-center flex-grow">
                <h4 class="mb-1 text-xl font-semibold text-slate-800">
                    {{ $character->name }}
                </h4>
                <p class="font-semibold text-gray-600">{{ $character->franchise->name }}</p>
                <p class="text-sm text-slate-600 mt-2 font-light">
                    {{ $character->description }}
                </p>
            </div>
            <div class="flex justify-center p-2 gap-2 mt-auto">
                <button class="min-w-24 rounded-md bg-slate-800 py-2 px-2 text-sm text-white transition hover:bg-slate-700">
                    Ver mais
                </button>
                <a href="{{ route('characters.edit', $character->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Editar
                </a>
                <form action="{{ route('characters.destroy', $character->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection