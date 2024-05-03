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
        class="mt-[82px] ml-2 h-[90vh] fixed top-0 left-0 z-40 w-64  transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#1f2937] rounded-lg ">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('documentacion') }}"
                        class="flex items-center p-2 text-white  rounded-sm  hover:bg-[#374151]">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900"
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
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-intro" data-collapse-toggle="dropdown-intro">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Introducción</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-intro" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_requisitos')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Requisitos
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_errores')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Errores
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_parametros')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">Parametros</a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_paginacion')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">Paginación</a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_mas')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">Más</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-auth" data-collapse-toggle="dropdown-auth">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Authenticación</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-auth" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_token')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener token
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-costumers" data-collapse-toggle="dropdown-costumers">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Clientes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-costumers" class="hidden py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_cliente_propiedades')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Propiedades
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_crear_cliente')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Crear cliente
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_cliente')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener cliente
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listado_clientes')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista clientes
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_editar_cliente')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Editar cliente
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_eliminar_cliente')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Eliminar cliente
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-categories" data-collapse-toggle="dropdown-categories">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Categorias</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-categories" class="hidden py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_propiedades_categoria')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Propiedades
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_crear_categoria')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Crear categoria
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_categoria')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener categoria
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listar_categorias')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista categorias
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_editar_categoria')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Editar categoria
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_eliminar_categoria')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Eliminar categoria
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-productos" data-collapse-toggle="dropdown-productos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Productos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-productos" class="hidden py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_propiedades_producto')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Propiedades
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_crear_producto')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Crear producto
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_producto')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener producto
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listar_productos')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista productos
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_editar_producto')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Editar producto
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_eliminar_producto')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Eliminar producto
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-imagenes" data-collapse-toggle="dropdown-imagenes">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Imagenes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-imagenes" class="hidden py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_propiedades_imagen')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Propiedades
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listar_imagenes')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista imagenes
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_eliminar_imagen')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Eliminar imagen
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-pedidos" data-collapse-toggle="dropdown-pedidos">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Pedidos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-pedidos" class="hidden py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_propiedades_pedido')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Propiedades
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_crear_pedido')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Crear pedido
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_pedido')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener pedido
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listar_pedidos')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista pedidos
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_editar_pedido')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Editar estado pedido
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_cancelar_pedido')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Eliminar pedido
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="sm:ml-64 sm:mt-[64px] flex flex-col justify-center items-center p-10">
        <div class="p-4 w-[60%] min-h-[89vh]" id="documentacion_contenido_principal">
            <div class="w-full" id="contenedor_introduccion">
                <h2 id="h2_introduccion" class="text-2xl font-semibold mt-8 mb-4">Introducción</h2>
                <p class="p-2" id="p_introduccion">
                    Bienvenido a la documentación de la API de nuestro sistema de comercio electrónico.
                    <br>Esta API está diseñada para proporcionar acceso a recursos relacionados con la gestión de
                    clientes, categorías, productos, imágenes y pedidos. </br>
                    Utiliza el esquema <b>RESTful</b> para facilitar la
                    interacción con los recursos de manera uniforme y eficiente.
                </p>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_requisitos">
                <h2 id="h2_requisitos" class="text-2xl font-semibold mt-8 mb-4">Requisitos</h2>
                <p class="p-2" id="p_requisitos">
                    Para utilizar nuestra API, asegúrate de cumplir con los siguientes requisitos:
                <ul class="list-disc pl-8">
                    <li>Conocimientos básicos sobre el protocolo HTTP/HTTPS y el formato JSON.</li>
                    <li>Una cuenta de usuario para autenticarte y obtener un token de acceso.</li>
                    <li>Capacidad para manejar los métodos HTTP estándar (GET, POST, PUT, DELETE) para interactuar con
                        los recursos.
                    </li>
                    <li>Posibilidad de manejar los códigos de estado HTTP para interpretar las respuestas de la API
                        correctamente.
                    </li>
                </ul>
                </p>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_obtener_token">
                <h2 id="h2_obtener_token" class="text-2xl font-semibold mt-8 mb-4">Obtener Token de Acceso</h2>
                <p class="p-2" id="p_obtener_token">
                    Para acceder a los recursos protegidos por la API, necesitas autenticarte y obtener un token de
                    acceso.
                    Sigue los siguientes pasos para obtener un token:
                    </br></br>
                <ol class="list-decimal pl-8">
                    <li>
                        Envía una solicitud HTTP POST al endpoint
                        <code>/api/v1/get_token</code>.
                        <div
                            class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                            <div
                                class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                GET</div>
                            <code class="text-sm">/api/v1/get_token</code>
                        </div>
                    </li>

                    <li>
                        Incluye las credenciales de autenticación (correo electrónico y contraseña) en el cuerpo de la
                        solicitud.
                        <div
                            class="w-full h-[200px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                            <div class="w-full flex flex-row justify-between">
                                <div
                                    class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                    POST
                                </div>
                                <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                    onclick="fn_copiar_codigo('code_get_token_1')">
                                    Copiar
                                </div>
                            </div>

                            <pre class="text-sm" style="text-align: left">
                                <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                                    <span class="text-yellow-400">{</span>
                                    <span class="ml-4"><span class="text-green-400">"email"</span> : "ejemplo@correo.com",</span>
                                    <span class="ml-4"><span class="text-green-400">"password"</span> : "Xx01452154@",</span>
                                    <span class="ml-4"><span class="text-green-400">"password_confirmation"</span> : "Xx01452154@"</span>
                                    <span class="text-yellow-400">}</span>
                                </code>
                                <div class="hidden">
                                    <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="code_get_token_1">
                                        {
                                        "email": "ejemplo@correo.com",
                                        "password": "Xx01452154@",
                                        "password_confirmation": "Xx01452154@"
                                        }
                                    </code>
                                </div>
                            </pre>
                        </div>
                    </li>
                    <li>
                        Si las credenciales son válidas, recibirás una respuesta JSON que contiene un token de acceso.
                        <div
                            class="w-full h-[110px] px-6 py-2 bg-[#1f2937] m-6 mx-auto text-white rounded-[5px] flex justify-start items-center">
                            <pre class="text-sm" style="text-align: left">
                            <code class="w-[50%] flex flex-col justify-center items-start mt-5">
                                <span class="text-yellow-400">{</span>
                                <span class="ml-4"><span class="text-green-400">"token"</span> : "22|y3I3Y3dBcD2eTC8vFyiVITSLKPypKqo6zMmo89Cy22d457bb"</span>
                                <span class="text-yellow-400">}</span>
                            </code>
                        </pre>
                        </div>
                    </li>
                    <li>Utiliza el token obtenido como autorización Bearer en el encabezado
                        <code>Authorization</code>
                        de las solicitudes posteriores al API para autenticarte.
                    </li>
                </ol>
                </p>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_errores">
                <h2 id="h2_errores" class="text-2xl font-semibold mt-8 mb-4">Errores</h2>
                <p class="p-2" id="p_errores">
                    Ocasionalmente puedes encontrarte con errores al acceder a la API . Hay varios tipos posibles:
                </p>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2">Código de Error</th>
                            <th class="px-4 py-2">Tipo de Error</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 text-[14px]">400 Bad Request</td>
                            <td class="px-4 py-2 text-[14px]">Solicitud inválida, por ejemplo, usando un método HTTP no
                                soportado
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-[14px]">401 , 419 , 403 Unauthorized</td>
                            <td class="px-4 py-2 text-[14px]">Error de autenticación o permiso, por ejemplo, claves de
                                API
                                incorrectas</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-[14px]">404 Not Found</td>
                            <td class="px-4 py-2 text-[14px]">Solicitudes a recursos que no existen o están ausentes
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 text-[14px]">500 Internal Server Error</td>
                            <td class="px-4 py-2 text-[14px]">Error del servidor</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_paginacion">
                <h2 id="h2_paginacion" class="text-2xl font-semibold mt-8 mb-4">Paginación</h2>
                <p class="p-2" id="p_paginacion">
                    Para optimizar el rendimiento del servidor y mejorar la experiencia del usuario, nuestra API utiliza
                    la paginación para limitar la cantidad de registros devueltos en cada solicitud. </br>Asegúrate de
                    cumplir con los siguientes requisitos para trabajar con nuestra API de manera efectiva:
                </p>
                <p class="p-2">
                    Ten en cuenta que nuestra API implementa una paginación que limita el número máximo de registros
                    devueltos por página a 50.</br> Esto ayuda a reducir la carga en el servidor y a mejorar la eficiencia de
                    las consultas. Si necesitas más registros, puedes ajustar la paginación utilizando los parámetros
                    adecuados en tu solicitud.
                </p>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_filtrado">
                <h2 id="h2_filtrado" class="text-2xl font-semibold mt-8 mb-4">Filtrado</h2>
                <p class="p-2">Puedes utilizar el filtrado en las URLs para obtener resultados específicos. Utiliza
                    los siguientes parámetros:</p>
                <p class="px-2 mb-8" style="color:red">Nota: Los parámetros deben estar en camelcase, por ejemplo,
                    firstName.</p>

                <div class="mb-8 p-4" id="contenedor_tabla_filtrado_cliente">
                    <h3 class="text-lg font-semibold mb-4">Clientes</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Parámetro</th>
                                <th class="px-4 py-2">Operador</th>
                                <th class="px-4 py-2">Valor</th>
                                <th class="px-4 py-2">Valores permitidos</th>
                                <th class="px-4 py-2">Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">firstName</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?firstName[eq]=John</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">lastName</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?lastName[like]=Doe</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">customerType</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">business or individual</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?customerType[eq]=business</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">status</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">active or deleted</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?customerType[eq]=active</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">email</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?email[eq]=example@example.com</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">postalCode</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto o número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?postalCode[eq]=12345</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">city</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?city[eq]=New York</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">state</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?state[eq]=California</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">country</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?country[eq]=USA</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">phone</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?phone[eq]=1234567890</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">isPayingCustomer</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Booleano (true o false)</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/customers?isPayingCustomer[eq]=true</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="mb-8 p-4" id="contenedor_tabla_filtrado_categorias">
                    <h3 class="text-lg font-semibold mb-4">Categorías</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Parámetro</th>
                                <th class="px-4 py-2">Operador</th>
                                <th class="px-4 py-2">Valor</th>
                                <th class="px-4 py-2">Valores permitidos</th>
                                <th class="px-4 py-2">Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">name</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/categories?name[eq]=Electronics</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">parent</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Numero</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/categories?parent[eq]=1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="mb-8 p-4" id="contenedor_tabla_filtrado_productos">
                    <h3 class="text-lg font-semibold mb-4">Productos</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Parámetro</th>
                                <th class="px-4 py-2">Operador</th>
                                <th class="px-4 py-2">Valor</th>
                                <th class="px-4 py-2">Valores permitidos</th>
                                <th class="px-4 py-2">Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">name</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?name[eq]=Laptop</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">categoryId</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?categoryId[eq]=2</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">sku</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Texto</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?sku[eq]=ABC123</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">type</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">simple,grouped,external ó variable</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?type[eq]=simple</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">status</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">publish,draft,pending ó private</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?status[eq]=publish</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">price</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?price[lte]=1000</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">salePrice</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?salePrice[eq]=800</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">OnSale</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">true ó false</td>
                                <td class="px-4 py-2 text-[13px]">Booleano</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?OnSale[eq]=true</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">stockQuantity</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?stockQuantity[gte]=10</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">stockStatus</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">instock ó outofstock</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/products?stockStatus[eq]=instock</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="mb-8 p-4" id="contenedor_tabla_filtrado_pedidos">
                    <h3 class="text-lg font-semibold mb-4">Pedidos</h3>
                    <table class="w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-4 py-2">Parámetro</th>
                                <th class="px-4 py-2">Operador</th>
                                <th class="px-4 py-2">Valor</th>
                                <th class="px-4 py-2">Valores permitidos</th>
                                <th class="px-4 py-2">Ejemplo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">customerId</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?customerId[eq]=123</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">status</td>
                                <td class="px-4 py-2 text-[13px]">[eq],[like]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">pending, processing, on-hold, completed, cancelled, refunded, failed ó trash</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?status[eq]=processing</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">currency</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">EUR,USD</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?currency[eq]=EUR</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">discountTotal</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?discountTotal[gte]=50</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">shippingTotal</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?shippingTotal[lte]=100</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">taxType</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">percentage,amount</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?taxType[eq]=amount</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">totalTax</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?totalTax[eq]=20</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">shippingTotalWidthTax</td>
                                <td class="px-4 py-2 text-[13px]">[eq]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Número</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?shippingTotalWidthTax[eq]=150</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">date_paid</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Fecha</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?date_paid[gte]=2022-01-01</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 text-[13px]">date_completed</td>
                                <td class="px-4 py-2 text-[13px]">[eq], [lt], [lte], [gt], [gte]</td>
                                <td class="px-4 py-2 text-[13px]">[valor]</td>
                                <td class="px-4 py-2 text-[13px]">Fecha con formato Y-m-d</td>
                                <td class="px-4 py-2 text-[13px]">/api/v1/orders?date_completed[lte]=2022-05-01</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_cliente_propiedades">
                <h2 id="h2_cliente_propiedades" class="text-2xl font-semibold mt-8 mb-4">Propiedades del Cliente</h2>
                <p class="p-2" id="p_cliente_propiedades">
                    Aquí encontrarás información sobre las propiedades de un cliente, como su nombre, dirección, correo
                    electrónico, etc.
                </p>
                <div class="contenedor-tabla-cliente w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Tipos de datos y otros detalles.
                                </p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Propiedad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Dato
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        first_name
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        last_name
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        status
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('active')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        customer_type
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        email
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        password
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        adress
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        postal_code
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        city
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        state
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        country
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        phone
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        is_paying_customer
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(true)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        avatar_url
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        meta_data
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        updated_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_crear_cliente">
                <h2 id="h2_crear_cliente" class="text-2xl font-semibold mt-8 mb-4">Crear un Nuevo Cliente</h2>
                <p class="p-2" id="p_crear_cliente">
                    Para ello, debe enviar una solicitud HTTP POST al endpoint correspondiente junto con los datos del
                    cliente.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            POST</div>
                        <code class="text-sm">/api/v1/customers</code>
                    </div>
                    <div
                        class="w-full h-[350px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                POST
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('new_costumer_body')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"firstName"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"lastName"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"customerType"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"email"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"password"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"adress"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"postalCode"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"city"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"state"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"country"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"phone"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="new_costumer_body">
                                {
                                    "firstName": "",
                                    "lastName": "",
                                    "customerType": "",
                                    "email": "",
                                    "password": "",
                                    "adress": "",
                                    "postalCode": "",
                                    "city": "",
                                    "state": "",
                                    "country": "",
                                    "phone": ""
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id=" contenedor_editar_cliente">
                <h2 id="h2_editar_cliente" class="text-2xl font-semibold mt-8 mb-4">
                    Actualizar Datos de un Cliente
                </h2>
                <p class="p-2" id="p_editar_cliente_put">
                    Para modificar los datos de un cliente, debe enviar una solicitud HTTP <b>PUT</b> al endpoint
                    correspondiente con los datos actualizados del cliente, incluyendo el ID del cliente.</br>
                    Utilice el método <b>PUT</b>.</br>
                    <small style="color: red">DEBE PROPORCIONAR TODOS LOS CAMPOS REQUERIDOS.</small>
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            PUT</div>
                        <code class="text-sm">/api/v1/customers/{id}</code>
                    </div>
                    <div
                        class="w-full h-[330px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PUT
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_costumer_body_put')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"firstName"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"lastName"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"customerType"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"adress"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"postalCode"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"city"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"state"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"country"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"phone"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_costumer_body_put">
                                {
                                    "firstName": "",
                                    "lastName": "",
                                    "customerType": "",
                                    "adress": "",
                                    "postalCode": "",
                                    "city": "",
                                    "state": "",
                                    "country": "",
                                    "phone": ""
                                }
                            </code>
                        </div>
                        </pre>
                    </div>

                    <p class="p-2" id="p_editar_cliente_patch">
                        Si solo quieres modificar un campo en concreto utiliza el metodo <b>PATCH</b>.
                    </p>
                    <div
                        class="w-full h-[150px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PATCH
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_costumer_body_patch')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"firstName"</span> : "",</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_costumer_body_patch">
                                {
                                    "firstName": "",
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_obtener_cliente">
                <h2 id="h2_obtener_cliente" class="text-2xl font-semibold mt-8 mb-4">Obtener datos de un cliente</h2>
                <p class="p-2" id="p_obtener_cliente">
                    Obtén detalles de un cliente existente en la base de datos.
                    </br> Esto generalmente se hace
                    enviando una solicitud HTTP GET al endpoint correspondiente con el <b>ID</b> del cliente.
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/customers/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_listado_clientes">
                <h2 id="h2_listado_clientes" class="text-2xl font-semibold mt-8 mb-4">Listado de Clientes</h2>
                <p class="p-2" id="p_listado_clientes">
                    Accede a una lista de todos los clientes almacenados en la base de datos.</br>
                    Esto implica enviar una solicitud HTTP GET al endpoint correspondiente.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/customers</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_eliminar_cliente">
                <h2 id="h2_eliminar_cliente" class="text-2xl font-semibold mt-8 mb-4">Eliminar Cliente</h2>
                <p class="p-2" id="p_eliminar_cliente">
                    Elimina un cliente existente de la base de datos.<br>
                    Esto se hace enviando una solicitud HTTP <b>DELETE</b> al endpoint correspondiente con el <b>ID</b>
                    del cliente a eliminar.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-red-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            DELETE</div>
                        <code class="text-sm">/api/v1/customers/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_categoria_propiedades">
                <h2 id="h2_categoria_propiedades" class="text-2xl font-semibold mt-8 mb-4">
                    Propiedades de la categoria
                </h2>
                <p class="p-2" id="p_categoria_propiedades">
                    Información sobre las propiedades de la categoria, como su nombre...etc.
                </p>
                <div class="contenedor-tabla-category w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Tipos de datos y otros detalles.
                                </p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Propiedad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Dato
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        name
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        parent
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        description
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        short_description
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        display
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('default')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        image
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        status
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('active')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        discontinued
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(false)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        valid
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(true)
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        updated_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_crear_categoria">
                <h2 id="h2_crear_categoria" class="text-2xl font-semibold mt-8 mb-4">Crear Categoria</h2>
                <p class="p-2" id="p_crear_categoria">
                    Para crear una nueva categoria en la base de datos debes enviar una solicitud HTTP POST al endpoint
                    correspondiente con los datos de la categoria.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            POST</div>
                        <code class="text-sm">/api/v1/categories</code>
                    </div>
                    <div
                        class="w-full h-[230px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                POST
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('new_category_body')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"name"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"parent"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"description"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"shortDescription"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="new_category_body">
                                {
                                    "name": "",
                                    "parent": "",
                                    "description": "",
                                    "shortDescription": ""
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id=" contenedor_editar_categoria">
                <h2 id="h2_editar_categoria" class="text-2xl font-semibold mt-8 mb-4">Editar una categoria
                </h2>
                <p class="p-2" id="p_editar_categoria_put">
                    Modifica los datos de una categoria enviando una solicitud HTTP PUT al endpoint </br>
                    Con el metodo <b>PUT , DEBES ENVIAR TODOS LOS CAMPOS REQUERIDOS</b>
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            PUT</div>
                        <code class="text-sm">/api/v1/categories/{id}</code>
                    </div>
                    <div
                        class="w-full h-[230px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PUT
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_category_body_put')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"name"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"parent"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"description"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"shortDescription"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_category_body_put">
                                {
                                    "name": "",
                                    "parent": "",
                                    "description": "",
                                    "shortDescription": ""
                                }
                            </code>
                        </div>
                        </pre>
                    </div>

                    <p class="p-2" id="p_editar_categoria_patch">
                        Si solo quieres modificar un campo en concreto utiliza el metodo <b>PATCH</b>.
                    </p>
                    <div
                        class="w-full h-[150px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PATCH
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_category_body_patch')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"description"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_category_body_patch">
                                {
                                    "description": "",
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_obtener_categoria">
                <h2 id="h2_obtener_categoria" class="text-2xl font-semibold mt-8 mb-4">Obtener datos de una categoria
                </h2>
                <p class="p-2" id="p_obtener_categoria">
                    Esto generalmente se hace enviando una solicitud HTTP GET al endpoint correspondiente con el
                    <b>ID</b> de la categoria.
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/categories/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_listado_categorias">
                <h2 id="h2_listado_categorias" class="text-2xl font-semibold mt-8 mb-4">
                    Obtener todas las categorias
                </h2>
                <p class="p-2" id="p_listado_categorias">
                    Accede a una lista de todas las categorias almacenados en la base de datos.</br>
                    Esto implica enviar una solicitud HTTP GET al endpoint correspondiente.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/categories</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_eliminar_categoria">
                <h2 id="h2_eliminar_categoria" class="text-2xl font-semibold mt-8 mb-4">Eliminar categoria</h2>
                <p class="p-2" id="p_eliminar_categoria">
                    Elimina una categoria existente de la base de datos.<br>
                    Esto se hace enviando una solicitud HTTP <b>DELETE</b> al endpoint correspondiente con el <b>ID</b>
                    de la categoria a eliminar.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-red-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            DELETE</div>
                        <code class="text-sm">/api/v1/categories/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_productos_propiedades">
                <h2 id="h2_producto_propiedades" class="text-2xl font-semibold mt-8 mb-4">Propiedades del producto
                </h2>
                <p class="p-2" id="p_producto_propiedades">
                    Información sobre las propiedades del producto, como su nombre...etc.
                </p>

                <div class="contenedor-tabla-producto w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Tipos de datos y otros detalles.
                                </p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Propiedad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Dato
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        name
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        category_id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        sku
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable | unique
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ean
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ean13
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        type
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('simple')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        status
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('publish')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        featured
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(false)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        catalog_visibility
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('visible')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        description
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        short_description
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        price
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        regular_price
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        sale_price
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        on_sale
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(true)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        stock_quantity
                                    </th>
                                    <td class="px-6 py-4">
                                        integer | default(0)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        stock_status
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('instock')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        weight
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        dimensions
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        image
                                    </th>
                                    <td class="px-6 py-4">
                                        string | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        meta_data
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        variation
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(false)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        discontinued
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default(false)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        valid
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(true)
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        updated_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_crear_producto">
                <h2 id="h2_crear_producto" class="text-2xl font-semibold mt-8 mb-4">Nuevo producto</h2>
                <p class="p-2" id="p_crear_producto">
                    Para crear un nuevo producto en la base de datos debes enviar una solicitud HTTP POST al endpoint
                    correspondiente con los datos del producto.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            POST</div>
                        <code class="text-sm">/api/v1/prooducts</code>
                    </div>
                    <div
                        class="w-full h-[580px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                POST
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('new_product_body')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"category_id"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"name"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"sku"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"ean"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"ean13"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"type"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"status"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"catalog_visibility"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"description"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"short_description"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"regular_price"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"sale_price"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"price"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"on_sale"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"valid"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"stock_quantity"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"stock_status"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"weight"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"dimensions"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"variation"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"featured"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"discontinued"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="new_product_body">
                                {
                                    "category_id": 3,
                                    "name": "nihihhl",
                                    "sku": "9473111",
                                    "ean": null,
                                    "ean13": null,
                                    "type": "simple",
                                    "status": "publish", 
                                    "catalog_visibility": "visible",
                                    "description": "Soluta facere nihil eni.",
                                    "short_description": "Perspiciatis impedit eum cumque excepturi magnam aspernatur non inventore.",
                                    "regular_price": "217.12",
                                    "sale_price": "373.40",
                                    "price": "373.40",
                                    "on_sale": false,
                                    "valid": "1",
                                    "stock_quantity": 77,
                                    "stock_status": "outofstock",
                                    "weight": "7kg",
                                    "dimensions": "92x90x16cm",
                                    "variation": 0,
                                    "featured": false,
                                    "discontinued":false
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id=" contenedor_editar_producto">
                <h2 id="h2_editar_producto" class="text-2xl font-semibold mt-8 mb-4">
                    Editar un producto
                </h2>
                <p class="p-2" id="p_editar_producto_put">
                    Modifica los datos del producto enviando una solicitud HTTP PUT al endpoint correspondiente
                    Con el metodo <b>PUT , DEBES ENVIAR TODOS LOS CAMPOS REQUERIDOS</b>
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            PUT</div>
                        <code class="text-sm">/api/v1/products/{id}</code>
                    </div>
                    <div
                        class="w-full h-[580px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PUT
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_product_body_put')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                                <span class="ml-4"><span class="text-green-400">"category_id"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"name"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"sku"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"ean"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"ean13"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"type"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"status"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"catalog_visibility"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"description"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"short_description"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"regular_price"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"sale_price"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"price"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"on_sale"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"valid"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"stock_quantity"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"stock_status"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"weight"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"dimensions"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"variation"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"featured"</span> : ""</span>
                                <span class="ml-4"><span class="text-green-400">"discontinued"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_product_body_put">
                                {
                                    "category_id": 3,
                                    "name": "nihihhl",
                                    "sku": "9473111",
                                    "ean": null,
                                    "ean13": null,
                                    "type": "simple",
                                    "status": "publish", 
                                    "catalog_visibility": "visible",
                                    "description": "Soluta facere nihil eni.",
                                    "short_description": "Perspiciatis impedit eum cumque excepturi magnam aspernatur non inventore.",
                                    "regular_price": "217.12",
                                    "sale_price": "373.40",
                                    "price": "373.40",
                                    "on_sale": false,
                                    "valid": "1",
                                    "stock_quantity": 77,
                                    "stock_status": "outofstock",
                                    "weight": "7kg",
                                    "dimensions": "92x90x16cm",
                                    "variation": 0,
                                    "featured": false,
                                    "discontinued":false
                                }
                            </code>
                        </div>
                        </pre>
                    </div>

                    <p class="p-2" id="p_editar_producto_patch">
                        Si solo quieres modificar un campo en concreto utiliza el metodo <b>PATCH</b>.
                    </p>
                    <div
                        class="w-full h-[150px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PATCH
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_product_body_patch')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                            <span class="ml-4"><span class="text-green-400">"name"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_product_body_patch">
                                {
                                    "name": "",
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_obtener_producto">
                <h2 id="h2_obtener_producto" class="text-2xl font-semibold mt-8 mb-4">Obtener datos de un producto
                </h2>
                <p class="p-2" id="p_obtener_producto">
                    Esto generalmente se hace enviando una solicitud HTTP GET al endpoint correspondiente con el
                    <b>ID</b> del producto.
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/products/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_listado_productos">
                <h2 id="h2_listado_productos" class="text-2xl font-semibold mt-8 mb-4">
                    Obtener todos los productos
                </h2>
                <p class="p-2" id="p_listado_productos">
                    Accede a una lista de todos los productos almacenados en la base de datos.</br>
                    Esto implica enviar una solicitud HTTP GET al endpoint correspondiente.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/products</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_eliminar_producto">
                <h2 id="h2_eliminar_producto" class="text-2xl font-semibold mt-8 mb-4">Eliminar producto</h2>
                <p class="p-2" id="p_eliminar_producto">
                    Elimina un producto existente de la base de datos.<br>
                    Esto se hace enviando una solicitud HTTP <b>DELETE</b> al endpoint correspondiente con el <b>ID</b>
                    del producto a eliminar.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-red-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            DELETE</div>
                        <code class="text-sm">/api/v1/products/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_pedido_propiedades">
                <h2 id="h2_pedido_propiedades" class="text-2xl font-semibold mt-8 mb-4">
                    Propiedades del pedido
                </h2>
                <p class="p-2" id="p_pedido_propiedades">
                    Información sobre las propiedades del pedido.
                </p>

                <div class="contenedor-tabla-order w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Tipos de datos y otros detalles.
                                </p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Propiedad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Dato
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        customer_id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        customer_ip_address
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        status
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('pending')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        currency
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('EUR')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        discount_total
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2) | default(0)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        shipping_total
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        tax_type
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('percentage')
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        total_tax
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        shipping_total_with_tax
                                    </th>
                                    <td class="px-6 py-4">
                                        decimal(8, 2)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        billing
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        shipping
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        payment_method
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        payment_method_title
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        date_paid
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        date_completed
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        line_items
                                    </th>
                                    <td class="px-6 py-4">
                                        json | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        coupon_lines
                                    </th>
                                    <td class="px-6 py-4">
                                        text | nullable
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        set_paid
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean | default(false)
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_via
                                    </th>
                                    <td class="px-6 py-4">
                                        string | default('rest_api')
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        updated_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_crear_pedido">
                <h2 id="h2_crear_pedido" class="text-2xl font-semibold mt-8 mb-4">Generar un pedido</h2>
                <p class="p-2" id="p_crear_pedido">
                    Para generar un pedido debes enviar una solicitud HTTP POST al endpoint
                    correspondiente con los datos necesarios.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            POST
                        </div>
                        <code class="text-sm">/api/v1/orders</code>
                    </div>
                    <div
                        class="w-full h-[480px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                POST
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('new_order_body')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">

                            <span class="text-yellow-400">{</span>

                            <span class="ml-4"><span class="text-green-400">"customerId"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"customerIpAddress"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"status"</span> : "pending"</span>
                            <span class="ml-4"><span class="text-green-400">"currency"</span> : "EUR"</span>
                            <span class="ml-4"><span class="text-green-400">"discountTotal"</span> : "0.00"</span>
                            <span class="ml-4"><span class="text-green-400">"shippingTotal"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"taxType"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"totalTax"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"shippingTotalwithTax"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"billing"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"shipping"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"paymentMethod"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"paymentMethodTitle"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"datePaid"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"dateCompleted"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"lineItems"</span>:<span>[]</span></span>
                            
                            <span class="text-yellow-400">}</span>
                        </code>

                        
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="new_order_body">
                                {
                                    "customerId": 151,
                                    "customerIpAddress": "192.1.1.1",
                                    "status": "pending",
                                    "currency": "EUR",
                                    "discountTotal": "0.00",
                                    "shippingTotal": "994.38",
                                    "taxType": "percentage",
                                    "totalTax": "45.62",
                                    "shippingTotalwithTax": "1040.00",
                                    "billing": null,
                                    "shipping": null,
                                    "paymentMethod": "credit_card",
                                    "paymentMethodTitle": "Credit Card",
                                    "datePaid": "2024-04-19 07:19:03",
                                    "dateCompleted": "2024-04-06 15:19:42",
                                    "lineItems": [
                                        {
                                            "id": 554,
                                            "name": "et",
                                            "price": "12.00",
                                            "quantity": 2
                                        },
                                        {
                                            "id": 517,
                                            "name": "ducimus",
                                            "price": "790.38",
                                            "quantity": 5
                                        },
                                        {
                                            "id": 362,
                                            "name": "facilis",
                                            "price": "161.02",
                                            "quantity": 5
                                        }
                                    ],
                                    "couponLines": []
                                }
                                
                            </code>
                        </div>
                        </pre>
                    </div>
                    <p class="p-2" id="p_crear_pedido_info_productos">
                        El cuerpo del pedido debe llevar informacion de los productos que es un array de objetos llamado
                        lineItems.</b>
                        Debe llevar al menos un producto con la informacion:
                    <ol class="list-decimal pl-8">
                        <li><b>id</b> : Id del producto .</li>
                        <li><b>name</b> : Nombre del producto.</li>
                        <li><b>price</b> : Precio del producto.</li>
                        <li><b>quantity</b> : Cantidad de productos.</li>
                    </ol>
                    </p>
                    <div
                        class="w-full h-[160px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">

                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">

                            <span class="text-yellow-400">{</span>

                            <span class="ml-4"><span class="text-green-400">"id"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"name"</span> : "",</span>
                            <span class="ml-4"><span class="text-green-400">"price"</span> : ""</span>
                            <span class="ml-4"><span class="text-green-400">"quantity"</span> : ""</span>   

                            <span class="text-yellow-400">}</span>
                        </code>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id=" contenedor_editar_pedido">
                <h2 id="h2_editar_pedido" class="text-2xl font-semibold mt-8 mb-4">
                    Editar un pedido
                </h2>
                <p class="p-2" id="p_editar_pedido_put">
                    Una vez generado, el pedido no puede ser modificado en su totalidad. Sin embargo, es posible
                    realizar ajustes en determinados campos mediante el uso del método PATCH.
                </p>


                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            PATCH</div>
                        <code class="text-sm">/api/v1/orders/{id}</code>
                    </div>
                    <div
                        class="w-full h-[250px] m-6 mx-auto bg-[#1f2937] text-white rounded-[5px] flex flex-col justify-start items-start">
                        <div class="w-full flex flex-row justify-between">
                            <div
                                class="ml-4 mt-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                                PATCH
                            </div>
                            <div class="mr-4 mt-4 w-16 h-8 bg-gray-700 flex justify-center items-center font-semibold rounded-sm text-sm cursor-pointer"
                                onclick="fn_copiar_codigo('edit_product_body_patch')">
                                Copiar
                            </div>
                        </div>
                        <pre class="text-sm" style="text-align: left">
                        <code class="w-[50%] px-6 flex flex-col justify-start items-start">
                            <span class="text-yellow-400">{</span>
                                <span class="ml-4"><span class="text-green-400">"status"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"shipping"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"billing"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"datePaid"</span> : "",</span>
                                <span class="ml-4"><span class="text-green-400">"dateCompleted"</span> : ""</span>
                            <span class="text-yellow-400">}</span>
                        </code>
                        <div class="hidden">
                            <code class="w-[50%] px-6 flex flex-col justify-start items-start" id="edit_product_body_patch">
                                {
                                    "status": "",
                                    "billing": null,
                                    "shipping": null,
                                    "datePaid": "2024-04-19 07:19:03",
                                    "dateCompleted": "2024-04-06 15:19:42",
                                }
                            </code>
                        </div>
                        </pre>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_obtener_producto">
                <h2 id="h2_obtener_producto" class="text-2xl font-semibold mt-8 mb-4">
                    Obtener información de un pedido
                </h2>
                <p class="p-2" id="p_obtener_producto">
                    Esto generalmente se hace enviando una solicitud HTTP GET al endpoint correspondiente con el
                    <b>ID</b> del pedido.
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/orders/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">


            <div id="contenedor_listado_pedidos">
                <h2 id="h2_listado_pedidos" class="text-2xl font-semibold mt-8 mb-4">
                    Obtener una lista de todos los pedidos
                </h2>
                <p class="p-2" id="p_listado_pedidos">
                    Accede a una lista exhaustiva de todos los pedidos almacenados en la base de datos. Esto requiere
                    enviar una solicitud HTTP GET al endpoint correspondiente.
                </p>

                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/orders</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_eliminar_pedido">
                <h2 id="h2_eliminar_pedido" class="text-2xl font-semibold mt-8 mb-4">Eliminar pedido</h2>
                <p class="p-2" id="p_eliminar_pedido">
                    Elimina un pedido existente de la base de datos.<br>
                    Esto se hace enviando una solicitud HTTP <b>DELETE</b> al endpoint correspondiente con el <b>ID</b>
                    del pedido a eliminar.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-red-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            DELETE</div>
                        <code class="text-sm">/api/v1/orders/{id}</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_imagen_propiedades">
                <h2 id="h2_imagen_propiedades" class="text-2xl font-semibold mt-8 mb-4">
                    Propiedades de una imagen
                </h2>
                <p class="p-2" id="p_imagen_propiedades">
                    Información sobre las propiedades de una imagen, como su url...etc.
                </p>

                <div class="contenedor-tabla-image w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Tipos de datos y otros detalles.
                                </p>
                            </caption>
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Propiedad
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de Dato
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        product_id
                                    </th>
                                    <td class="px-6 py-4">
                                        integer
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        url_image
                                    </th>
                                    <td class="px-6 py-4">
                                        string
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        active
                                    </th>
                                    <td class="px-6 py-4">
                                        boolean
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        created_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        updated_at
                                    </th>
                                    <td class="px-6 py-4">
                                        timestamp
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_listado_imagenes">
                <h2 id="h2_listado_imagenes" class="text-2xl font-semibold mt-8 mb-4">
                    Obtener todas las imagenes
                </h2>
                <p class="p-2" id="p_listado_categorias">
                    Accede a una lista de todas las imagenes almacenados en la base de datos.</br>
                    Esto implica enviar una solicitud HTTP GET al endpoint correspondiente.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-green-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            GET</div>
                        <code class="text-sm">/api/v1/images</code>
                    </div>
                </div>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <div id="contenedor_eliminar_imagen">
                <h2 id="h2_eliminar_imagen" class="text-2xl font-semibold mt-8 mb-4">Eliminar imagen</h2>
                <p class="p-2" id="p_eliminar_imagen">
                    Elimina una imagen existente de la base de datos.<br>
                    Esto se hace enviando una solicitud HTTP <b>DELETE</b> al endpoint correspondiente con el <b>ID</b>
                    de la imagen a eliminar.
                </p>
                <div class="w-full">
                    <div
                        class="w-full h-[60px] m-6 mx-auto  bg-[#1f2937] rounded-[5px] text-white flex flex-row justify-start items-center gap-2">
                        <div
                            class="ml-4 w-16 h-8 bg-red-700 flex justify-center items-center font-semibold rounded-sm text-sm">
                            DELETE</div>
                        <code class="text-sm">/api/v1/images/{id}</code>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-guest-layout>
