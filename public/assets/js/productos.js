$(document).ready(function () {
    console.log("PRODUCTOS");

    $(`#principal_image`).change(function () {
        console.log($(this)[0].files[0])
        if ($(this)[0].files && $(this)[0].files[0]) {
            let file = $(this)[0].files[0];

            let reader = new FileReader();
            reader.onload = () => {
                let imageData = reader.result;
                let imgElement = document.createElement('img');
                imgElement.src = imageData;
                imgElement.style.maxHeight = '100%';
                $(`#conenedor_producto_img_prev`).append(imgElement);

            }
            reader.readAsDataURL(file);
        }
    })

    $(`#images`).change(function () {
        $(`#conenedor_producto_resto_img_prev`).css({ 'height': '1%' });
        $(`#conenedor_producto_resto_img_prev`).html(``);
        if ($(this)[0].files && $(this)[0].files.length > 0) {
            if ($(this)[0].files.length > 5) {
                Swal.fire({
                    html: `<h4><b>Maximo 5 imagenes por producto</b></h4>`,
                    icon: `error`,
                });
                $(this).val('');
                return false;
            }

            Array.from($(this)[0].files).forEach(file => {
                let reader = new FileReader();
                reader.onload = () => {
                    let imgData = document.createElement('img');
                    imgData.src = reader.result;
                    imgData.style.Width = '80px';
                    imgData.style.height = '80px';
                    $(`#conenedor_producto_resto_img_prev`).append(imgData);
                    $(`#conenedor_producto_resto_img_prev`).css({ 'height': '40%' });
                };
                reader.readAsDataURL(file);
            });
        }
    });
});

function fn_obtener_productos(page = null, crear = false) {

    if (crear == false) {
        $(`.contenedor_formularios`).hide();
    }

    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
    $(`#contenedor_dashboards_principal`).html(``);
    $(`#contenedor_dashboards_principal`).hide();
    $(`#tbody_productos`).html(``);
    // Realizar la solicitud AJAX
    let url = "http://localhost:8000/api/v1/products";
    if (page != null) {
        url = "http://localhost:8000/api/v1/products?page=" + page;
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
            console.log("Productos obtenidos con éxito:", response);

            let productos = response.data;
            let HTML_TABLE = `
            <h4 class="w-full text-4xl font-bold flex justify-center items-center mb-4">
            <span class="w-full p-4 bg-[#374151] flex justify-center items-center rounded-lg text-white" style="background-color:#374151;color:white">
                PRODUCTOS
            </span>
        </h4>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            Producto
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Sku
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                ID Categoria
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
                                Precio de venta
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Stock actual
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody_productos">

                </tbody>
            </table>
            <div class="pagination_container mt-10 mb-10 flex justify-center items-center" id="pagination_container" style="margin-top:10px;margin-bottom:30px"></div>
        </div>
            
            `;
            $(`#contenedor_dashboards_principal`).html(HTML_TABLE);
            let PRODUCTOS_HTML = ``;
            if (productos.length > 0) {
                productos.forEach((item) => {
                    PRODUCTOS_HTML += `
                    <tr class="bg-white dark:bg-gray-800" id="tr_producto_${item.id}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            ${item.name ?? ""}
                            </th>
                            <td class="px-6 py-4">
                            ${item.sku ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.category_id ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.short_description ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.description ?? ""} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.sale_price} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.stock_quantity} 
                            </td>            
                            <td class="px-6 py-4 text-right">                         
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_producto('${item.id}')">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_producto_${item.id}">
                                <div class="contenedor_editar_producto w-full  p-4 mb-10"
                                    data-info="contenedor_editar_producto_${item.id}" id="contenedor_editar_producto_${item.id}">
                                
                                </div>                                   
                            </td>
                        </tr>
                    `;
                });


                let links = null;
                if (response.meta && response.meta.links) {
                    links = response.meta.links;
                }
                let pagination_links = crear_paginacion_productos_links(links);
                $("#pagination_container").html(pagination_links);
                $("#pagination_container").show();
            } else {
                PRODUCTOS_HTML = `
                <tr id="tr_info_productos_lista_vacia">
                    <td colspan="12">
                        <div class="w-full p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="flex justify-center items-center font-medium">Lista vacia</span> 
                        </div>
                    </td>
                </tr>`;
            }

            $(`#tbody_productos`).html(PRODUCTOS_HTML);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener productos:", error);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
    });
}
function get_page_number(url) {
    const page = url.split('page=')[1];
    return page;
}

function crear_paginacion_productos_links(links = null) {
    if (links == null) return false;
    let paginationHTML = `
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
    `;

    // Agrega el enlace "Anterior" si está disponible
    if (links.prev) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_productos('${get_page_number(links.prev)}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                <button onclick="fn_obtener_productos('${get_page_number(link.url)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${link.label}</button>
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
            <button onclick="fn_obtener_productos('${get_page_number(links.next)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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

function fn_obtener_categorias_para_el_formulario_producto(id = null, categoria_id = null) {
    let token = $("#tkn").val();
    // Realizar la solicitud AJAX
    let url = "http://localhost:8000/api/v1/categories";
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
            console.log("Categorias obtenidas con éxito:", response);
            let categorias = response.data;
            let selectHTML = `<option value="0">Seleccionar</option>`;


            categorias.forEach(function (categoria) {
                //console.log('categoria_id', categoria_id);
                selectHTML += `<option value="${categoria.id}" ${categoria_id == categoria.id ? 'selected' : ''}>${categoria.name}</option>`;
            });
            if (id == null) {
                $("#select_categories").html(selectHTML);
            } else {
                $(`#select_categories_${id}`).html(selectHTML);
            }

        },
        error: function (xhr, status, error) {
            console.error("Error al obtener categorias:", error);
        },
    });
}

function validar_inputs_producto() {
    // Obtener los valores de los campos del formulario
    let category_id = $("#select_categories").val();
    let type = $("#select_type").val();
    let status = $("#select_status").val();
    let sku = $("#website").val();
    let ean = $("#product_ean").val();
    let ean_13 = $("#product_ean_13").val();
    let name = $("#product_name").val();
    let short_description = $("#short_description").val();
    let description = $("#description").val();
    let regular_price = $("#regular_price").val();
    let sale_price = $("#sale_price").val();
    let price = $("#price").val();
    let stock_status = $("#select_stock_status").val();
    let stock_quantity = $("#stock_quantity").val();


    if (category_id == '' || category_id == null || category_id == 0) {
        Swal.fire({
            html: `<h4><b>Selecciona una catogoria</b></h4>`,
            icon: `error`,
        });
        return false;
    }

    if (type == '' || type == null || type == 0 || type == 'Seleccionar') {
        Swal.fire({
            html: `<h4><b>Selecciona el tipo</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (status == '' || status == null || status == 0 || type == 'Seleccionar') {
        Swal.fire({
            html: `<h4><b>Selecciona el estado</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (sku == '') {
        Swal.fire({
            html: `<h4><b>El campo sku es requerido</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (name == '') {
        Swal.fire({
            html: `<h4><b>El campo nombre es requerido</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (regular_price == '') {
        Swal.fire({
            html: `<h4><b>El campo PVR es requerido</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (sale_price == '') {
        Swal.fire({
            html: `<h4><b>El campo precio de venta es requerido</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (price == '') {
        Swal.fire({
            html: `<h4><b>El campo Precio que se va a mostrar es requerido</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (stock_status == '' || stock_status == null || stock_status == 0) {
        Swal.fire({
            html: `<h4><b>Selecciona si esta fuera de stock</b></h4>`,
            icon: `error`,
        });
        return false;
    }
    if (stock_quantity == '') {
        Swal.fire({
            html: `<h4><b>Rellena el stock inicial</b></h4>`,
            icon: `error`,
        });
        return false;
    }

    return true;
}

function fn_guardar_nuevo_producto() {
    // Obtener los valores de los campos del formulario
    let category_id = $("#select_categories").val();
    let type = $("#select_type").val();
    let status = $("#select_status").val();
    let sku = $("#website").val();
    let ean = $("#product_ean").val();
    let ean_13 = $("#product_ean_13").val();
    let name = $("#product_name").val();
    let short_description = $("#short_description").val();
    let description = $("#description").val();
    let regular_price = $("#regular_price").val();
    let sale_price = $("#sale_price").val();
    let price = $("#price").val();
    let stock_status = $("#select_stock_status").val();
    let stock_quantity = $("#stock_quantity").val();

    // Verificar si se adjuntaro  la imágen principal
    let principal_img = document.getElementById("principal_image").files;
    if (principal_img.length === 0) {
        Swal.fire({
            html: `<h4><b>Por favor, adjunta la imagen principal.</b></h4>`,
            icon: `error`,
        });
        return;
    }

    // Verificar si se adjuntaron imágenes
    let images = document.getElementById("images").files;
    if (images.length === 0) {
        Swal.fire({
            html: `<h4><b>Por favor, adjunta al menos una imagen.</b></h4>`,
            icon: `error`,
        });
        return;
    }

    if (images.length > 5) {
        Swal.fire({
            html: `<h4><b>Solo se permiten 5 imagenes por producto</b></h4>`,
            icon: `error`,
        });
        return;
    }

    if (validar_inputs_producto()) {

        let formData = new FormData();

        // Agregar los valores de los campos al FormData
        formData.append("category_id", category_id);
        formData.append("name", name);
        formData.append("sku", sku);
        formData.append("ean", ean);
        formData.append("ean_13", ean_13);
        formData.append("type", type);
        formData.append("status", status);
        formData.append("catalog_visibility", "visible");

        formData.append("short_description", short_description);
        formData.append("description", description);

        formData.append("regular_price", regular_price);
        formData.append("sale_price", sale_price);
        formData.append("price", price);

        formData.append("valid", 1);
        formData.append("on_sale", 0);

        formData.append("stock_status", stock_status);
        formData.append("stock_quantity", stock_quantity);

        formData.append("weight", "");
        formData.append("dimensions", "");
        formData.append("variation", 0);
        formData.append("featured", 0);
        formData.append("discontinued", 0);

        formData.append("principal_image", principal_img[0]);

        // Agregar las imágenes al FormData
        for (let i = 0; i < images.length; i++) {
            formData.append("images[]", images[i]);
        }

        // Realizar la solicitud AJAX
        $.ajax({
            url: "http://localhost:8000/api/v1/products",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                Authorization: "Bearer " + $("#tkn").val(),
                Accept: "application/json",
            },
            success: function (response) {
                console.log("Producto creado con éxito:", response);
                let item = response.data;
                if (item.id && item.id > 0) {

                    PRODUCTOS_HTML = `
                        <tr class="bg-white " id="tr_producto_${item.id}">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowra">
                                ${item.name ?? ""}
                                </th>
                                <td class="px-6 py-4">
                                ${item.sku ?? ""}
                                </td>
                                <td class="px-6 py-4">
                                ${item.category_id ?? ""}
                                </td>
                                <td class="px-6 py-4">
                                ${item.short_description ?? ""}
                                </td>
                                <td class="px-6 py-4">
                                ${item.description ?? ""} 
                                </td>
                                <td class="px-6 py-4">
                                ${item.sale_price} 
                                </td>
                                <td class="px-6 py-4">
                                ${item.stock_quantity} 
                                </td>            
                                <td class="px-6 py-4 text-right">                         
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_producto('${item.id}')">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_producto_${item.id}">
                                <div class="contenedor_editar_producto w-full  p-4 mb-10"
                                    data-info="contenedor_editar_producto_${item.id}" id="contenedor_editar_producto_${item.id}">
                                
                                </div>                                   
                            </td>
                        </tr>
                        `;

                    $(`#tbody_productos`).prepend(PRODUCTOS_HTML);
                    $(`#contenedor_crear_nuevo_producto`).hide();
                    Swal.fire({
                        html: `<h4><b>El producto ha sido creado correctamente</b></h4>`,
                        icon: `success`,
                    });
                    $('#formulario_producto')[0].reset();
                    $(`#conenedor_producto_img_prev`).html(``);
                    $(`#conenedor_producto_resto_img_prev`).html(``);
                    $(`#tr_info_productos_lista_vacia`).hide();

                } else {
                    Swal.fire({
                        html: `<h4><b>Error al crear el producto</b></h4>`,
                        icon: `error`,
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al crear el producto:", error);
                // Aquí puedes manejar el error según tu lógica de frontend
            },
        });
    }
}

function fn_mostrar_formulario_crear_producto(elemento_id) {
    $('.contenedor_formularios').each(function () {
        $(this).hide();
    })
    $(`#${elemento_id}`).show();
    fn_obtener_productos(null, true);
    fn_obtener_categorias_para_el_formulario_producto();
}

function fn_mostrar_form_editar_producto(id) {

    $(`#td_colspan_form_edit_producto_${id}`).toggle(function () {
        if ($(this).is(':visible')) {
            $.ajax({
                url: `http://localhost:8000/api/v1/products/${id}`,
                method: "GET",
                dataType: "json",
                headers: {
                    Authorization: "Bearer " + $("#tkn").val(),
                    Accept: "application/json",
                },
                success: function (response) {
                    console.log("Informacion del producto :", response);



                    let data = response.data;
                    if (data.id != undefined && data.id != null && data.id != '' && !isNaN(data.id)) {

                        fn_obtener_categorias_para_el_formulario_producto(data.id, data.category_id);

                        let HTML_IMG_PRINCIPAL = ``;

                        if (data.image != '') {
                            HTML_IMG_PRINCIPAL = `
                            <img style="max-height:100%" src="${data.image}"/>
                            `;
                        }
                        let HTML_RESTO_IMG = ``;
                        if (data.images.length > 0) {
                            data.images.forEach(image => {
                                HTML_RESTO_IMG += `
                                <img style="width:80px;height:80px" src="${image.url_image}"/>
                                `;
                            })
                        }

                        let HTML_FORM_EDIT = `
                <div class="w-full mt-5 flex flex-row gap-2 ">
                            <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_editar_producto_${data.id}">
                                <div class="w-[40%]  border-2 border-gray-200 flex flex-col  items-center">
                                    <div class="conenedor_producto_img_prev w-[60%] h-[60%] border-2 border-gray-200 mt-5 flex justify-center items-center"
                                        id="conenedor_producto_img_prev_${data.id}">
                                            ${HTML_IMG_PRINCIPAL}
                                        </div>
                                    <div class="conenedor_producto_resto_img_prev w-[100%] min-h-[1%] border-t-2 border-gray-200 mt-5 flex flex-row justify-center items-center gap-2"
                                        id="conenedor_producto_resto_img_prev_${data.id}">
                                        ${HTML_RESTO_IMG}
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
                                        <h2 class="text-2xl font-semibold">Rellena el formulario del producto (SKU:${data.sku})</h2>
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
                                                    <option>Seleccionar</option>
                                                    <option value="simple" ${data.type == 'simple' ? 'selected' : ''}>Simple</option>
                                                    <option value="grouped" ${data.type == 'grouped' ? 'selected' : ''}>Grouped</option>
                                                    <option value="external" ${data.type == 'external' ? 'selected' : ''}>External</option>
                                                    <option value="variable" ${data.type == 'variable' ? 'selected' : ''}>Variable</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="select_status_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Seleccionar estado
                                                </label>
                                                <select id="select_status_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                    <option>Seleccionar</option>
                                                    <option value="publish" ${data.status == 'publish' ? 'selected' : ''}>Publish</option>
                                                    <option value="draft" ${data.status == 'draft' ? 'selected' : ''}>Draft</option>
                                                    <option value="pending" ${data.status == 'pending' ? 'selected' : ''}>Pending</option>
                                                    <option value="private" ${data.status == 'private' ? 'selected' : ''}>Private</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="sku_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    SKU
                                                </label>
                                                <input type="text" id="sku_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Sku" required value="${data.sku}"/>
                                            </div>
                                            <div>
                                                <label for="product_ean_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    EAN
                                                </label>
                                                <input type="text" id="product_ean_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Ean" value="${data.ean ?? ''}"/>
                                            </div>
                                            <div>
                                                <label for="product_ean_13_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    EAN-13
                                                </label>
                                                <input type="text" id="product_ean_13_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Ean13" value="${data.ean13 ?? ''}"/>
                                            </div>
            
            
                                        </div>
                                        <div class="grid gap-6 mb-6 md:grid-cols-1">
                                            <div>
                                                <label for="product_name_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Nombre del producto
                                                </label>
                                                <input type="text" id="product_name_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Escribe el nombre del producto" value="${data.name ?? ''}"/>
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
                                                    placeholder="Escribe una descripción corta">${data.short_description ?? ''}</textarea>
            
                                            </div>
                                            <div>
                                                <label for="description_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Descripción
                                                </label>
                                                <textarea id="description_${data.id}" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="Escribe la descripcion del producto">${data.description ?? ''}</textarea>
            
                                            </div>
                                        </div>
            
                                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                                            <div>
                                                <label for="regular_price_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    PVR
                                                </label>
                                                <input type="number" id="regular_price_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="PVR" value="${data.regular_price ?? ''}"/>
                                            </div>
                                            <div>
                                                <label for="sale_price_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Precio de venta
                                                </label>
                                                <input type="number" id="sale_price_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Precio sin confirmar" value="${data.sale_price ?? ''}"/>
                                            </div>
                                            <div>
                                                <label for="price_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Precio que se va a mostrar
                                                </label>
                                                <input type="number" id="price_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Precio Confirmado" value="${data.price ?? ''}"/>
                                            </div>
                                            <div>
                                                <label for="select_stock_status_${data.id}"
                                                    class="block mb-2 text-sm font-medium text-gray-900">
                                                    Seleccionar estado del stock
                                                </label>
                                                <select id="select_stock_status_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                    <option selected>Seleccionar</option>
                                                    <option value="instock" ${data.stock_status == 'instock' ? 'selected' : ''}>Instock</option>
                                                    <option value="outofstock" ${data.stock_status == 'outofstock' ? 'selected' : ''}>Outofstock</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="stock_quantity_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                                    Stock actual
                                                </label>
                                                <input type="number" id="stock_quantity_${data.id}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                    placeholder="Stock" value="${data.stock_quantity ?? ''}"/>
                                            </div>
                                        </div>
                                        <div class="grid gap-6 mb-6 md:grid-cols-1">
                                            <button type="button"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                                onclick="fn_editar_producto(${data.id})">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                `;

                        $(`#contenedor_editar_producto_${data.id}`).html(HTML_FORM_EDIT);

                        setTimeout(() => {
                            fn_obtener_categorias_para_el_formulario_producto(data.id, data.category_id);
                        }, 500);


                    } else {
                        mostrar_error("Error al generar el formulario editar producto");
                        return;
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al obtener el producto:", error);
                },
            });
        }
    });

}


