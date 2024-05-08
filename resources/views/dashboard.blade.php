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
                <li class="cursor-pointer">
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
                <li class="cursor-pointer">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-clientes" data-collapse-toggle="dropdown-clientes">
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar
                            clientes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-clientes" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_obtener_clientes()">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] ">
                                Clientes
                            </span>
                        </li>
                        <li class="cursor-pointer"
                            onclick="fn_mostrar_formulario_crear_cliente('contenedor_crear_nuevo_cliente')">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]  ">
                                Nuevo cliente
                            </span>
                        </li>
                    </ul>
                </li>
                <li class="cursor-pointer">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-categorias" data-collapse-toggle="dropdown-categorias">
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar
                            categorias</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-categorias" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_obtener_categorias()">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] ">
                                Categorias
                            </span>
                        </li>
                        <li class="cursor-pointer"
                            onclick="fn_mostrar_formulario_crear_categoria('contenedor_crear_nueva_categoria')">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Nueva categoria
                            </span>
                        </li>
                    </ul>
                </li>
                <li class="cursor-pointer">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-productos" data-collapse-toggle="dropdown-productos">
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar
                            productos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-productos" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_obtener_productos()">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Productos
                            </span>
                        </li>
                        <li class="cursor-pointer"
                            onclick="fn_mostrar_formulario_crear_producto('contenedor_crear_nuevo_producto')">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]">
                                Nuevo producto
                            </span>
                        </li>
                    </ul>
                </li>
                <li class="cursor-pointer">
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-white transition duration-75 rounded-sm group hover:bg-[#374151]"
                        aria-controls="dropdown-pedidos" data-collapse-toggle="dropdown-pedidos">
                        <span
                            class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-[14px] uppercase">Gestionar
                            pedidos</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-pedidos" class="py-2 space-y-2">
                        <li class="cursor-pointer" onclick="fn_obtener_pedidos()">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151] ">
                                Pedidos
                            </span>
                        </li>
                        <li class="cursor-pointer"
                            onclick="fn_mostrar_formulario_generar_pedido('contenedor_generar_un_pedido')">
                            <span
                                class="text-[14px] flex items-center w-full p-1 text-[#bac0d2] transition duration-75 rounded-sm pl-11 group hover:bg-[#374151]  ">
                                Generar pedido
                            </span>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64 sm:mt-[64px] md:p-0 md:px-0">
        <div class="hidden w-full h-[89vh]  justify-center items-center" id="contenedor_spinner">
            <div role="status" class="p-4 flex justify-center items-center">
                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin fill-blue-600"
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
        <div class="contenedor_formularios contenedor_crear_nuevo_producto w-full  p-4 mb-10"
            data-info="contenedor_crear_nuevo_producto" id="contenedor_crear_nuevo_producto" style="display: none">
            <div class="w-full mt-5 flex flex-row gap-2 ">
                <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_producto">
                    <div class="w-[40%]  border-2 border-gray-200 flex flex-col  items-center">
                        <div class="conenedor_producto_img_prev w-[60%] h-[60%] border-2 border-gray-200 mt-5 flex justify-center items-center"
                            id="conenedor_producto_img_prev"></div>
                        <div class="conenedor_producto_resto_img_prev w-[100%] min-h-[1%] border-t-2 border-gray-200 mt-5 flex flex-row justify-center items-center gap-2"
                            id="conenedor_producto_resto_img_prev">
                        </div>
                        <div class="w-full p-8 grid gap-6 mb-6 md:grid-cols-1 border-t-2 border-gray-200">
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900"
                                    for="principal_image">Añadir imagen principal</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                    id="principal_image" name="principal_image" type="file"
                                    accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Añadir
                                    resto de imagenes</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                    id="images" name="images[]" type="file" multiple
                                    accept=".png, .jpg, .jpeg, .webp">
                            </div>
                        </div>

                    </div>
                    <div class="w-[60%] h-[100%] border-2 border-gray-200 flex flex-col">
                        <div class="w-full h-[50px] border-b-2 border-gray-200 flex justify-center items-center">
                            <h2 class="text-2xl font-semibold">Rellena el formulario del producto</h2>
                        </div>
                        <div class="w-full p-6">

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="select_categories"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar Categoria
                                    </label>
                                    <select id="select_categories"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>

                                    </select>
                                </div>
                                <div>
                                    <label for="select_type" class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar tipo
                                    </label>
                                    <select id="select_type"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="simple">Simple</option>
                                        <option value="grouped">Grouped</option>
                                        <option value="external">External</option>
                                        <option value="variable">Variable</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="select_status" class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar estado
                                    </label>
                                    <select id="select_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="website" class="block mb-2 text-sm font-medium text-gray-900">
                                        SKU
                                    </label>
                                    <input type="text" id="website"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Sku" required />
                                </div>
                                <div>
                                    <label for="product_ean" class="block mb-2 text-sm font-medium text-gray-900">
                                        EAN
                                    </label>
                                    <input type="text" id="product_ean"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Ean" />
                                </div>
                                <div>
                                    <label for="product_ean_13" class="block mb-2 text-sm font-medium text-gray-900">
                                        EAN-13
                                    </label>
                                    <input type="text" id="product_ean_13"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Ean13" />
                                </div>


                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <div>
                                    <label for="product_name" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nombre del producto
                                    </label>
                                    <input type="text" id="product_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el nombre del producto" />
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="short_description"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción corta
                                    </label>
                                    <textarea id="short_description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe una descripción corta"></textarea>

                                </div>
                                <div>
                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción
                                    </label>
                                    <textarea id="description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe la descripcion del producto"></textarea>

                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="regular_price" class="block mb-2 text-sm font-medium text-gray-900">
                                        PVR
                                    </label>
                                    <input type="number" id="regular_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="PVR" />
                                </div>
                                <div>
                                    <label for="sale_price" class="block mb-2 text-sm font-medium text-gray-900">
                                        Precio de venta
                                    </label>
                                    <input type="number" id="sale_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Precio sin confirmar" />
                                </div>
                                <div>
                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900">
                                        Precio que se va a mostrar
                                    </label>
                                    <input type="number" id="price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Precio Confirmado" />
                                </div>
                                <div>
                                    <label for="select_stock_status"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar estado del stock
                                    </label>
                                    <select id="select_stock_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="instock">Instock</option>
                                        <option value="outofstock">Outofstock</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="stock_quantity" class="block mb-2 text-sm font-medium text-gray-900">
                                        Stock actual
                                    </label>
                                    <input type="number" id="stock_quantity"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Stock" />
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                    onclick="fn_guardar_nuevo_producto()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="contenedor_formularios contenedor_crear_nueva_categoria w-full  p-4 mb-10"
            data-info="contenedor_crear_nueva_categoria" id="contenedor_crear_nueva_categoria" style="display: none">
            <div class="w-full mt-5 flex flex-row gap-2 ">
                <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_categoria">

                    <div class="w-[100%] h-[100%] border-2 border-gray-200 flex flex-col">
                        <div class="w-full h-[50px] border-b-2 border-gray-200 flex justify-center items-center">
                            <h2 class="text-2xl font-semibold">Rellena el formulario nueva categoria</h2>
                        </div>
                        <div class="w-full p-6">

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nombre de la categoria
                                    </label>
                                    <input type="text" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el nombre" />
                                </div>
                                <div>
                                    <label for="parent" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nivel (PARENT)
                                    </label>
                                    <input type="number" id="parent"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escibe el nivel de la categoria" />
                                </div>

                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="category_short_description"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción corta
                                    </label>
                                    <textarea id="category_short_description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe una descripción corta"></textarea>

                                </div>
                                <div>
                                    <label for="category_description" class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción
                                    </label>
                                    <textarea id="category_description" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe la descripcion de la categoria"></textarea>

                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                    onclick="fn_guardar_nueva_categoria()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="contenedor_formularios contenedor_crear_nuevo_cliente  w-full  p-4 mb-10"
            data-info="contenedor_crear_nuevo_cliente" id="contenedor_crear_nuevo_cliente" style="display:none ">

            <div class="w-full mt-5 flex flex-row gap-2 ">
                <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_cliente">

                    <div class="w-[100%] h-[100%] border-2 border-gray-200 flex flex-col">
                        <div class="w-full h-[50px] border-b-2 border-gray-200 flex justify-center items-center">
                            <h2 class="text-2xl font-semibold">Rellena el formulario del nuevo cliente</h2>
                        </div>
                        <div class="w-full p-6">

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nombre
                                    </label>
                                    <input type="text" id="firstName"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el nombre" />
                                </div>
                                <div>
                                    <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900">
                                        Apellidos
                                    </label>
                                    <input type="text" id="lastName"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe los apellidos" />
                                </div>
                                <div>
                                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">
                                        Teléfono
                                    </label>
                                    <input type="text" id="phone"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el teléfono" />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="customerType" class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar tipo
                                    </label>
                                    <select id="customerType"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="individual">Individual</option>
                                        <option value="business">Empresa</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">
                                        Email
                                    </label>
                                    <input type="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el email" />
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">
                                        Contraseña
                                    </label>
                                    <input type="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe la contraseña" />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="adress" class="block mb-2 text-sm font-medium text-gray-900">
                                        Dirección
                                    </label>
                                    <input type="text" id="adress"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe la direccion" />
                                </div>

                                <div>
                                    <label for="postalCode" class="block mb-2 text-sm font-medium text-gray-900">
                                        Código postal
                                    </label>
                                    <input type="text" id="postalCode"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el codigo postal" />
                                </div>

                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="city" class="block mb-2 text-sm font-medium text-gray-900">
                                        Ciudad
                                    </label>
                                    <input type="text" id="city"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe la cuidad" />
                                </div>

                                <div>
                                    <label for="state" class="block mb-2 text-sm font-medium text-gray-900">
                                        Municipio
                                    </label>
                                    <input type="text" id="state"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el municipio" />
                                </div>

                                <div>
                                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900">
                                        País
                                    </label>
                                    <input type="text" id="country"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el país" />
                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                    onclick="fn_guardar_nuevo_cliente()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="contenedor_formularios contenedor_generar_un_pedido w-full  p-4 mb-10"
            data-info="contenedor_generar_un_pedido" id="contenedor_generar_un_pedido" style="display: none">
        </div>

        <div class="p-4 min-h-[89vh] flex flex-col justify-start items-start" id="contenedor_dashboards_principal">








        </div>
    </div>

</x-app-layout>
