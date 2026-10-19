<x-app-layout>
    <!-- Bootstrap 5 para los modales -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link href="{{ asset('css/crud-admin.css') }}" rel="stylesheet">

    <div class="crud-page crud-theme-pink beauty-crud beauty-crud--productos">
        <div class="container py-4 py-lg-5">
        <nav class="beauty-page__breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door" aria-hidden="true"></i>
                Inicio
            </a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">Productos</span>
        </nav>

        <section class="crud-header beauty-crud__hero">
            <div class="crud-header__content beauty-crud__hero-copy">
                <span class="crud-header__eyebrow beauty-crud__eyebrow">
                    <i class="bi bi-stars" aria-hidden="true"></i>
                    Pink Beauty · Inventario
                </span>
                <h1 class="crud-header__title">
                    <i class="bi bi-bag-heart-fill" aria-hidden="true"></i>
                    Productos
                </h1>
                <p class="crud-header__subtitle">
                    Administra el inventario de tu tienda de belleza desde un solo lugar.
                </p>
            </div>

            <span class="beauty-crud__hero-icon" aria-hidden="true">
                <i class="bi bi-bag-heart-fill"></i>
            </span>

            <div class="crud-header__actions beauty-crud__hero-actions">
                <button type="button" class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#modalAgregar">
                    <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                    Agregar producto
                </button>

               <button type="button" class="btn btn-primary beauty-crud__primary-action"
                      data-bs-toggle="modal" data-bs-target="#modalGraficas">
                    <i class="bi bi-bar-chart-fill"></i>
                   Gráficas
                </button>

            </div>
        </section>

        <section class="crud-summary beauty-crud__summary" aria-label="Resumen de productos">
            <div class="crud-summary__item">
                <span class="crud-summary__icon"><i class="bi bi-bag-heart" aria-hidden="true"></i></span>
                <span class="crud-summary__body">
                    <span class="crud-summary__label">Productos registrados</span>
                    <span class="crud-summary__value">{{ $productos->count() }}</span>
                </span>
            </div>
            <div class="crud-summary__item">
                <span class="crud-summary__icon"><i class="bi bi-stars" aria-hidden="true"></i></span>
                <span class="crud-summary__body">
                    <span class="crud-summary__label">Módulo</span>
                    <span class="crud-summary__value">Inventario</span>
                </span>
            </div>
        </section>

        <!-- Mensaje de éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Revisa los datos del formulario:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Tabla de productos -->
        <section class="crud-table-card beauty-crud__table-card">
            <div class="crud-table-card__header">
                <div>
                    <h2 class="crud-table-card__title beauty-page__table-title beauty-crud__card-heading">
                        <i class="bi bi-palette2" aria-hidden="true"></i>
                        Catálogo de belleza
                    </h2>
                </div>
                <span class="badge text-bg-light border beauty-page__badge">
                    {{ $productos->count() }} registros
                </span>
            </div>
            <div class="crud-table-card__body table-responsive">
                <table class="crud-table table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($productos as $producto)
                            <tr>
                                <td>#{{ $producto->id }}</td>
                                <td class="fw-semibold beauty-crud__item-name">{{ $producto->nombre }}</td>
                                <td><span class="badge text-bg-light border beauty-crud__stock">{{ $producto->stock }}</span></td>
                                <td><span class="beauty-crud__price">${{ number_format($producto->precio, 2) }}</span></td>

                                <td class="crud-table__actions beauty-crud__actions text-nowrap">

                                    <!-- Botón para VER -->
                                    <button type="button" class="btn btn-info btn-sm text-white btn-ver beauty-crud__action beauty-crud__action--view"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalVer"
                                            data-id="{{ $producto->id }}"
                                            data-nombre="{{ $producto->nombre }}"
                                            data-stock="{{ $producto->stock }}"
                                            data-precio="{{ $producto->precio }}">
                                        <i class="bi bi-eye" aria-hidden="true"></i>
                                        Ver
                                    </button>

                                    <!-- Botón para EDITAR -->
                                    <button type="button" class="btn btn-warning btn-sm btn-editar beauty-crud__action beauty-crud__action--edit"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditar"
                                            data-id="{{ $producto->id }}"
                                            data-nombre="{{ $producto->nombre }}"
                                            data-stock="{{ $producto->stock }}"
                                            data-precio="{{ $producto->precio }}"
                                            data-url="{{ route('productos.update', $producto->id) }}">
                                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                        Editar
                                    </button>

                                    <!-- Botón para ELIMINAR -->
                                    <button type="button" class="btn btn-danger btn-sm btn-eliminar beauty-crud__action beauty-crud__action--delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEliminar"
                                            data-nombre="{{ $producto->nombre }}"
                                            data-url="{{ route('productos.destroy', $producto->id) }}">
                                        <i class="bi bi-trash3" aria-hidden="true"></i>
                                        Eliminar
                                    </button>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="crud-table-card__empty beauty-crud__empty">
                                    <i class="bi bi-bag-heart" aria-hidden="true"></i>
                                    <p>Aún no hay productos registrados.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        </div>


    <!-- MODAL AGREGAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalAgregar" tabindex="-1"
         aria-labelledby="tituloAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form action="{{ route('productos.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title beauty-page__modal-title" id="tituloAgregar">
                            <i class="bi bi-bag-plus-fill beauty-page__modal-icon" aria-hidden="true"></i>
                            Agregar producto
                        </h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock"
                                   class="form-control" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" name="precio"
                                   class="form-control" min="0" step="0.01" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            Guardar producto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- MODAL VER -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalVer" tabindex="-1"
         aria-labelledby="tituloVer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title beauty-page__modal-title" id="tituloVer">
                        <i class="bi bi-heart-fill beauty-page__modal-icon" aria-hidden="true"></i>
                        Detalles del producto
                    </h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="verId"></span></p>
                    <p><strong>Nombre:</strong> <span id="verNombre"></span></p>
                    <p><strong>Stock:</strong> <span id="verStock"></span></p>
                    <p><strong>Precio:</strong> $<span id="verPrecio"></span></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cerrar</button>
                </div>

            </div>
        </div>
    </div>


    <!-- MODAL EDITAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalEditar" tabindex="-1"
         aria-labelledby="tituloEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form id="formEditar" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title beauty-page__modal-title" id="tituloEditar">
                            <i class="bi bi-pencil-square beauty-page__modal-icon" aria-hidden="true"></i>
                            Editar producto
                        </h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="editarNombre"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" id="editarStock"
                                   class="form-control" min="0" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" name="precio" id="editarPrecio"
                                   class="form-control" min="0" step="0.01" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-warning">
                            Guardar cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- MODAL ELIMINAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalEliminar" tabindex="-1"
         aria-labelledby="tituloEliminar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form id="formEliminar" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title beauty-page__modal-title" id="tituloEliminar">
                            <i class="bi bi-heartbreak-fill beauty-page__modal-icon" aria-hidden="true"></i>
                            Confirmar eliminación
                        </h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        ¿Estás segura de que deseas eliminar el producto
                        <strong id="eliminarNombre"></strong>?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">
                            Sí, eliminar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL VER GRÁFICAS -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalGraficas" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-bar-chart-fill"></i>
                    Reporte de inventario
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div style="height: 340px;">
                    <canvas id="graficaStock"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JavaScript para cargar los datos en los modales -->
    <script>
        // Mostrar los datos del producto
        document.querySelectorAll('.btn-ver').forEach(boton => {
            boton.addEventListener('click', function () {
                document.getElementById('verId').textContent = this.dataset.id;
                document.getElementById('verNombre').textContent = this.dataset.nombre;
                document.getElementById('verStock').textContent = this.dataset.stock;
                document.getElementById('verPrecio').textContent = this.dataset.precio;
            });
        });

        // Cargar los datos en el formulario de edición
        document.querySelectorAll('.btn-editar').forEach(boton => {
            boton.addEventListener('click', function () {
                document.getElementById('editarNombre').value = this.dataset.nombre;
                document.getElementById('editarStock').value = this.dataset.stock;
                document.getElementById('editarPrecio').value = this.dataset.precio;

                document.getElementById('formEditar').action = this.dataset.url;
            });
        });

        // Preparar la confirmación de eliminación
        document.querySelectorAll('.btn-eliminar').forEach(boton => {
            boton.addEventListener('click', function () {
                document.getElementById('eliminarNombre').textContent = this.dataset.nombre;
                document.getElementById('formEliminar').action = this.dataset.url;
            });
        });
    </script>
    <!-- JavaScript para cargar los datos en el modal de la gráfica-->
     <script>
    const datosGrafica = {{ Illuminate\Support\Js::from($chartData) }};
    let graficaProductos;

    document.getElementById('modalGraficas')
        .addEventListener('shown.bs.modal', function () {
            graficaProductos?.destroy();

            graficaProductos = new Chart(
                document.getElementById('graficaStock'),
                {
                    type: 'bar',
                    data: {
                        labels: datosGrafica.labels,
                        datasets: [{
                            label: 'Unidades en stock',
                            data: datosGrafica.stock,
                            backgroundColor: '#e95d91',
                            borderRadius: 8,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: { beginAtZero: true }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                }
            );
        });
    </script>
</x-app-layout>
