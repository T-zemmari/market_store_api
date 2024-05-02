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
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_token')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Autenticación (HTTPS)
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
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_crear_imagen')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Crear imagen
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_obtener_imagen')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener imagen
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_listar_imagenes')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Obtener lista imagenes
                            </a>
                        </li>
                        <li class="cursor-pointer" onclick="fn_scroll_to('contenedor_editar_imagen')">
                            <a
                                class="text-[14px] flex items-center w-full p-1 text-white transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Editar imagen
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

            <div id="contenedor_obtener_token">
                <h2 id="h2_obtener_token" class="text-2xl font-semibold mt-8 mb-4">Obtener Token de Acceso</h2>
                <p class="p-2" id="p_obtener_token">
                    Para acceder a los recursos protegidos por la API, necesitas autenticarte y obtener un token de
                    acceso.
                    Sigue los siguientes pasos para obtener un token:
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
                            class="w-full px-6 py-2 bg-[#1f2937] m-6 mx-auto text-white rounded-[5px] flex justify-start items-center">
                            <pre class="text-sm" style="text-align: left">
                            <code class="w-[50%] flex flex-col justify-center items-start">
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
                                Propiedades de Clientes
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

            <div id="contenedor_crear_cliente">
                <h2 id="h2_crear_cliente" class="text-2xl font-semibold mt-8 mb-4">Crear Cliente</h2>
                <p class="p-2" id="p_crear_cliente">
                    Crear un nuevo cliente en la base de datos. Para es debes enviar una solicitud
                    HTTP POST al endpoint correspondiente con los datos del cliente.
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


            <div id=" contenedor_editar_cliente">
                <h2 id="h2_editar_cliente" class="text-2xl font-semibold mt-8 mb-4">Actualizar datos de un cliente
                </h2>
                <p class="p-2" id="p_editar_cliente">
                    Modifica los datos de un cliente enviando una solicitud HTTP PUT al endpoint correspondiente con los
                    datos actualizados del cliente.</br>
                    Con el metodo <b>PUT , DEBES ENVIAR TODOS LOS CAMPOS REQUERIDOS</b>
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

                    <p class="p-2" id="p_editar_cliente">
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


            <div id="contenedor_cliente_propiedades">
                <h2 id="h2_cliente_propiedades" class="text-2xl font-semibold mt-8 mb-4">Propiedades de la categoria</h2>
                <p class="p-2" id="p_cliente_propiedades">
                    Aquí encontrarás información sobre las propiedades de una categoria, como su nombre...etc.
                </p>
                <div class="contenedor-tabla-category w-full m-6 mx-auto flex justify-center items-center">
                    <div class="w-[90%] overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption
                                class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Propiedades de Categoría
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


            <div id=" contenedor_editar_categoria">
                <h2 id="h2_editar_cliente" class="text-2xl font-semibold mt-8 mb-4">Editar una categoria
                </h2>
                <p class="p-2" id="p_editar_cliente">
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

                    <p class="p-2" id="p_editar_cliente">
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

            <div id="contenedor_obtener_cliente">
                <h2 id="h2_obtener_cliente" class="text-2xl font-semibold mt-8 mb-4">Obtener datos de una categoria
                </h2>
                <p class="p-2" id="p_obtener_cliente">
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

            <div id="contenedor_listado_clientes">
                <h2 id="h2_listado_clientes" class="text-2xl font-semibold mt-8 mb-4">Obtener todas las categorias</h2>
                <p class="p-2" id="p_listado_clientes">
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

            <div id="contenedor_eliminar_cliente">
                <h2 id="h2_eliminar_cliente" class="text-2xl font-semibold mt-8 mb-4">Eliminar categoria</h2>
                <p class="p-2" id="p_eliminar_cliente">
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



        </div>
    </div>


</x-guest-layout>
