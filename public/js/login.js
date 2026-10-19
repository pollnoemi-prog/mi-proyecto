// ========================================
// GLAM STORE - LOGIN
// ========================================

document.addEventListener("DOMContentLoaded", function () {

    const formulario =
        document.getElementById("loginForm");

    const tarjeta =
        document.querySelector(".login-card");

    const boton =
        document.getElementById("loginButton");


    // ========================================
    // ANIMACIÓN DE ENTRADA
    // ========================================

    if (tarjeta) {

        tarjeta.style.opacity = "0";

        tarjeta.style.transform =
            "translateY(15px)";

        setTimeout(function () {

            tarjeta.style.transition =
                "opacity 0.5s ease, transform 0.5s ease";

            tarjeta.style.opacity = "1";

            tarjeta.style.transform =
                "translateY(0)";

        }, 100);

    }


    // ========================================
    // CAMBIAR BOTÓN AL INICIAR SESIÓN
    // ========================================

    if (formulario && boton) {

        formulario.addEventListener(
            "submit",
            function () {

                boton.innerHTML =
                    "Iniciando sesión...";

                boton.style.opacity =
                    "0.7";

                boton.style.cursor =
                    "wait";

            }
        );

    }

});