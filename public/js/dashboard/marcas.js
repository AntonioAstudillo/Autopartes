document.getElementById("btnAddMarca").addEventListener("click", function () {
    document.getElementById("addMarcaForm").reset();
    $("#addMarcaProduct").modal("show");
});

document.getElementById("btnSaveMarca").addEventListener("click", function (e) {
    e.preventDefault();

    let codigo = document.getElementById("codigoProducto").value;
    let marca = document.getElementById("marca").value;
    let submarca = document.getElementById("submarca").value;

    if (codigo === "" || marca === "" || submarca === "") {
        Swal.fire(
            "Error!",
            "Debe llenar los datos de forma correcta!",
            "error"
        );
    } else {
        const formData = new FormData(document.getElementById("addMarcaForm"));

        const xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                Swal.fire(
                    "Buen trabajo!",
                    "Marca agregada de forma correcta!",
                    "success"
                ).then(function () {
                    $("#addMarcaProduct").modal("hide");
                });
            } else if (this.readyState == 4 && this.status == 422) {
                Swal.fire(
                    "Error!",
                    "Tuvimos un problema al procesar la solicitud!",
                    "error"
                );
            }
        };

        xhttp.open("POST", `/dashboard/saveMarca`);
        xhttp.send(formData);
    }
});
