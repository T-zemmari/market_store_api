<x-app-layout>
    @section('title', 'Market Store - Mi perfil')
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
        class="mt-[64px] fixed top-0 left-0 z-40 w-64 h-[100%] transition-transform -translate-x-full sm:translate-x-0 md:h-[90vh]"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#1f2937] rounded-lg ml-2 mt-2">
            <input type="hidden" id="tkn"
                value="{{ session()->has('mis_tokens') ? session('mis_tokens') : '' }}">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-white  rounded-sm  hover:bg-[#374151]">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 text-[14px] mt-1 uppercase">Inicio</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-clientes" data-collapse-toggle="dropdown-clientes">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar clientes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-clientes" class="py-2 space-y-2">
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer"
                                onclick="fn_obtener_customers()">
                                Clientes
                            </span>
                        </li>
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer ">
                                Nuevo cliente
                            </span>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-categorias" data-collapse-toggle="dropdown-categorias">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar categorias</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-categorias" class="py-2 space-y-2">
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer"
                                onclick="fn_obtener_categorias()">
                                Categorias
                            </span>
                        </li>
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer ">
                                Nueva categoria
                            </span>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-productos" data-collapse-toggle="dropdown-productos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar productos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-productos" class="py-2 space-y-2">
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]cursor-pointer"
                                onclick="fn_obtener_productos()">
                                Productos
                            </span>
                        </li>
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer ">
                                Nuevo producto
                            </span>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-pedidos" data-collapse-toggle="dropdown-pedidos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar pedidos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-pedidos" class="py-2 space-y-2">
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer"
                                onclick="fn_obtener_pedidos()">
                                Pedidos
                            </span>
                        </li>
                        <li>
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] cursor-pointer ">
                                Crear un pedido
                            </span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64 sm:mt-[64px] md:p-0 md:px-0">
        <div class="hidden w-full h-[89vh] flex justify-center items-center" id="contenedor_spinner">
            <div role="status"
                class="p-4 flex justify-center items-center">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="p-4 min-h-[89vh] flex flex-col justify-start items-start"
            id="contenedor_dashboards_principal">

          

        </div>
    </div>

</x-app-layout>
