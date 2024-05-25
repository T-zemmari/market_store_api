<x-guest-layout>
    @section('title', 'Market Store API - Página de inicio')
    @include('layouts.partials.navbar')

    <section class=" bg-white h-[92vh]">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12  ">
            <div class="mr-auto place-self-center lg:col-span-5 mt-[150px]">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none md:text-5xl xl:text-6xl">
                    API de Market Store</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">Bienvenido a la demo de la API de Market Store. Esta página te permite realizar peticiones a la API para obtener información sobre productos, clientes, categorías y pedidos.</p>
                <a href="{{route('documentacion')}}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Documentación
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>
            <div class="hidden  lg:col-span-7 lg:flex lg:mt-[200px]">
                <img src="{{asset('assets/vids/api_store.gif')}}" alt="gif_1">
            </div>
        </div>
    </section>

</x-guest-layout>
