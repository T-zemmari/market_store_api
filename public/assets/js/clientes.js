$(document).ready(function () {
    console.log("CLIENTES");
    fn_obtener_clientes();
});

function fn_obtener_clientes(page=null) {
    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
    $(`#contenedor_dashboards_principal`).html(``);
    $(`#contenedor_dashboards_principal`).hide();
    $(`#tbody_clientes`).html(``);
    // Realizar la solicitud AJAX
    let url="http://localhost:8000/api/v1/customers";
    if(page!=null){
        url="http://localhost:8000/api/v1/customers?page="+page;
    }
    console.log('url',url);
    $.ajax({
        url:url,
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
            let HTML_TABLE=`
            <h4 class="w-full text-4xl font-bold flex justify-center items-center mb-4">
            <span class="w-full p-4 bg-[#374151] flex justify-center items-center rounded-lg text-white">
                CLIENTES
            </span>
        </h4>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Cliente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Email
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Teléfono
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Dirección
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody_clientes">

                </tbody>
            </table>
            <div class="pagination_container mt-10 mb-10 flex justify-center items-center" id="pagination_container"></div>
        </div>
            
            `;
            $(`#contenedor_dashboards_principal`).html(HTML_TABLE);
            let CLIENTES_HTML = ``;
            if (customers.length > 0) {
                customers.forEach((item) => {
                    CLIENTES_HTML += `
                    <tr class="bg-white dark:bg-gray-800" id="tr_cliente_${
                        item.id
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
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_cliente('${JSON.stringify(
                                    item
                                )}')">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_client_${
                                item.id
                            }">
                                
                            </td>
                        </tr>
                    `;
                });

                let pagination_links = crear_paginacion_clientes_links(response.meta.links);
                $("#pagination_container").html(pagination_links);
                $("#pagination_container").show();
            } else {
                CLIENTES_HTML = `
                <tr>
                    <td>
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Lista vacia</span> 
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

function fn_mostrar_form_editar_cliente(data) {
    let item = JSON.parse(data);
    console.log(item);

    // Crear el HTML del formulario de edición
    // let formHTML = `
    //     <div class="w-full h-[500px] border-2 rounded-lg">
    //         <!-- Aquí va tu formulario de edición -->
    //         <p>ID: ${item.id}</p>
    //         <p>Nombre: ${item.first_name} ${item.last_name}</p>
    //         <p>Email: ${item.email}</p>
    //         <!-- Agrega más campos según sea necesario -->
    //     </div>
    // `;

    // // Insertar el formulario en el elemento correspondiente
    // $(`#td_colspan_form_edit_client_${item.id}`).html(formHTML);

    // // Mostrar u ocultar el formulario según su estado actual
    // $(`#td_colspan_form_edit_client_${item.id}`).toggle();
}

function crear_paginacion_clientes_links(links) {
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