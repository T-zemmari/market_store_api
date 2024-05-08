$(document).ready(function () {
    console.log("CLIENTES");
    fn_obtener_clientes();
});

function fn_obtener_clientes(page = null,crear=false) {

    if (crear == false) {
        $(`#contenedor_crear_nuevo_cliente`).hide();
    }
    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
    $(`#contenedor_dashboards_principal`).html(``);
    $(`#contenedor_dashboards_principal`).hide();
    $(`#contenedor_dashboards_principal`).hide();
    $(`#tbody_clientes`).html(``);
    // Realizar la solicitud AJAX
    let url = "http://localhost:8000/api/v1/customers";
    if (page != null) {
        url = "http://localhost:8000/api/v1/customers?page=" + page;
    }
    console.log('url', url);
    $.ajax({
        url: url,
        method: "GET",
        dataType: "json",
        headers: {
            //Authorization: "Bearer " + "2|WmaWfDHkJkmLOcz9iE7CZgyKqnjSN6nGmAqF5t0E31900290",
            Authorization: "Bearer " + token,
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Clientes obtenidos con éxito:", response);

            let customers = response.data;
            let HTML_TABLE = `
            <h4 class="w-full text-4xl font-bold flex justify-center items-center mb-4 bg-[#374151]">
            <span class="w-full p-4 flex justify-center items-center rounded-lg text-white" style="background-color:#374151">
                CLIENTES
            </span>
        </h4>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-[#374151]" style="background-color:#374151;color:white">
                            Cliente
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Email
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Teléfono
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Dirección
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody_clientes">

                </tbody>
            </table>
            <div class="pagination_container mt-10 mb-10 flex justify-center items-center" id="pagination_container" style="margin-top:10px;margin-bottom:30px"></div>
        </div>
            
            `;
            $(`#contenedor_dashboards_principal`).html(HTML_TABLE);
            let CLIENTES_HTML = ``;
            if (customers.length > 0) {
                customers.forEach((item) => {
                    CLIENTES_HTML += `
                    <tr class="bg-white dark:bg-gray-800" id="tr_cliente_${item.id
                        }">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${item.first_name ?? ""} ${item.last_name ?? ""}
                            </th>
                            <td class="px-6 py-4">
                            ${item.email ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.phone ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.adress ?? ""} 
                            ${item.postal_code ?? ""} 
                            ${item.state ?? ""}
                            ${item.country ?? ""}
                            </td>
                            
                            <td class="px-6 py-4 text-right">                         
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_cliente(${item.id})">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_client_${item.id}">
                                
                            </td>
                        </tr>
                    `;
                });

                let links = null;
                if (response.meta && response.meta.links) {
                    links = response.meta.links;
                }
                let pagination_links = crear_paginacion_clientes_links(links);

                $("#pagination_container").html(pagination_links);
                $("#pagination_container").show();
            } else {
                CLIENTES_HTML = `
                <tr>
                    <td colspan="12">
                        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="flex justify-center items-center font-medium">Lista vacia</span> 
                        </div>
                    </td>
                </tr>`;
            }

            $(`#tbody_clientes`).html(CLIENTES_HTML);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener clientes:", error);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
    });
}



function crear_paginacion_clientes_links(links = null) {

    if (links == null) return false;

    let paginationHTML = `
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
    `;

    // Agrega el enlace "Anterior" si está disponible
    if (links.prev) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_clientes('${get_page_number(links.prev)}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Anterior</span>
                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </button>
        </li>
        `;
    }

    // Agrega los enlaces de páginas individuales
    links.forEach((link) => {
        if (link.url) {
            paginationHTML += `
            <li>
                <button onclick="fn_obtener_clientes('${get_page_number(link.url)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${link.label}</button>
            </li>
            `;
        } else {
            paginationHTML += `
            <li>
                <button aria-current="page" class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">${link.label}</button>
            </li>
            `;
        }
    });

    // Agrega el enlace "Siguiente" si está disponible
    if (links.next) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_clientes('${get_page_number(links.next)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Siguiente</span>
                <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </button>
        </li>
        `;
    }

    paginationHTML += `
        </ul>
    </nav>
    `;

    return paginationHTML;
}

function get_page_number(url) {
    const page = url.split('page=')[1];
    return page;
}

function fn_mostrar_form_editar_cliente(id) {

    $.ajax({
        url: `http://localhost:8000/api/v1/customers/${id}`,
        method: "GET",
        dataType: "json",
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Informacion del cliente :", response);

            let data = response.data;
            let HTML_FORM_EDIT = `
    <div class="w-full mt-5 flex flex-row gap-2 ">
                <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_editar_producto_${data.id}">
                    <div class="w-[40%]  border-2 border-gray-200 flex flex-col  items-center">
                        <div class="conenedor_producto_img_prev w-[60%] h-[60%] border-2 border-gray-200 mt-5 flex justify-center items-center"
                            id="conenedor_producto_img_prev_${data.id}"></div>
                        <div class="conenedor_producto_resto_img_prev w-[100%] min-h-[1%] border-t-2 border-gray-200 mt-5 flex flex-row justify-center items-center gap-2"
                            id="conenedor_producto_resto_img_prev_${data.id}">
                        </div>
                        <div class="w-full p-8 grid gap-6 mb-6 md:grid-cols-1 border-t-2 border-gray-200">
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900"
                                    for="principal_image">Añadir imagen principal</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                    id="principal_image_${data.id}" name="principal_image" type="file"
                                    accept=".png, .jpg, .jpeg, .webp">
                            </div>
                            <div class="w-full">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Añadir
                                    resto de imagenes</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                    id="images_${data.id}" name="images[]" type="file" multiple
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
                                    <label for="select_categories_${data.id}"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar Categoria
                                    </label>
                                    <select id="select_categories_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>

                                    </select>
                                </div>
                                <div>
                                    <label for="select_type_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar tipo
                                    </label>
                                    <select id="select_type_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="simple">Simple</option>
                                        <option value="grouped">Grouped</option>
                                        <option value="external">External</option>
                                        <option value="variable">Variable</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="select_status_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Seleccionar estado
                                    </label>
                                    <select id="select_status_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="publish">Publish</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending</option>
                                        <option value="private">Private</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="sku_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        SKU
                                    </label>
                                    <input type="text" id="sku_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Sku" required />
                                </div>
                                <div>
                                    <label for="product_ean_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        EAN
                                    </label>
                                    <input type="text" id="product_ean_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Ean" />
                                </div>
                                <div>
                                    <label for="product_ean_13_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        EAN-13
                                    </label>
                                    <input type="text" id="product_ean_13_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Ean13" />
                                </div>


                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-1">
                                <div>
                                    <label for="product_name_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Nombre del producto
                                    </label>
                                    <input type="text" id="product_name_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Escribe el nombre del producto" />
                                </div>
                            </div>
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="short_description_${data.id}"
                                        class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción corta
                                    </label>
                                    <textarea id="short_description_${data.id}" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe una descripción corta"></textarea>

                                </div>
                                <div>
                                    <label for="description_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Descripción
                                    </label>
                                    <textarea id="description_${data.id}" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Escribe la descripcion del producto"></textarea>

                                </div>
                            </div>

                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                                <div>
                                    <label for="regular_price_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        PVR
                                    </label>
                                    <input type="number" id="regular_price_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="PVR" />
                                </div>
                                <div>
                                    <label for="sale_price_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Precio de venta
                                    </label>
                                    <input type="number" id="sale_price_${data.id}"
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
                                    onclick="fn_editar_producto()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    `;

        },
        error: function (xhr, status, error) {
            console.error("Error al obtener el cliente:", error);
        },
    });

}