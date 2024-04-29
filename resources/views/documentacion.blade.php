<x-guest-layout>
    @include('layouts.partials.navbar')


    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="mt-[64px] inline-flex items-center p-2  ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="sidebar-multi-level-sidebar"
        class="mt-[64px] fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('documentacion') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 ">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Inicio</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-intro" data-collapse-toggle="dropdown-intro">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Introducción</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-intro" class="py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">Requisitos</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">Request/Response</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Errores</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Parametros</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Paginación</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Más</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-auth" data-collapse-toggle="dropdown-auth">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Authenticación</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-auth" class="py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener token
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Autenticación (HTTPS)
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-costumers" data-collapse-toggle="dropdown-costumers">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Clientes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-costumers" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Crear cliente
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener cliente
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener lista clientes
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Editar cliente
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Eliminar cliente
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-categories" data-collapse-toggle="dropdown-categories">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Categorias</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-categories" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Crear categoria
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener categoria
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener lista categorias
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Editar categoria
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Eliminar categoria
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-productos" data-collapse-toggle="dropdown-productos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Productos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-productos" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Crear producto
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener producto
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener lista productos
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Editar producto
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Eliminar producto
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-imagenes" data-collapse-toggle="dropdown-imagenes">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Imagenes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-imagenes" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Crear imagen
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener imagen
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener lista imagenes
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Editar imagen
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Eliminar imagen
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100  "
                        aria-controls="dropdown-pedidos" data-collapse-toggle="dropdown-pedidos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pedidos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-pedidos" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Propiedades
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Crear pedido
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener pedido
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Obtener lista pedidos
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Editar estado pedido
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-1 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 ">
                                Eliminar pedido
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64 sm:mt-[64px]">
        <div class="p-4 border-2 min-h-[89vh] border-gray-200 border-dashed rounded-lg ">

        </div>
    </div>


</x-guest-layout>
