$(document).ready(function () {
    console.log("PEDIDOS");

    $('.agregar-al-carrito').click(function () {
        let id = $(this).data('id');
        agregar_al_carrito(id);
    });
});

function fn_obtener_pedidos(page = null, crear = false) {

    if (crear == false) {
        $(`.contenedor_formularios`).hide();
    }

    let token = $(`#tkn`).val();
    console.log("mi_token", token);
    $(`#contenedor_spinner`).show();
    $(`#contenedor_dashboards_principal`).html(``);
    $(`#contenedor_dashboards_principal`).hide();
    $(`#tbody_pedidos`).html(``);
    // Realizar la solicitud AJAX
    let url = "http://localhost:8000/api/v1/orders";
    if (page != null) {
        url = "http://localhost:8000/api/v1/orders?page=" + page;
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
            console.log("Pedidos obtenidos con éxito:", response);

            let pedidos = response.data;
            let HTML_TABLE = `
            <h4 class="w-full text-4xl font-bold flex justify-center items-center mb-4">
            <span class="w-full p-4 bg-[#374151] flex justify-center items-center rounded-lg text-white" style="background-color:#374151;color:white">
                PEDIDOS
            </span>
        </h4>

        <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Pedido ID
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Cliente ID
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Estado
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Fecha pedido
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Fecha pagado
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Descuento
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Subtotal
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Iva
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Total
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <div class="flex items-center">
                                Metodo pago
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3" style="background-color:#374151;color:white">
                            <span class="sr-only">Acciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody_pedidos">

                </tbody>
            </table>
            <div class="pagination_container mt-10 mb-10 flex justify-center items-center" id="pagination_container" style="margin-top:10px;margin-bottom:30px"></div>
        </div>
            
            `;
            $(`#contenedor_dashboards_principal`).html(HTML_TABLE);
            let PEDIDOS_HTML = ``;
            if (pedidos.length > 0) {
                pedidos.forEach((item) => {
                    PEDIDOS_HTML += `
                    <tr class="bg-white dark:bg-gray-800" id="tr_pedido_${item.id}">
                            <th scope="row" class="px-6 py-4">
                            ${item.id ?? ""}
                            </th>
                            <td class="px-6 py-4">
                            ${item.customer_id ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.status ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.created_at ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.date_paid ?? ""} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.discount_total ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.shipping_total ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.total_tax ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.shipping_total_with_tax ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.payment_method ?? ''} 
                            </td>            
                            <td class="px-6 py-4 text-right">                         
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_pedido('${item.id}')">Editar</button>
                                <button class="font-medium text-red-600 hover:underline" onclick="fn_cancelar_pedido(${item.id})">Cancelar</button>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="12" style="display:none" id="td_colspan_form_edit_pedido_${item.id}">
                        <div class="contenedor_editar_pedido w-full  p-4 mb-10"
                            data-info="contenedor_editar_pedido_${item.id}" id="contenedor_editar_pedido_${item.id}">
                        
                        </div>                                   
                    </td>
                        </tr>
                    `;
                });

                let links = null;
                if (response.meta && response.meta.links) {
                    links = response.meta.links;
                }
                let pagination_links = crear_paginacion_pedidos_links(links);
                $("#pagination_container").html(pagination_links);
                $("#pagination_container").show();
            } else {
                PEDIDOS_HTML = `
                <trid="tr_info_pedidos_lista_vacia">
                    <td colspan="12">
                        <div class="w-fullr p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="flex justify-center items-center font-medium">Lista vacia</span> 
                        </div>
                    </td>
                </tr>`;
            }

            $(`#tbody_pedidos`).html(PEDIDOS_HTML);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
        error: function (xhr, status, error) {
            console.error("Error al obtener pedidos:", error);
            $(`#contenedor_spinner`).hide();
            $(`#contenedor_dashboards_principal`).show();
        },
    });
}

function crear_paginacion_pedidos_links(links = null) {

    if (links == null) {
        return false;
    }
    let paginationHTML = `
    <nav aria-label="Page navigation">
        <ul class="flex items-center -space-x-px h-8 text-sm">
    `;

    // Agrega el enlace "Anterior" si está disponible
    if (links.prev) {
        paginationHTML += `
        <li>
            <button onclick="fn_obtener_pedidos('${get_page_number(links.prev)}')" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
                <button onclick="fn_obtener_pedidos('${get_page_number(link.url)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">${link.label}</button>
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
            <button onclick="fn_obtener_pedidos('${get_page_number(links.next)}')" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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

function fn_mostrar_form_editar_pedido(id) {

    $.ajax({
        url: `http://localhost:8000/api/v1/orders/${id}`,
        method: "GET",
        dataType: "json",
        headers: {
            Authorization: "Bearer " + $("#tkn").val(),
            Accept: "application/json",
        },
        success: function (response) {
            console.log("Informacion de pedido :", response);

        },
        error: function (xhr, status, error) {
            console.error("Error al obtener el pedido:", error);
        },
    });

}


function fn_mostrar_form_editar_pedido(id) {
    $(`#td_colspan_form_edit_pedido_${id}`).toggle(function () {
        if ($(this).is(':visible')) {
            $.ajax({
                url: `http://localhost:8000/api/v1/orders/${id}`,
                method: "GET",
                dataType: "json",
                headers: {
                    Authorization: "Bearer " + $("#tkn").val(),
                    Accept: "application/json",
                },
                success: function (response) {
                    console.log("Informacion del pedido :", response);

                    let data = response.data;
                    if (data.id != undefined && data.id != null && data.id != '' && !isNaN(data.id)) {

                        let HTML_FORM_EDIT = `
                        <form class="w-full flex flex-row gap-2" enctype="multipart/form-data" id="formulario_editar_pedido_${data.id}">

                        <div class="w-[100%] h-[100%] border-2 border-gray-200 flex flex-col">
                            <div class="w-full h-[50px] border-b-2 border-gray-200 flex justify-center items-center">
                                <h2 class="text-2xl font-semibold">Pedido ${data.id} </h2>
                            </div>
                            <div class="w-full p-6">
    
                                <div class="grid gap-6 mb-6 md:grid-cols-2">

                                 <div>
                                    <label for="status_${data.id}" class="block mb-2 text-sm font-medium text-gray-900">
                                        Modificar el estado del pedido
                                    </label>
                                    <select id="status_${data.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        <option selected>Seleccionar</option>
                                        <option value="pending" ${data.status == 'pending' ? 'selected' : ''}>pending</option>
                                        <option value="processing" ${data.status == 'processing' ? 'selected' : ''}>processing</option>
                                        <option value="on-hold" ${data.status == 'on-hold' ? 'selected' : ''}>on-hold</option>
                                        <option value="completed" ${data.status == 'completed' ? 'selected' : ''}>completed</option>
                                        <option value="cancelled" ${data.status == 'cancelled' ? 'selected' : ''}>cancelled</option>
                                        <option value="refunded" ${data.status == 'refunded' ? 'selected' : ''}>refunded</option>
                                        <option value="failed" ${data.status == 'failed' ? 'selected' : ''}>failed</option>
                                        <option value="trash" ${data.status == 'trash' ? 'selected' : ''}>trash</option>
                                    </select>
                                </div>

                                </div>
    
                                <div class="grid gap-6 mb-6 md:grid-cols-1">
                                    <button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                                        onclick="fn_modificar_pedido(${data.id})">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                        `;

                        $(`#contenedor_editar_pedido_${data.id}`).html(HTML_FORM_EDIT);

                    } else {
                        mostrar_error("Error al generar el formulario editar pedido");
                        return;
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al obtener el pedido:", error);
                },
            });
        }
    });
}

async function fn_comprobar_si_el_usuario_logeado_es_cliente(email) {
    let token = $("#tkn").val();
    let url = `http://localhost:8000/api/v1/customers?email[eq]=${email}`;

    try {
        let response = await $.ajax({
            url: url,
            method: "GET",
            dataType: "json",
            headers: {
                Authorization: "Bearer " + token,
                Accept: "application/json",
            },
        });

        let cliente = response.data[0] ?? {};

        if (cliente.id != undefined && cliente.id != null && cliente.id != '' && cliente.id > 0) {
            console.log('cliente.id', cliente.id)
            return cliente;
        } else {
            let cliente_datos = {
                "firstName": "Usuario prueba",
                "lastName": "Sin espesificar",
                "customerType": "individual",
                "email": email,
                "password": "Ta00123456",
                "adress": "Calle de la paz 21",
                "postalCode": "41005",
                "city": "Valencia",
                "state": "Valencia",
                "country": "España",
                "phone": "6000000000"
            }

            try {
                let response = await $.ajax({
                    url: "http://localhost:8000/api/v1/customers",
                    method: "POST",
                    data: cliente_datos,
                    headers: {
                        Authorization: "Bearer " + $("#tkn").val(),
                        Accept: "application/json",
                    },
                });

                let item = response.data;
                console.log("Cliente creado con éxito:", item);
                if (item.id && item.id > 0) {
                    console.log('item.id', item.id);
                    return item;
                } else {
                    throw new Error("Error al crear el cliente");
                }
            } catch (error) {
                console.error("Error al crear el cliente:", error);
                throw error;
            }
        }
    } catch (error) {
        console.error("Error al obtener cliente:", error);
        throw error;
    }
}

async function fn_mostrar_formulario_generar_pedido(elemento_id) {

    $('.contenedor_formularios').each(function () {
        $(this).hide();
    })
    $(`#${elemento_id}`).show();
    fn_obtener_pedidos(null, true);


    let user_email = $(`#input_hidden_user_email`).val();
    if (!user_email || user_email == '') {
        mostrar_error('Logeate antes de seguir');
        return false;
    }

    try {
        let customer = await fn_comprobar_si_el_usuario_logeado_es_cliente(user_email);
        console.log('customer', customer);
        let cliente_id = customer.id;
        let cliente_email = customer.email;
        $(`#carrito_email_cliente`).text(cliente_email);
        $(`#input_hidden_customer_id`).val(cliente_id);

    } catch (error) {
        console.error("Error al obtener el cliente:", error);
        // Manejar el error aquí
    }
}



// Inicializar el carrito
let carrito = [];

// Array para almacenar los productos en el carrito
let cart_items = [];

// Función para agregar un producto al carrito
function agregar_al_carrito(id) {

    let productos = [
        {
            'id': 0,
            'price': '25.99',
            'regular_price': '45.99',
            'name': 'Producto 1',
            'image': 'assets/imgs/pr_img_1.png',
        },
        {
            'id': 1,
            'price': '205.99',
            'regular_price': '410.99',
            'name': 'Producto 2',
            'image': 'assets/imgs/pr_img_4.png',
        },
        {
            'id': 2,
            'price': '29.90',
            'regular_price': '49.90',
            'name': 'Producto 3',
            'image': 'assets/imgs/pr_img_3.png',
        },
        {
            'id': 3,
            'price': '109.90',
            'regular_price': '201.90',
            'name': 'Producto 4',
            'image': 'assets/imgs/pr_img_5.png',
        },
        {
            'id': 4,
            'price': '99.99',
            'regular_price': '199.99',
            'name': 'Producto 5',
            'image': 'assets/imgs/pr_img_2.png',
        },
    ]
    // Buscar el producto en la lista de productos disponibles
    let producto = productos.find(prod => prod.id === id);

    // Verificar si el producto ya está en el carrito
    let itemIndex = cart_items.findIndex(item => item.id === id);

    if (itemIndex !== -1) {
        // Si el producto ya está en el carrito, incrementar la cantidad
        cart_items[itemIndex].quantity++;
    } else {
        // Si el producto no está en el carrito, agregarlo con cantidad 1
        cart_items.push({ ...producto, quantity: 1 });
    }

    // Actualizar la visualización del carrito
    update_cart_view();

}

function menos_cantidad(id) {
    // Buscar el índice del producto en el carrito
    const itemIndex = cart_items.findIndex(item => item.id === id);

    if (itemIndex !== -1) {
        // Decrementar la cantidad del producto
        cart_items[itemIndex].quantity--;

        // Actualizar la visualización del carrito
        update_cart_view();
    }
}

function mas_cantidad(id) {
    // Buscar el índice del producto en el carrito
    const itemIndex = cart_items.findIndex(item => item.id === id);

    if (itemIndex !== -1) {
        // Incrementar la cantidad del producto
        cart_items[itemIndex].quantity++;

        // Actualizar la visualización del carrito
        update_cart_view();
    }
}

// Función para actualizar la visualización del carrito
function update_cart_view() {
    const cart_container = document.getElementById('info_productos_carrito');
    const cantidad_de_productos = document.getElementById('cantidad_de_productos');

    cart_container.style.display = '';

    // Limpiar contenido anterior
    cart_container.innerHTML = '';

    // Recorrer los elementos del carrito y agregarlos al HTML
    cart_items.forEach(item => {
        if (item.quantity > 0) {
            const div = document.createElement('div');
            div.classList.add('flex', 'items-center', 'hover:bg-gray-100', '-mx-8', 'px-6', 'py-5');
            div.innerHTML = `
                <div class="flex w-2/5">
                    <div class="w-20">
                        <img class="h-24" src="${item.image}" alt="${item.name}">
                    </div>
                    <div class="flex flex-col justify-between ml-4 flex-grow">
                        <span class="font-bold text-sm">${item.name}</span>
                        <span class="text-red-500 text-xs">Category</span>
                        <a href="#" class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
                    </div>
                </div>
                <div class="flex justify-center w-1/5 gap-4">
                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512" onclick="menos_cantidad(${item.id})">
                        <path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                    </svg>
                    <input class="mx-2 border text-center w-16" type="text" value="${item.quantity}" readonly>
                    <svg class="fill-current text-gray-600 w-3" viewBox="0 0 448 512" onclick="mas_cantidad(${item.id})">
                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                    </svg>
                </div>
                <span class="text-center w-1/5 font-semibold text-sm">${item.price}€</span>
                <span class="text-center w-1/5 font-semibold text-sm">${(item.price * item.quantity).toFixed(2)}€</span>
            `;
            cart_container.appendChild(div);
        }
    });

    // Eliminar productos con cantidad cero del carrito
    cart_items = cart_items.filter(item => item.quantity > 0);

    // Actualizar el número de ítems en el carrito
    cantidad_de_productos.textContent = cart_items.reduce((total, item) => total + item.quantity, 0);

    // Actualizar el resumen del pedido
    update_summary();
}


// Función para actualizar el resumen del pedido
function update_summary() {
    const summary_subtotal = document.getElementById('summary_subtotal');
    const summary_iva = document.getElementById('summary_iva');
    const summary_total = document.getElementById('summary_total');
    const summary_cantidad_de_productos = document.getElementById('cantidad_de_productos');

    // Calcular el total de ítems y el costo total
    const cantidad = cart_items.reduce((total, item) => total + item.quantity, 0);
    const total = cart_items.reduce((total, item) => total + (item.price * item.quantity), 0);
    const iva = ((parseFloat(total)) - parseFloat(total / 1.21));
    const subtotal = parseFloat(total) - parseFloat(iva);

    // Actualizar los elementos del resumen del pedido
    summary_cantidad_de_productos.textContent = cantidad;
    summary_subtotal.textContent = parseFloat(subtotal).toFixed(2);
    summary_iva.textContent = parseFloat(iva).toFixed(2);
    summary_total.textContent = parseFloat(total).toFixed(2);
}


function fn_generar_pedido() {

    let customer_id = $(`#input_hidden_customer_id`).val();
    if (customer_id == undefined || customer_id == null || customer_id == '' || isNaN(customer_id)) {
        mostrar_error('Error al generar el pedido, debes logearte antes');
    } else {

        let subtotal = parseFloat($(`#summary_subtotal`).text()).toFixed(2);
        let iva = parseFloat($(`#summary_iva`).text()).toFixed(2);
        let total = parseFloat($(`#summary_total`).text()).toFixed(2);

        let lineItems = [];


        if (!cart_items || cart_items.length == 0) {
            mostrar_error('El carrito esta vacio');
            return false;
        }

        //console.log(cart_items);
        cart_items.forEach(item => {
            let producto = {};
            producto.id = item.id;
            producto.name = item.name;
            producto.price = item.price;
            producto.quantity = item.quantity;
            lineItems.push(producto);
        });

        if (!lineItems || lineItems.length == 0) {
            mostrar_error('Revisa tu carrito');
            return false;
        }

        let order_data = {
            "customerId": customer_id,
            "customerIpAddress": "192.1.1.1",
            "status": "pending",
            "currency": "EUR",
            "discountTotal": "0.00",
            "shippingTotal": subtotal,
            "taxType": "amount",
            "totalTax": iva,
            "shippingTotalwithTax": total,
            "billing": null,
            "shipping": null,
            "paymentMethod": "credit_card",
            "paymentMethodTitle": "Credit Card",
            "datePaid": "",
            "dateCompleted": "",
            "lineItems": lineItems,
            "couponLines": []
        }

        console.log('order_data', order_data);


        $.ajax({
            url: "http://localhost:8000/api/v1/orders",
            method: "POST",
            data: order_data,
            headers: {
                Authorization: "Bearer " + $("#tkn").val(),
                Accept: "application/json",
            },
            success: function (response) {
                console.log("Pedido creado con éxito:", response);
                let item = response.order;
                console.log(item);
                if (item.id && item.id > 0) {

                    let HTML_PEDIDO = `<tr class="bg-white dark:bg-gray-800" id="tr_pedido_${item.id}">
                            <th scope="row" class="px-6 py-4">
                            ${item.id ?? ""}
                            </th>
                            <td class="px-6 py-4">
                            ${item.customer_id ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.status ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.created_at ?? ""}
                            </td>
                            <td class="px-6 py-4">
                            ${item.date_paid ?? ""} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.discount_total ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.shipping_total ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.total_tax ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.shipping_total_with_tax ?? ''} 
                            </td>
                            <td class="px-6 py-4">
                            ${item.payment_method ?? ''} 
                            </td>            
                            <td class="px-6 py-4 text-right">                         
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="fn_mostrar_form_editar_pedido('${item.id}')">Editar</button>
                                <button class="font-medium text-red-600 hover:underline" onclick="fn_cancelar_pedido(${item.id})">Cancelar</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" style="display:none" id="td_colspan_form_edit_pedido_${item.id}"></td>
                        </tr>`;

                    $(`#tbody_pedidos`).prepend(HTML_PEDIDO);
                    $(`#contenedor_generar_nuevo_pedido`).hide();
                    cart_items = [];
                    update_summary();

                    $(`#contenedor_generar_un_pedido`).hide();
                    $(`#info_productos_carrito`).html(``);

                    Swal.fire({
                        html: `<h4><b>El pedido ha sido creado correctamente</b></h4>`,
                        icon: `success`,
                    });

                } else {
                    Swal.fire({
                        html: `< h4><b>Error al crear el pedido</b></h4> `,
                        icon: `error`,
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error al crear el pedido:", error);
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';
                for (let field in errors) {
                    errorMessages += `${errors[field].join('<br>')}<br>`;
                }
                Swal.fire({
                    html: `<h4><b>Error al generar el pedido/b></h4><p>${errorMessages}</p>`,
                    icon: `error`,
                });
            },
        });


    }

}

function fn_cancelar_pedido(id) {

    Swal.fire({
        html: "<h4><strong>¿ Quieres cancelar ?<strong></h4>",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Eliminar",
        denyButtonText: `Cancelar`,
        icon: 'question'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `http://localhost:8000/api/v1/orders/${id}`,
                method: "DELETE",
                headers: {
                    Authorization: "Bearer " + $("#tkn").val(),
                    Accept: "application/json",
                },
                success: function (response) {
                    console.log("Pedido cancelado con éxito:", response);
                    if (response) {
                        Swal.fire({
                            html: `<h4><b>Pedido cancelado correctamente</b></h4>`,
                            icon: `success`,
                        });
                        $(`#tr_pedido_${id}`).hide();
                    } else {
                        Swal.fire({
                            html: `<h4><b>Error al cancelar el pedido</b></h4>`,
                            icon: `error`,
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error al cancelar el pedido:", error);
                },
            });
        }
    });

}

