function onSubmit(token) {
    esconderBTNEnviar();
    let formulario = document.getElementById("formContacto");
    const formData = new FormData(formulario);

    formData.append("g-recaptcha-response", token);

    const request = new XMLHttpRequest();
    request.open("POST", "/contacto");

    request.addEventListener("load", function () {
        mostrarBTNEnviar();

        if (request.status === 400) {
            Swal.fire("Error!", "Los datos no son correctos!", "error");
        } else if (request.status === 200) {
            Swal.fire(
                "Solicitud enviada correctamente!",
                "Un colaborador lo contactará a la brevedad!",
                "success"
            ).then(function () {
                formulario.reset();
            });
        } else if (request.status === 419) {
            console.log("entra aqui");
            //location.reload();
        } else if (request.status === 500) {
            Swal.fire("Error!", "No se pudo concretar la solicitud!", "error");
        }
    });

    request.send(formData);
}

function esconderBTNEnviar() {
    document.getElementById("btnEnviar").classList.add("d-none");
    document.getElementById("btnEnviando").classList.remove("d-none");
}

function mostrarBTNEnviar() {
    document.getElementById("btnEnviar").classList.remove("d-none");
    document.getElementById("btnEnviando").classList.add("d-none");
}
