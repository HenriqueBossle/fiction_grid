@extends('layouts.app')

@section('content')

<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Editar Personagem
</nav>

    <form action="{{ url('characters/'. $character->id) }}" method="POST" class="bg-white rounded-2xl shadow-xl p-8 border border-indigo-100" enctype="multipart/form-data">
        @csrf
        @method('PUT')  
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label for="name" class="text-lg font-medium text-indigo-800">Nome</label>
                </div>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <i class="fas fa-film text-indigo-400 text-xl"></i>
                    </div>
                    <input type="text" name="name" id="name" value="{{ $character->name }}" class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-indigo-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition placeholder-indigo-300" placeholder="Ex: Darth Vader, Hulk, Batman..." required>
                </div>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label for="description" class="text-lg font-medium text-indigo-800">Descrição</label>
                </div>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <i class="fas fa-film text-indigo-400 text-xl"></i>
                    </div>
                    <input type="text" name="description" id="description" value="{{ $character->description }}" class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-indigo-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition placeholder-indigo-300" placeholder="Ex: Poderoso Jedi que se tornou Sith..." required>
                </div>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label for="franchise_id" class="text-lg font-medium text-indigo-800">Franquia</label>
                </div>
                
                <select name="franchise_id" id="franchise_id"
                    class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-indigo-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition text-indigo-700"
                    required>
                    
                    <option value="" disabled selected class="text-indigo-300">Selecione uma franquia:</option>

                    @foreach ($franchises as $franchise)
                        <option value="{{ $franchise->id }}">{{ $franchise->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label for="image" class="text-lg font-medium text-indigo-800">Imagem</label>
                </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <i class="fas fa-image text-indigo-400 text-xl"></i>
                </div>
                    <input 
                        type="file" 
                        name="image" 
                        id="image"
                        accept="image/*"
                        class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-indigo-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition text-indigo-700 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200" 
                        required>
                </div>
            </div>

            
            <div class="flex justify-center">
                <button 
                    type="submit" 
                    class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:opacity-90 transition transform hover:-translate-y-0.5 w-full">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-plus-circle mr-3"></i>
                        Atualizar Personagem
                    </span>
                </button>
            </div>
        </form>


@endsection
