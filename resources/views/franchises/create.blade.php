@extends('layouts.app')

@section('content')

<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Adicionar Franquia
</nav>

    <form action="{{ route('franchises.store') }}" method="POST" class="bg-white rounded-2xl shadow-xl p-8 border border-indigo-100">
        @csrf
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <label for="name" class="text-lg font-medium text-indigo-800">Nome da Franquia</label>
                </div>
                
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                        <i class="fas fa-film text-indigo-400 text-xl"></i>
                    </div>
                    <input type="text" name="name" id="name" class="w-full pl-12 pr-4 py-4 rounded-xl border-2 border-indigo-100 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition placeholder-indigo-300" placeholder="Ex: Star Wars, Marvel, DC Comics..."required>
                </div>
            </div>
            
            <div class="flex justify-center">
                <button 
                    type="submit" 
                    class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:opacity-90 transition transform hover:-translate-y-0.5 w-full"
                >
                    <span class="flex items-center justify-center">
                        <i class="fas fa-plus-circle mr-3"></i>
                        Adicionar Franquia
                    </span>
                </button>
            </div>
        </form>

@endsection
