<x-guest-layout>
    @section('title', 'Market Store - Acerca de')
    @include('layouts.partials.navbar')

    <div class="bg-white h-[92.6vh]" style="background: radial-gradient(circle at 24.1% 68.8%, rgb(50, 50, 50) 0%, rgb(0, 0, 0) 99.4%);">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 flex flex-col justify-center items-center">
            <div class="lg:text-center  m-[150px]">
                <h2 class="text-3xl font-extrabold tracking-tight   sm:text-4xl text-white">Market Store
                    API</h2>
                <p class="mt-4 text-lg leading-6 text-gray-300 ">Tu solución completa para el comercio
                    electrónico</p>
            </div>

            <div class="mt-1">
                <div class="max-w-lg mx-auto lg:max-w-none">
                    <div
                        class="rounded-lg bg-[#1a1717] px-6 py-8 sm:p-10 lg:grid lg:grid-cols-2 lg:gap-6 lg:items-center">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-white">¿Qué es Market Store
                                API?</h3>
                            <p class="mt-2 text-sm text-gray-300 ">Market Store API es una
                                herramienta diseñada para proporcionarte un completo conjunto de funciones para
                                gestionar tu comercio en línea. Con Market Store API, puedes realizar operaciones de
                                CRUD (Crear, Leer, Actualizar, Eliminar) en elementos clave como clientes, productos,
                                imágenes y pedidos.</p>
                        </div>

                        <div class="mt-8 lg:mt-0">
                            <h3 class="text-lg font-medium leading-6 text-white ">Acceso a la API</h3>
                            <p class="mt-2 text-sm text-gray-300 ">Para obtener acceso a la API, es
                                necesario solicitar un token de autenticación. Los usuarios registrados como
                                administradores obtienen un token con permisos de lectura y escritura, mientras que los
                                usuarios registrados normales solo obtienen permisos de lectura.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
