$(document).ready(function () {
    console.log("CATEGORIAS");
});

function fn_obtener_categorias(page = null, crear = false) {

    if (crear == false) {
        $(`.contenedor_formularios`).hide();
    }
    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
    $(`#contenedor_dashboards_principal`).html(``);
    $(`#contenedor_dashboards_principal`).hide();
    $(`#tbody_categorias`).html(``);
    // Realizar la solicitud AJAX
    let url = "http://localhost:8000/api/v1/categories";
    if (page != null) {
        url = "http://localhost:8000/api/v1/categories?page=" + page;
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
            console.log("Categorias obtenidas con éxito:", response);

            let categorias = response.data;
            let HTML_TABLE = `
            <h4 class="w-full text-4xl font-bold flex justify-center items-center mb-4">
            <span class="w-full p-4 bg-[#374151] flex justify-center items-center rounded-lg text-white" style="background-color:#374151">
                CATEGORIAS
            </span>
        </h4>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Categoria
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Descripción corta
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Descripción larga
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Nivel (Parent)
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Productos asociados
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody_categorias">

                </tbody>
            </table>
            <div class="pagination_container mt-10 mb-10 flex justify-center items-center" id="pagination_container" style="margin-top:10px;margin-bottom:30px"></div>
        </div>
            
            `;
            $(`#contenedor_dashboards_principal`).html(HTML_TABLE);
            let CATEGORIAS_HTML = ``;
            if (categorias.length > 0) {
                categorias.forEach((item) => {
                    CATEGORIAS_HTML += `
                    <tr class="bg-white dark:bg-gray-800" id="tr_categoria_${item.id
                        }">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${item.name ?? ""}
                            </th>
                            <td class="px-6 py-4">
                            ${item.shortDescription ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.description ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.parent ?? ""} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.products?.length ?? 0} 
                            </td>           
                            <td class="px-6 py-4 text-right">                         
                                <button class="font-medium text-blue-600 hover:underline" onclick="fn_mostrar_form_editar_categoria(${item.id})" 
                                style="width:25px;height:25px;background-image:url('/assets/icons/edit_1.png');background-position:center;background-size:cover"></button>
                                <button class="font-medium text-red-600 hover:underline" 
                                style="width:25px;height:30px;background-image:url('/assets/icons/delete_1.png');background-position:center;background-size:cover"
                                onclick="fn_eliminar_categoria(${item.id})"></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_categoria_${item.id}">
                                <div class="contenedor_editar_categoria w-full  p-4 mb-10"
                                    data-info="contenedor_editar_categoria_${item.id}" id="contenedor_editar_categoria_${item.id}">      
                                </div>                                   
                            </td>
                        </tr>
                    `;
                });

                let links = null;
                if (response.meta && response.meta.links) {
                    links = response.meta.links;
                }
                let pagination_links = create_pagination_categorias_links(links);

                $("#pagination_container").html(pagination_links);
                $("#pagination_container").show();
            } else {
                CATEGORIAS_HTML = `
                <tr id="tr_info_categorias_lista_vacia">
                    <td colspan="12">
                        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="flex justify-center items-center font-medium">Lista vacia</span> 
                        </div>
                    </td>
                </tr>`;
            }

            $(`#tbody_categorias`).html(CATEGORIAS_HTML);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener categorias:", error);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
    });
}

function fn_mostrar_form_editar_categoria(data) {
    let item = JSON.parse(data);
    console.log(item);
}
function fn_guardar_nueva_categoria() {

    let name = $("#name").val();
    let parent = $("#parent").val();
    let shortDescription = $("#category_short_description").val();
    let description = $("#category_description").val();

    // Realizar validaciones
    if (name.trim() === '') {
        mostrar_error("El nombre de la categoría es requerido");
        return;
    }

    if (isNaN(parent)) {
        mostrar_error("El nivel de la categoría debe ser un número");
        return;
    }

    // Crear un nuevo objeto con los datos de la categoría
    let categoria = {
        name: name,
        parent: parent,
        shortDescription: shortDescription,
        description: description
    };

    // Realizar la solicitud AJAX para guardar la nueva categoría
    $.ajax({
        url: "http://localhost:8000/api/v1/categories",
        method: "POST",
        dataType: "json",
        data: categoria,
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Categoría creada con éxito:", response);
            let item = response.data;
            if (item.id && item.id > 0) {

                let CATEGORIAS_HTML = `
             <tr class="bg-white " id="tr_categoria_${item.id
                    }">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                     ${item.name ?? ""}
                     </th>
                     <td class="px-6 py-4">
                     ${item.shortDescription ?? ""}
                     </td>
                     <td class="px-6 py-4">
                     ${item.description ?? ""}
                     </td>
                     <td class="px-6 py-4">
                     ${item.parent ?? ""} 
                     </td>
                     <td class="px-6 py-4">
                     ${item.products?.length ?? 0} 
                     </td>           
                     <td class="px-6 py-4 text-right">                         
                        <button class="font-medium text-blue-600 hover:underline" onclick="fn_mostrar_form_editar_categoria(${item.id})" 
                        style="width:25px;height:25px;background-image:url('/assets/icons/edit_1.png');background-position:center;background-size:cover"></button>
                        <button class="font-medium text-red-600 hover:underline" 
                        style="width:25px;height:30px;background-image:url('/assets/icons/delete_1.png');background-position:center;background-size:cover"
                        onclick="fn_eliminar_categoria(${item.id})"></button>
                    </td>
                 </tr>
                 <tr>
                    <td colspan="12" style="display:none" id="td_colspan_form_edit_categoria_${item.id}">
                        <div class="contenedor_editar_categoria w-full  p-4 mb-10"
                            data-info="contenedor_editar_categoria_${item.id}" id="contenedor_editar_categoria_${item.id}">         
                        </div>                                   
                    </td>
                 </tr>
             `;

                $(`#tbody_categorias`).prepend(CATEGORIAS_HTML);
                $(`#contenedor_crear_nueva_categoria`).hide();
                Swal.fire({
                    html: `<h4><b>La categoria ha sido creado correctamente</b></h4>`,
                    icon: `success`,
                });
                $('#formulario_categoria')[0].reset();
                $(`#tr_info_categorias_lista_vacia`).hide();

            } else {
                Swal.fire({
                    html: `<h4><b>Error al crear la categoria</b></h4>`,
                    icon: `error`,
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al crear la categoría:", error);
            let errors = xhr.responseJSON.errors;
            let errorMessages = '';
            for (let field in errors) {
                errorMessages += `${errors[field].join('<br>')}<br>`;
            }
            Swal.fire({
                html: `<h4><b>Error al crear la categoria</b></h4><p>${errorMessages}</p>`,
                icon: `error`,
            });
        },
    });
}

function fn_mostrar_formulario_crear_categoria(elemento_id) {
    $('.contenedor_categorias').each(function () {
        $(this).hide();
    })
    $(`#${elemento_id}`).show();
    fn_obtener_categorias(null, true);
}
function create_pagination_categorias_links(links = null) {

    if (links == null) return false;
    let paginationHTML = `
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
    `;

    // Agrega el enlace "Anterior" si está disponible
    if (links.prev) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_categorias('${get_page_number(links.prev)}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                <button onclick="fn_obtener_categorias('${get_page_number(link.url)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${link.label}</button>
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
            <button onclick="fn_obtener_categorias('${get_page_number(links.next)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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

function fn_mostrar_form_editar_categoria(id) {

    $.ajax({
        url: `http://localhost:8000/api/v1/categories/${id}`,
        method: "GET",
        dataType: "json",
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Informacion de la categoria :", response);

        },
        error: function (xhr, status, error) {
            console.error("Error al obtener la categoria:", error);
        },
    });

}

function fn_mostrar_form_editar_categoria(id) {

    $(`#td_colspan_form_edit_categoria_${id}`).toggle(function () {
        if ($(this).is(':visible')) {
            let token = $("#tkn").val();
            // Realizar la solicitud AJAX
            let url = `http://localhost:8000/api/v1/categories/${id}`;
            console.log("url", url);
            $.ajax({
                url: url,
                method: "GET",
                dataType: "json",
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json",
                },
                success: function (response) {
                    //console.log("Informacion de la categoria:", response);
                    let categoria = response.data;
                    console.log('categoria:', categoria);
                    if (categoria.id != undefined && categoria.id === id) {

                        let HTML_FORM_EDIT = `
                        <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_editar_categoria_${categoria.id}">

                        <div class="w-[100%] h-[100%] border-2 border-gray-200 flex flex-col">
                            <div class="w-full h-[50px] border-b-2 border-gray-200 flex justify-center items-center">
                                <h2 class="text-2xl font-semibold">Editar categoria ${categoria.name}</h2>
                            </div>
                            <div class="w-full p-6">
    
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="name_${categoria.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                            Nombre de la categoria
                                        </label>
                                        <input type="text" id="name_${categoria.id}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Escribe el nombre" value="${categoria.name ?? ''}" />
                                    </div>
                                    <div>
                                        <label for="parent_${categoria.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                            Nivel (PARENT)
                                        </label>
                                        <input type="number" id="parent_${categoria.id}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Escibe el nivel de la categoria" value="${categoria.parent ?? ''}"/>
                                    </div>
    
                                </div>
    
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="category_short_description_${categoria.id}"
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Descripción corta
                                        </label>
                                        <textarea id="category_short_description_${categoria.id}" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Escribe una descripción corta">${categoria.shortDescription ?? ''}</textarea>
    
                                    </div>
                                    <div>
                                        <label for="category_description_${categoria.id}"
                                            class="block mb-2 text-sm font-medium text-gray-900">
                                            Descripción
                                        </label>
                                        <textarea id="category_description_${categoria.id}" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Escribe la descripcion de la categoria">${categoria.description ?? ''}</textarea>
    
                                    </div>
                                </div>
    
                                <div class="grid gap-6 mb-6 md:grid-cols-1">
                                    <button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                        onclick="fn_editar_categoria(${categoria.id})">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                      
                      `;

                        $(`#contenedor_editar_categoria_${categoria.id}`).html(HTML_FORM_EDIT);
                    } else {
                        mostrar_error("Error al generar el formulario editar categoria");
                        return;
                    }


                },
                error: function (xhr, status, error) {
                    console.error("Error al obtener categoria:", error);
                },
            });
        }
    })
}

function fn_editar_categoria(id) {

    // Obtener los valores de los campos del formulario
    let name = $(`#name_${id}`).val();
    let parent = $(`#parent_${id}`).val();
    let category_short_description = $(`#category_short_description_${id}`).val();
    let category_description = $(`#category_description_${id}`).val();

    // Crear objeto con los datos del nuevo cliente
    let infoCategoria = {
        name: name,
        parent: parent,
        shortDescription: category_short_description,
        description: category_description,
    };

    console.log('infoCategoria',infoCategoria);
   // return;

    // Realizar la solicitud AJAX para guardar el nuevo cliente
    $.ajax({
        url: `http://localhost:8000/api/v1/categories/${id}`,
        method: "PATCH",
        data: infoCategoria,
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Categoria editada con éxito:", response);
            let item = response.data;
            if (item.id && item.id > 0) {
                Swal.fire({
                    html: `<h4><b>Categoria actualizada correctamente</b></h4>`,
                    icon: `success`,
                });
            } else {
                Swal.fire({
                    html: `<h4><b>Error al actualizar datos de la categoria</b></h4>`,
                    icon: `error`,
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al editar la categoria:", error);
            let errors = xhr.responseJSON.errors;
            let errorMessages = '';
            for (let field in errors) {
                errorMessages += `${errors[field].join('<br>')}<br>`;
            }
            Swal.fire({
                html: `<h4><b>Error al actualizar la categoria</b></h4><p>${errorMessages}</p>`,
                icon: `error`,
            });
        },
    });
}


function fn_eliminar_categoria(id) {

    Swal.fire({
        html: "<h4><strong>¿ Quieres eliminar ?<strong></h4>",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
        icon:'question'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `http://localhost:8000/api/v1/categories/${id}`,
                method: "DELETE",
                headers: {
                    Authorization: "Bearer " + $("#tkn").val(),
                    Accept: "application/json",
                },
                success: function (response) {
                    console.log("Categoria eliminado con éxito:", response);
                    if (response) {
                        Swal.fire({
                            html: `<h4><b>Categoria eliminado correctamente</b></h4>`,
                            icon: `success`,
                        });
                        $(`#tr_categoria_${id}`).hide();
                        $(`#td_colspan_form_edit_categoria_${id}`).html(``);
                    } else {
                        Swal.fire({
                            html: `<h4><b>Error al eliminar la Categoria</b></h4>`,
                            icon: `error`,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al eliminar la Categoria:", error);
                },
            });
        }
    });

}
