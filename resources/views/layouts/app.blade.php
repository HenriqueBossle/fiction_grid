<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Fiction Grid</title>
</head>
<body>
    
<nav class="bg-gray-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-white text-2xl font-semibold whitespace-nowrap dark:text-white">Fiction Grid</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
     @guest
      <a href="{{ url('register') }}" class="text-white bg-indigo-500 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-2">Criar conta</a>
      <a href="{{ url('login') }}" class="text-white bg-indigo-500 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Entrar</a>
      @endguest

      @auth
      <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="text-white bg-indigo-500 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sair</button>
      </form>
      @endauth

      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-900 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-gray-900 dark:bg-gray-900 md:dark:bg-gray-900 dark:border-gray-700">
      
      <li>
        <a href="/" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-700 md:hover:bg-gray-700 md:p-0 md:dark:hover:text-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-gray-700">Inicio</a>
      </li>
      <li>
        <a href="{{ url('characters') }}" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-700 md:hover:bg-gray-700 md:p-0 md:dark:hover:text-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-gray-700">Personagens</a>
      </li>
      <li>
        <a href="{{ url('franchises') }}" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-700 md:hover:bg-gray-700 md:p-0 md:dark:hover:text-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-gray-700">Franquias</a>
      </li>
      

      @auth
      <li>
        <a href="{{ url('franchises/create') }}" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-700 md:hover:bg-gray-700 md:p-0 md:dark:hover:text-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-gray-700">Adicionar Franquias</a>
      </li>
      <li>
        <a href="{{ url('characters/create') }}" class="block py-2 px-3 text-white rounded-sm hover:bg-gray-700 md:hover:bg-gray-700 md:p-0 md:dark:hover:text-white dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-gray-700">Adicionar Personagens</a>
      </li>
      @endauth
    </ul>
  </div>
  </div>
</nav>

@yield('content')
<footer class="bg-gray-800 text-gray-300 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center border-b border-gray-700 pb-6 mb-6">
            <!-- Nome e descrição -->
            <div class="mb-4 md:mb-0 text-center md:text-left">
                <h2 class="text-xl font-semibold text-white">Fiction Grid</h2>
                <p class="text-gray-400 text-sm mt-1">Seu site de personagens favoritos</p>
            </div>

            <!-- Links rápidos -->
            <div class="flex space-x-6 mb-4 md:mb-0">
                <a href="{{ route('characters.index') }}" class="hover:text-white">Personagens</a>
                <a href="{{ route('franchises.index') }}" class="hover:text-white">Franquias</a>
                <a href="{{ url('/') }}" class="hover:text-white">Home</a>
            </div>
        </div>

        <!-- Direitos autorais -->
        <div class="text-center text-sm text-gray-500">
            © {{ date('Y') }} Fiction Grid. Todos os direitos reservados.
        </div>
    </div>
</footer>

</body>
</html>