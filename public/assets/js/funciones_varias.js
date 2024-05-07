$(document).ready(function () {
    console.log("FUNCIONES VARIAS");

    $(".dropdown_accion").click(function () {
        const dropdownName = $(this).attr("data-dropdownname");
        $(`#${dropdownName}`).slideToggle(300);
    });

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

function fn_cerrar_menu() {
    $(`.dropdown_accion`).each(function () {
        const dropdownName = $(this).attr("data-dropdownname");
        $(`#${dropdownName}`).hide(300);
    });
}

function fn_copiar_codigo(elemento_id) {
    const elemento = document.getElementById(elemento_id);
    if (elemento) {
        const texto = elemento.innerText || elemento.textContent;
        navigator.clipboard
            .writeText(texto)
            .then(() => {
                Swal.fire({
                    html: `<h4><b>Copiado al portapapeles</b></h4>`,
                    icon: `success`,
                });
            })
            .catch((err) => {
                Swal.fire({
                    html: `<h4><b>No ha sido posible la copia</b></h4>`,
                    icon: `error`,
                });
            });
    }
}

function fn_scroll_to(elemento_id) {
    const elemento = document.getElementById(`${elemento_id}`);
    console.log("Click en ", elemento_id);
    if (elemento) {
        console.log("elemento para el scroll", elemento);
        window.scrollTo({
            top: elemento.offsetTop - 100,
            behavior: "smooth",
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

function fn_mostrar_formulario_crear_cliente(elemento_id) {
    $('.contenedor_formularios').each(function () {
        $(this).hide();
    })
    $(`#${elemento_id}`).show();
    fn_obtener_clientes(null, true);
}

function fn_obtener_categorias_para_el_formulario_producto() {
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
                selectHTML += `<option value="${categoria.id}">${categoria.name}</option>`;
            });
            $("#select_categories").html(selectHTML);
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener categorias:", error);
        },
    });
}

function mostrar_error(mensaje) {
    Swal.fire({
        html: `<h4><b>${mensaje}</b></h4>`,
        icon: `error`,
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

    // if (!validar_inputs) {
    //     Swal.fire({
    //         html: `<h4><b>Por favor, complete todos los campos.</b></h4>`,
    //         icon: `error`,
    //     });

    //     return false;
    // }

    // Crear un nuevo FormData

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
                                    <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_producto('${JSON.stringify(
                        item
                    )}')">Editar</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="12" style="display:none" id="td_colspan_form_edit_producto_${item.id}"></td>
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


function validar_inputs_cliente() {
    // Obtener los valores de los campos del formulario
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let phone = $("#phone").val();
    let customerType = $("#customerType").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let address = $("#address").val();
    let postalCode = $("#postalCode").val();
    let city = $("#city").val();
    let state = $("#state").val();
    let country = $("#country").val();

    // Realiza las validaciones
    if (firstName == '') {
        mostrar_error("El campo Nombre es requerido");
        return false;
    }

    if (lastName == '') {
        mostrar_error("El campo Apellidos es requerido");
        return false;
    }

    if (phone == '') {
        mostrar_error("El campo Teléfono es requerido");
        return false;
    }

    if (customerType == '' || customerType == null || customerType == 0 || customerType == 'Seleccionar') {
        mostrar_error("Selecciona el tipo de cliente");
        return false;
    }

    if (email == '') {
        mostrar_error("El campo Email es requerido");
        return false;
    }

    if (password == '') {
        mostrar_error("El campo Contraseña es requerido");
        return false;
    }

    if (address == '') {
        mostrar_error("El campo Dirección es requerido");
        return false;
    }

    if (postalCode == '') {
        mostrar_error("El campo Código Postal es requerido");
        return false;
    }

    if (city == '') {
        mostrar_error("El campo Ciudad es requerido");
        return false;
    }

    if (state == '') {
        mostrar_error("El campo Municipio es requerido");
        return false;
    }

    if (country == '') {
        mostrar_error("El campo País es requerido");
        return false;
    }

    return true;
}



function fn_guardar_nuevo_cliente() {
    // Obtener los valores de los campos del formulario
    let firstName = $("#firstName").val();
    let lastName = $("#lastName").val();
    let phone = $("#phone").val();
    let customerType = $("#customerType").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let address = $("#adress").val();
    let postalCode = $("#postalCode").val();
    let city = $("#city").val();
    let state = $("#state").val();
    let country = $("#country").val();



    // Crear objeto con los datos del nuevo cliente
    let nuevoCliente = {
        firstName: firstName,
        lastName: lastName,
        phone: phone,
        customerType: customerType,
        email: email,
        password: password,
        adress: address,
        postalCode: postalCode,
        city: city,
        state: state,
        country: country
    };

    // Realizar la solicitud AJAX para guardar el nuevo cliente
    $.ajax({
        url: "http://localhost:8000/api/v1/customers",
        method: "POST",
        data: nuevoCliente,
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Cliente creado con éxito:", response);
            let item = response.data;
            if (item.id && item.id > 0) {

                let CLIENTES_HTML = `
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
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_cliente('${JSON.stringify(
                            item
                        )}')">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_client_${item.id
                        }">
                                
                            </td>
                        </tr>
                    `;

                $(`#tbody_clientes`).prepend(CLIENTES_HTML);
                $(`#contenedor_crear_nuevo_cliente`).hide();
                Swal.fire({
                    html: `<h4><b>El cliente ha sido creado correctamente</b></h4>`,
                    icon: `success`,
                });
                $('#formulario_cliente')[0].reset();

            } else {
                Swal.fire({
                    html: `<h4><b>Error al crear el cliente</b></h4>`,
                    icon: `error`,
                });
            }
        },
        error: function (xhr, status, error) {
            console.error("Error al crear el cliente:", error);
            // Aquí puedes manejar el error según tu lógica de frontend
        },
    });
}



