
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Pink Beauty</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- Fuente -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --rosa-principal: #e75480;
            --rosa-oscuro: #c93668;
            --rosa-claro: #fff0f5;
            --rosa-fondo: #fff8fb;
            --blanco: #ffffff;
            --texto: #4a3540;
            --texto-secundario: #947d89;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: var(--rosa-fondo);
            font-family: 'Poppins', sans-serif;
            color: var(--texto);
            margin: 0;
        }

        /* Barra de navegación */
        .navbar {
            background: var(--blanco);
            padding: 15px 0;
            box-shadow: 0 3px 20px rgba(199, 74, 120, 0.08);
            border-bottom: 1px solid #fce5ee;
        }

        .navbar-brand {
            color: var(--rosa-principal) !important;
            font-size: 22px;
            letter-spacing: -0.5px;
        }

        .brand-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: var(--rosa-claro);
            margin-right: 8px;
            color: var(--rosa-principal);
        }

        .nav-link {
            color: #755967;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--rosa-principal) !important;
        }

        .admin-label {
            color: var(--texto-secundario);
            font-size: 13px;
            background: var(--rosa-fondo);
            padding: 10px 15px;
            border-radius: 25px;
        }

        .admin-label i {
            color: var(--rosa-principal);
            margin-right: 6px;
        }

        /* Encabezado */
        .dashboard-title {
            font-size: 30px;
            font-weight: 700;
            color: #503443;
            margin-bottom: 5px;
        }

        .subtitle {
            color: var(--texto-secundario);
            font-size: 14px;
        }

        .breadcrumb {
            background: transparent;
            margin-bottom: 0;
            font-size: 13px;
        }

        .breadcrumb a {
            color: var(--rosa-principal);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--texto-secundario);
        }

        /* Encabezado decorativo */
        .welcome-banner {
            background: linear-gradient(120deg, #f8b5ce, #f5d5e5 60%, #fff0f5);
            border-radius: 22px;
            padding: 28px 32px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(218, 105, 151, 0.10);
        }

        .welcome-banner h2 {
            font-size: 24px;
            font-weight: 700;
            color: #783751;
            margin-bottom: 8px;
        }

        .welcome-banner p {
            color: #85566d;
            font-size: 14px;
            margin-bottom: 0;
            max-width: 550px;
        }

        .banner-icon {
            position: absolute;
            right: 35px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 95px;
            color: rgba(199, 54, 104, 0.17);
        }

        /* Tarjetas */
        .small-box {
            position: relative;
            background: var(--blanco);
            border-radius: 20px;
            min-height: 190px;
            overflow: hidden;
            border: 1px solid #f8e5ed;
            box-shadow: 0 5px 20px rgba(166, 91, 121, 0.07);
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .small-box:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(199, 74, 120, 0.15);
        }

        .small-box .inner {
            padding: 25px 23px 15px;
        }

        .card-label {
            font-size: 13px;
            color: var(--texto-secundario);
            margin-bottom: 12px;
            font-weight: 500;
        }

        .small-box h3 {
            font-size: 35px;
            font-weight: 700;
            color: var(--texto);
            margin-bottom: 8px;
        }

        .small-box .description {
            font-size: 12px;
            color: #a18b97;
            margin-bottom: 0;
        }

        .small-box .icon {
            position: absolute;
            right: 20px;
            top: 25px;
            width: 55px;
            height: 55px;
            border-radius: 17px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 26px;
        }

        /* Colores de cada tarjeta */
        .box-pink .icon {
            color: #df5484;
            background: #fff0f5;
        }

        .box-purple .icon {
            color: #9b70c6;
            background: #f4edff;
        }

        .box-peach .icon {
            color: #df8a63;
            background: #fff2e9;
        }

        .box-rose .icon {
            color: #c94d72;
            background: #fdeaf0;
        }

        .small-box-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 23px;
            margin-top: 4px;
            border-top: 1px solid #f9edf2;
            color: var(--rosa-principal);
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .small-box-footer:hover {
            background: var(--rosa-claro);
            color: var(--rosa-oscuro);
        }

        /* Tarjeta inferior */
        .info-card {
            background: var(--blanco);
            border: 1px solid #f8e5ed;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(166, 91, 121, 0.06);
        }

        .info-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--rosa-claro);
            color: var(--rosa-principal);
            font-size: 23px;
            border-radius: 15px;
        }

        .info-card h5 {
            color: #583748;
            font-weight: 600;
            font-size: 16px;
        }

        .info-card p {
            color: var(--texto-secundario);
            font-size: 13px;
            line-height: 1.8;
        }

        .footer-text {
            text-align: center;
            color: #b59eaa;
            font-size: 12px;
            margin-top: 30px;
            padding-bottom: 10px;
        }

        /* Adaptación a celulares */
        @media (max-width: 767px) {
            .dashboard-title {
                font-size: 25px;
            }

            .welcome-banner {
                padding: 24px 20px;
            }

            .welcome-banner h2 {
                font-size: 20px;
                max-width: 75%;
            }

            .welcome-banner p {
                max-width: 75%;
            }

            .banner-icon {
                right: 10px;
                font-size: 65px;
            }

            .small-box h3 {
                font-size: 30px;
            }

            .admin-label {
                display: inline-block;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">

            <a class="navbar-brand fw-bold d-flex align-items-center"
               href="{{ route('dashboard') }}">

                <span class="brand-icon">
                    <i class="bi bi-bag-heart-fill"></i>
                </span>

                Pink Beauty
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse" data-bs-target="#menu"
                    aria-controls="menu" aria-expanded="false"
                    aria-label="Mostrar menú">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav me-auto ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active"
                           href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door me-1"></i>
                            Inicio
                        </a>
                    </li>
                </ul>

                <span class="admin-label">
                    <i class="bi bi-person-circle"></i>
                    Panel administrativo
                </span>

            </div>
        </div>
    </nav>


        <!-- Banner de bienvenida -->
        <div class="welcome-banner">

            <h2>
                ¡Bienvenida a Pink Beauty!
                <i class="bi bi-stars"></i>
            </h2>

            <p>
                Administra tus productos, categorías, clientes y sucursales
                desde un solo lugar. Todo lo que necesitas para organizar
                tu tienda de belleza.
            </p>

            <i class="bi bi-bag-heart-fill banner-icon"></i>

        </div>

        <!-- Tarjetas de resumen -->
        <div class="row g-4">

            <!-- Productos -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="small-box box-pink">

                    <div class="inner">
                        <div class="card-label">INVENTARIO</div>

                        <h3>{{ $total_productos }}</h3>

                        <p class="description">
                            Productos registrados
                        </p>
                    </div>

                    <div class="icon">
                        <i class="bi bi-bag-heart"></i>
                    </div>

                    <a href="{{ route('productos.index') }}"
                       class="small-box-footer">
                        Ver productos
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>

                </div>
            </div>

            <!-- Categorías -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="small-box box-purple">

                    <div class="inner">
                        <div class="card-label">ORGANIZACIÓN</div>

                        <h3>{{ $total_categorias }}</h3>

                        <p class="description">
                            Categorías registradas
                        </p>
                    </div>

                    <div class="icon">
                        <i class="bi bi-tags"></i>
                    </div>

                    <a href="{{ route('categoria_productos.index') }}"
                       class="small-box-footer">
                        Ver categorías
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>

                </div>
            </div>

            <!-- Clientes -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="small-box box-peach">

                    <div class="inner">
                        <div class="card-label">CLIENTES</div>

                        <h3>{{ $total_clientes }}</h3>

                        <p class="description">
                            Clientes registrados
                        </p>
                    </div>

                    <div class="icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <a href="{{ route('clientes.index') }}"
                       class="small-box-footer">
                        Ver clientes
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>

                </div>
            </div>

            <!-- Sucursales -->
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="small-box box-rose">

                    <div class="inner">
                        <div class="card-label">ESTABLECIMIENTOS</div>

                        <h3>{{ $total_sucursales }}</h3>

                        <p class="description">
                            Sucursales registradas
                        </p>
                    </div>

                    <div class="icon">
                        <i class="bi bi-shop"></i>
                    </div>

                    <a href="{{ route('sucursales.index') }}"
                       class="small-box-footer">
                        Ver sucursales
                        <i class="bi bi-arrow-right-circle"></i>
                    </a>

                </div>
            </div>

        </div>

        <!-- Información inferior -->
        <div class="info-card mt-4">
            <div class="card-body p-4">

                <div class="d-flex align-items-start gap-3">

                    <div class="info-icon">
                        <i class="bi bi-heart-fill"></i>
                    </div>

                    <div>
                        <h5 class="mb-2">
                            Tu espacio de belleza
                        </h5>

                        <p class="mb-0">
                            Desde este panel puedes consultar la información
                            de tu tienda Pink Beauty. Mantén organizados tus
                            productos de maquillaje, administra tus categorías
                            y lleva el control de tus clientes y sucursales
                            de manera sencilla.
                        </p>
                    </div>

                </div>

            </div>
        </div>

        <!-- Pie de página -->
        <div class="footer-text">
            <i class="bi bi-heart-fill me-1"></i>
            Pink Beauty · Tu belleza, tu estilo.
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
