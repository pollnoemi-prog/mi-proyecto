<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Glam Store</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/tienda.css') }}">
</head>

<body>

    <!-- =========================
         BARRA DE NAVEGACIÓN
    ========================== -->

    <header class="navbar">

        <div class="logo">
            GLAM<span>STORE</span>
        </div>

        <nav id="menu">

            <a href="#inicio">Inicio</a>

            <a href="#productos">Explora</a>

            <a href="#categorias">Categorías</a>

            <a href="#ofertas">Ofertas</a>

            <a href="#contacto">Contacto</a>

        </nav>

        <div class="acciones">

            @auth

                <a href="{{ url('/dashboard') }}" class="btn-login">
                    Mi cuenta
                </a>

            @else

                <a href="{{ route('login') }}" class="btn-login">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">
                        Registrarse
                    </a>
                @endif

            @endauth

        </div>

        <button class="menu-btn" onclick="abrirMenu()">
            ☰
        </button>

    </header>


    <!-- =========================
         INICIO
    ========================== -->

    <section id="inicio" class="hero">

        <div class="hero-text">

            <p class="mini-title">
                NUEVA COLECCIÓN
            </p>

            <h1>
                Tu belleza,<br>
                <span>tu estilo.</span>
            </h1>

            <p class="descripcion">
                Descubre productos de maquillaje y belleza
                pensados para resaltar tu estilo.
            </p>

            <div class="hero-buttons">

                <a href="#productos" class="btn-principal">
                    Explorar productos
                </a>

                <a href="#ofertas" class="btn-secundario">
                    Ver ofertas
                </a>

            </div>

        </div>

        <div class="hero-image">

            <div class="maquillaje-card">
                <span>NEW</span>
                <h3>BEAUTY</h3>
                <p>Make your own style</p>
            </div>

        </div>

    </section>


    <!-- =========================
         CATEGORÍAS
    ========================== -->

    <section id="categorias" class="section">

        <div class="section-title">

            <p>DESCUBRE</p>

            <h2>
                Compra por categoría
            </h2>

            <span>
                Encuentra tus favoritos en un solo lugar.
            </span>

        </div>

        <div class="categorias">

            <div class="categoria">
                <div class="categoria-icon">💄</div>
                <h3>Maquillaje</h3>
                <p>Labiales, bases, sombras y más.</p>
            </div>

            <div class="categoria">
                <div class="categoria-icon">✨</div>
                <h3>Skincare</h3>
                <p>Productos para el cuidado de tu piel.</p>
            </div>

            <div class="categoria">
                <div class="categoria-icon">💅</div>
                <h3>Uñas</h3>
                <p>Todo para complementar tu look.</p>
            </div>

            <div class="categoria">
                <div class="categoria-icon">🎀</div>
                <h3>Accesorios</h3>
                <p>Detalles que hacen la diferencia.</p>
            </div>

        </div>

    </section>


    <!-- =========================
         PRODUCTOS
    ========================== -->

    <section id="productos" class="productos-section">

        <div class="section-title">

            <p>SHOP NOW</p>

            <h2>
                Explora nuestros productos
            </h2>

            <span>
                Descubre productos para crear el look que quieras.
            </span>

        </div>


        <div class="productos">

            <div class="producto">

                <div class="producto-img">
                    <span class="etiqueta">NEW</span>
                    💄
                </div>

                <div class="producto-info">

                    <p>MAKEUP</p>

                    <h3>
                        Lip Gloss
                    </h3>

                    <span class="precio">
                        $199.00
                    </span>

                    <button>
                        Ver producto
                    </button>

                </div>

            </div>


            <div class="producto">

                <div class="producto-img">
                    <span class="etiqueta">BEST SELLER</span>
                    💋
                </div>

                <div class="producto-info">

                    <p>MAKEUP</p>

                    <h3>
                        Velvet Lip
                    </h3>

                    <span class="precio">
                        $249.00
                    </span>

                    <button>
                        Ver producto
                    </button>

                </div>

            </div>


            <div class="producto">

                <div class="producto-img">
                    <span class="etiqueta">NEW</span>
                    ✨
                </div>

                <div class="producto-info">

                    <p>SKINCARE</p>

                    <h3>
                        Glow Serum
                    </h3>

                    <span class="precio">
                        $299.00
                    </span>

                    <button>
                        Ver producto
                    </button>

                </div>

            </div>


            <div class="producto">

                <div class="producto-img">
                    <span class="etiqueta">HOT</span>
                    🎀
                </div>

                <div class="producto-info">

                    <p>BEAUTY</p>

                    <h3>
                        Beauty Set
                    </h3>

                    <span class="precio">
                        $349.00
                    </span>

                    <button>
                        Ver producto
                    </button>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         OFERTAS
    ========================== -->

    <section id="ofertas" class="oferta">

        <div>

            <p>LIMITED TIME</p>

            <h2>
                Hasta 30% OFF
            </h2>

            <span>
                Renueva tu colección de belleza
                con nuestros productos favoritos.
            </span>

            <br>

            <a href="#productos" class="btn-oferta">
                Comprar ahora
            </a>

        </div>

    </section>


    <!-- =========================
         CONTACTO
    ========================== -->

    <section id="contacto" class="contacto">

        <div class="section-title">

            <p>CONTACTO</p>

            <h2>
                ¿Necesitas ayuda?
            </h2>

            <span>
                Estamos aquí para ayudarte.
            </span>

        </div>


        <div class="contacto-container">

            <div class="contacto-info">

                <h3>
                    Contáctanos
                </h3>

                <p>
                    Si tienes alguna duda sobre nuestros productos,
                    pedidos o servicios, puedes comunicarte con nosotros.
                </p>

                <div class="dato">
                    📧 contacto@glamstore.com
                </div>

                <div class="dato">
                    📱 +52 999 000 0000
                </div>

                <div class="dato">
                    📍 Yucatán, México
                </div>

            </div>


            <form class="contacto-form">

                <input
                    type="text"
                    placeholder="Tu nombre"
                >

                <input
                    type="email"
                    placeholder="Tu correo"
                >

                <textarea
                    placeholder="Escribe tu mensaje..."
                ></textarea>

                <button type="submit">
                    Enviar mensaje
                </button>

            </form>

        </div>

    </section>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div class="footer-logo">
            GLAM<span>STORE</span>
        </div>

        <p>
            Belleza, estilo y confianza.
        </p>

        <div class="footer-links">

            <a href="#inicio">Inicio</a>

            <a href="#productos">Productos</a>

            <a href="#categorias">Categorías</a>

            <a href="#ofertas">Ofertas</a>

            <a href="#contacto">Contacto</a>

        </div>

        <small>
            © {{ date('Y') }} Glam Store. Todos los derechos reservados.
        </small>

    </footer>


    <!-- JavaScript -->
    <script src="{{ asset('js/tienda.js') }}"></script>

</body>
</html>