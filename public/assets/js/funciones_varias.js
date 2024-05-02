$(document).ready(function(){
    console.log('FUNCIONES VARIAS');
})

function fn_copiar_codigo(elemento_id) {
    const elemento = document.getElementById(elemento_id);
    const texto = elemento.innerText || elemento.textContent;
    navigator.clipboard.writeText(texto)
        .then(() => {
            Swal.fire({
                html:`<h4><b>Copiado al portapapeles</b></h4>`,
                icon:`success`,
            });
        })
        .catch(err => {
            Swal.fire({
                html:`<h4><b>No ha sido posible la copia</b></h4>`,
                icon:`error`,
            });
        });
}
