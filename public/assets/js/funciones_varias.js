$(document).ready(function () {
    console.log('FUNCIONES VARIAS');

    $('.dropdown_accion').click(function () {
        const dropdownName = $(this).attr('data-dropdownname');
        if(dropdownName!='dropdown-intro'){
             $('[id^="dropdown-"]').not('#dropdown-' + dropdownName).not('#dropdown-intro').addClass('hidden');
        $('#dropdown-' + dropdownName).toggleClass('hidden'); 
        }
      
    });


})

function fn_copiar_codigo(elemento_id) {
    const elemento = document.getElementById(elemento_id);
    if (elemento) {
        const texto = elemento.innerText || elemento.textContent;
        navigator.clipboard.writeText(texto)
            .then(() => {
                Swal.fire({
                    html: `<h4><b>Copiado al portapapeles</b></h4>`,
                    icon: `success`,
                });
            })
            .catch(err => {
                Swal.fire({
                    html: `<h4><b>No ha sido posible la copia</b></h4>`,
                    icon: `error`,
                });
            });
    }
}

function fn_scroll_to(elemento_id) {
    const elemento = document.getElementById(`${elemento_id}`);
    console.log('Click en ', elemento_id);
    if (elemento) {
        console.log('elemento para el scroll', elemento);
        window.scrollTo({
            top: elemento.offsetTop - 100,
            behavior: 'smooth'
        })

    }
}



