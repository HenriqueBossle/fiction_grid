@extends('layouts.app')

@section('content')
<nav class="text-center mt-16 p-8 text-2xl bg-gray-400 font-semibold">
    Franquias
</nav>
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                    Nome
                </th>
                <!-- Adicione o cabeçalho para ações -->
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                    Ações
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
            @foreach($franchises as $franchise)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <!-- Célula para o nome -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $franchise->name }}
                    </td>
                    
                    <!-- Nova célula para os botões -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        <a href="{{ route('franchises.edit', $franchise->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            Editar
                        </a>
                        <form action="{{ route('franchises.destroy', $franchise->id) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection