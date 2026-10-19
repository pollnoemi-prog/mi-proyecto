// ========================================
// GLAM STORE - REGISTRO
// ========================================

document.addEventListener("DOMContentLoaded", function () {

    const formulario = document.querySelector(
        'form[action*="register"]'
    );

    if (!formulario) {
        return;
    }


    // Animación sencilla al entrar
    const tarjeta = document.querySelector(".register-card");

    if (tarjeta) {

        tarjeta.style.opacity = "0";
        tarjeta.style.transform = "translateY(15px)";

        setTimeout(function () {

            tarjeta.style.transition =
                "opacity 0.5s ease, transform 0.5s ease";

            tarjeta.style.opacity = "1";
            tarjeta.style.transform = "translateY(0)";

        }, 100);

    }


    // Efecto en el botón al enviar
    formulario.addEventListener("submit", function () {

        const boton = formulario.querySelector(
            ".register-button"
        );

        if (boton) {

            boton.innerHTML = "Creando cuenta...";

            boton.style.opacity = "0.7";

            boton.style.cursor = "wait";

        }

    });

});