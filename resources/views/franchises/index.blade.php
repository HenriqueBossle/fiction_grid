@extends('layouts.app')

@section('content')
<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Franquias
</nav>

<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-indigo-900 uppercase tracking-wider">
                            <i class="fas fa-film mr-2"></i>Nome da Franquia
                        </th>
                        <th scope="col" class="px-6 py-4 text-left text-sm font-semibold text-indigo-900 uppercase tracking-wider">
                            <i class="fas fa-cogs mr-2"></i>Ações
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($franchises as $franchise)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-film text-indigo-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $franchise->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <a href="{{ route('franchises.edit', $franchise->id) }}" 
                                       class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                        <i class="fas fa-edit mr-2"></i>
                                        Editar
                                    </a>
                                    <form action="{{ route('franchises.destroy', $franchise->id) }}" 
                                          method="POST" 
                                          class="inline-block"
                                          onsubmit="return confirm('Tem certeza que deseja excluir a franquia {{ $franchise->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-sm font-medium rounded-lg hover:bg-red-700 transition-colors">
                                            <i class="fas fa-trash mr-2"></i>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($franchises->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-film text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhuma franquia encontrada</h3>
                <p class="text-gray-500 mb-6">Comece criando sua primeira franquia!</p>
                <a href="{{ route('franchises.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-plus mr-2"></i>
                    Criar Franquia
                </a>
            </div>
        @endif
    </div>
</div>
@endsection