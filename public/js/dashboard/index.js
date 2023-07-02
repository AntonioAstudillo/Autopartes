window.onload = main;

function main() {
    document
        .getElementById("btnAddProduct")
        .addEventListener("click", function () {
            $("#modalProductoAdd").modal("show");
        });

    document
        .getElementById("createProducto")
        .addEventListener("click", function () {
            if (!validateDataProducto()) {
                Swal.fire(
                    "Error!",
                    "Debe llenar los datos de forma correcta!",
                    "error"
                );
            } else {
                saveProduct();
            }
        });

    document
        .getElementById("codigoAdd")
        .addEventListener("change", function () {
            validarCodigoRepetido();
        });

    document
        .getElementById("nextProductAdd")
        .addEventListener("click", function () {
            esconderBtnNext();
        });

    document
        .getElementById("backProductAdd")
        .addEventListener("click", function () {
            mostrarBtnNext();
        });

    document
        .getElementById("addDetalleDiv")
        .addEventListener("click", function () {
            let padre = document.getElementById("contenidoDetalleProduct");
            let nodo = document.getElementById("hijoContenidoDetalle");
            const copia = nodo.cloneNode(true);

            let valores = copia.childNodes[1].nextElementSibling;
            //Limpiamos los inputs de balata , modelo y fmsi, para que no almacenen el valor de los inputs anteriores
            valores.childNodes[1].childNodes[3].value = "";
            valores.childNodes[3].childNodes[3].value = "";
            valores.childNodes[5].childNodes[3].value = "";

            //Agregamos la copia al nodo padre
            padre.appendChild(copia);
        });

    document
        .getElementById("deleteDetalleDiv")
        .addEventListener("click", function () {
            let padre = document.getElementById("contenidoDetalleProduct");
            let hijos = padre.childNodes;

            if (hijos.length > 3) {
                let hijo = hijos[hijos.length - 1];
                padre.removeChild(hijo);
            }
        });
}

//Con este metodo comprobamos que el usuario si haya llenado de forma correcta los datos del producto
function validateDataProducto() {
    let codigo = document.getElementById("codigoAdd").value;
    let grupo = document.getElementById("grupoAdd").value;
    let familia = document.getElementById("familiaAdd").value;
    let catalogo = document.getElementById("catalogoAdd").value;

    //Solo el codigo, la familia, el catalogo y el grupo son obligatorios
    if (codigo === "" || grupo === "" || familia === "" || catalogo === "") {
        return false;
    } else {
        return true;
    }
}

function saveProduct() {
    document.getElementById("formAddProduct").submit();
}

function validarCodigoRepetido() {
    const xhttp = new XMLHttpRequest();
    let codigo = document.getElementById("codigoAdd").value;

    if (codigo !== "") {
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 409) {
                Swal.fire(
                    "Error!",
                    "El código que ingreso es repetido!",
                    "error"
                );
            }
        };

        xhttp.open("GET", `/dashboard/validateCodigo/${codigo}`);
        xhttp.send();
    }
}

function esconderBtnNext() {
    //Mostramos botones
    document.getElementById("nextProductAdd").classList.add("d-none");
    document.getElementById("backProductAdd").classList.remove("d-none");
    document.getElementById("createProducto").classList.remove("d-none");

    //Escondemos data primaria
    document.getElementById("dataPrimaryForm").classList.add("d-none");

    //Mostramos data secundaria
    document.getElementById("dataSecondaryForm").classList.remove("d-none");
}

function mostrarBtnNext() {
    //Escondemos botones
    document.getElementById("nextProductAdd").classList.remove("d-none");
    document.getElementById("backProductAdd").classList.add("d-none");
    document.getElementById("createProducto").classList.add("d-none");

    //Escondemos data primaria
    document.getElementById("dataPrimaryForm").classList.remove("d-none");

    //Mostramos data secundaria
    document.getElementById("dataSecondaryForm").classList.add("d-none");
}
