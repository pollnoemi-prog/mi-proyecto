// ==============================
// DESPLAZAMIENTO SUAVE
// ==============================

document.querySelectorAll('a[href^="#"]').forEach(function(enlace) {

    enlace.addEventListener('click', function(e) {

        const destino = document.querySelector(
            this.getAttribute('href')
        );

        if (destino) {

            e.preventDefault();

            destino.scrollIntoView({
                behavior: 'smooth'
            });

        }

    });

});


// ==============================
// MENÚ PARA CELULAR
// ==============================

function abrirMenu() {

    const menu = document.getElementById("menu");

    if (menu.style.display === "flex") {

        menu.style.display = "none";

    } else {

        menu.style.display = "flex";

        menu.style.flexDirection = "column";

        menu.style.position = "absolute";

        menu.style.top = "75px";

        menu.style.left = "0";

        menu.style.width = "100%";

        menu.style.padding = "25px";

        menu.style.background = "white";

        menu.style.gap = "20px";

    }

}


// ==============================
// MENSAJE DEL FORMULARIO
// ==============================

const formulario = document.querySelector(".contacto-form");

if (formulario) {

    formulario.addEventListener("submit", function(e) {

        e.preventDefault();

        alert("¡Gracias por contactarnos! 💗");

        formulario.reset();

    });

}