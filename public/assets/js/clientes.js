$(document).ready(function () {
    console.log("CLIENTES");
    fn_obtener_customers();
});

function fn_obtener_customers(page=null) {
    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
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
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_show_form_edit_client('${JSON.stringify(
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

                let pagination_links = create_pagination_links(response.meta.links);
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

function fn_show_form_edit_client(data) {
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

function create_pagination_links(links) {
    let paginationHTML = `
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
    `;

    // Agrega el enlace "Anterior" si está disponible
    if (links.prev) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_customers('${getPageNumber(links.prev)}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Previous</span>
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
                <button onclick="fn_obtener_customers('${getPageNumber(link.url)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${link.label}</button>
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
            <button onclick="fn_obtener_customers('${getPageNumber(links.next)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only">Next</span>
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

function getPageNumber(url) {
    const page = url.split('page=')[1];
    return page;
}