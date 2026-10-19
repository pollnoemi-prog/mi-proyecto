document.addEventListener("DOMContentLoaded", function () {

    const tarjetas = document.querySelectorAll(
        ".dashboard-card, .product-card, .category-card"
    );

    tarjetas.forEach(function (tarjeta) {

        tarjeta.addEventListener("mouseenter", function () {
            tarjeta.style.transition = "0.3s";
        });

    });

});