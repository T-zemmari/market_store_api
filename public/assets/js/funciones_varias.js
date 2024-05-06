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
                imgElement.style.width = '100%';
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

function fn_mostrar_formulario(elemento_id) {
    $(`#${elemento_id}`).toggle();
    //fn_obtener_productos();
    fn_obtener_categorias_para_el_formulario_producto();
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

    if (!validar_inputs) {
        Swal.fire({
            html: `<h4><b>Por favor, complete todos los campos.</b></h4>`,
            icon: `error`,
        });

        return false;
    }

    // Crear un nuevo FormData
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

    formData.append("image", principal_img);

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
            // Aquí puedes manejar la respuesta según tu lógica de frontend
        },
        error: function (xhr, status, error) {
            console.error("Error al crear el producto:", error);
            // Aquí puedes manejar el error según tu lógica de frontend
        },
    });
}

function validar_inputs() {
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

    // Verificar si se adjuntaron imágenes
    let images = document.getElementById("input_images").files;
    if (images.length === 0) {
        alert("Por favor, adjunta al menos una imagen.");
        return false;
    }

    // Verificar si algún campo está vacío o no es válido
    if (
        !category_id ||
        !type ||
        !status ||
        !sku ||
        !name ||
        !short_description ||
        !description ||
        !regular_price ||
        !sale_price ||
        !price ||
        !stock_status ||
        !stock_quantity
    ) {
        //alert("Por favor, complete todos los campos.");
        return false;
    }

    return true;
}
