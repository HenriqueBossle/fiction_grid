@extends('layouts.app')

@section('content')

<div class="relative">
    <!-- Imagem de fundo -->
    <img src="{{ asset('images/superman.jpg') }}" alt="Personagens" class="w-full h-auto">

    <!-- Gradiente esfumado roxo -->
    <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-purple-400 to-transparent"></div>
</div>
<div class="bg-purple-900 text-white text-center w-full mx-auto px-6 py-10 shadow-[0_0_30px_rgba(138,43,226,0.8)]">
    <h2 class="text-2xl font-bold mb-6">
        Bem-vindo ao Fiction Grid!!! Você se cadastrou com sucesso!!!
    </h2>

    <h2 class="text-2xl font-bold mb-6">
        Agora você pode adicionar seus personagens favoritos à nossa coleção já repleta de heróis, vilões e anti-heróis da ficção!!!
    </h2>

    <h2 class="text-2xl font-bold">
        Sinta-se à vontade — qualquer tipo de personagem que exista na ficção é bem-vindo!!!
    </h2>
</div>

@endsection
