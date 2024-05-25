<x-guest-layout>
    @section('title', 'Market Store - Acerca de')
    @include('layouts.partials.navbar')

    <div class="bg-white h-[92vh]">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 flex flex-col justify-center items-center">
            <div class="lg:text-center  m-[150px]">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900  sm:text-4xl">Market Store
                    API</h2>
                <p class="mt-4 text-lg leading-6 text-gray-500 ">Tu solución completa para el comercio
                    electrónico</p>
            </div>

            <div class="mt-1">
                <div class="max-w-lg mx-auto lg:max-w-none">
                    <div
                        class="rounded-lg bg-gray-50  px-6 py-8 sm:p-10 lg:grid lg:grid-cols-2 lg:gap-6 lg:items-center">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900 ">¿Qué es Market Store
                                API?</h3>
                            <p class="mt-2 text-sm text-gray-500 ">Market Store API es una
                                herramienta diseñada para proporcionarte un completo conjunto de funciones para
                                gestionar tu comercio en línea. Con Market Store API, puedes realizar operaciones de
                                CRUD (Crear, Leer, Actualizar, Eliminar) en elementos clave como clientes, productos,
                                imágenes y pedidos.</p>
                        </div>

                        <div class="mt-8 lg:mt-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 ">Acceso a la API</h3>
                            <p class="mt-2 text-sm text-gray-500 ">Para obtener acceso a la API, es
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
