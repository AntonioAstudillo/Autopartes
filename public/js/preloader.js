window.onload = main;

function main() {
    // Page loading animation
    document.getElementById("js-preloader").classList.add("loaded");

    if (document.getElementById("formLogin") !== null) {
        document
            .getElementById("formLogin")
            .addEventListener("submit", function (e) {
                e.preventDefault();

                if (
                    document.getElementById("email").value === "" ||
                    document.getElementById("password").value === ""
                ) {
                    Swal.fire("Error!", "Debe ingresar los datos!", "error");
                } else {
                    document.getElementById("formLogin").submit();
                }
            });
    }
}
