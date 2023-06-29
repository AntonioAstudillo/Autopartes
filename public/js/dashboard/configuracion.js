document
    .getElementById("formConfiguracion")
    .addEventListener("change", function () {
        document.getElementById("btnUpdateUser").disabled = false;
    });

document.getElementById("btnUpdateUser").disabled = true;
