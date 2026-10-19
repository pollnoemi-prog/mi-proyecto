
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="{{ asset('css/crud-admin.css') }}" rel="stylesheet">

    <div class="crud-page crud-theme-lilac beauty-crud beauty-crud--categorias">
        <div class="container py-4 py-lg-5">
            <nav class="beauty-page__breadcrumb" aria-label="Ruta de navegación">
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door" aria-hidden="true"></i>
                    Inicio
                </a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">Categorías</span>
            </nav>

            <section class="crud-header beauty-crud__hero">
                <div class="crud-header__content beauty-crud__hero-copy">
                    <span class="crud-header__eyebrow beauty-crud__eyebrow">
                        <i class="bi bi-stars" aria-hidden="true"></i>
                        Pink Beauty · Catálogo
                    </span>
                    <h1 class="crud-header__title">
                        <i class="bi bi-palette-fill" aria-hidden="true"></i>
                        Categorías
                    </h1>
                    <p class="crud-header__subtitle">
                        Organiza cada producto para que tu catálogo luzca siempre impecable.
                    </p>
                </div>

                <span class="beauty-crud__hero-icon" aria-hidden="true">
                    <i class="bi bi-palette-fill"></i>
                </span>

                <div class="crud-header__actions beauty-crud__hero-actions">
                    <button type="button" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#modalAgregar">
                        <i class="bi bi-plus-circle-fill" aria-hidden="true"></i>
                        Agregar categoría
                    </button>
                </div>
            </section>

            <section class="crud-summary beauty-crud__summary" aria-label="Resumen de categorías">
                <div class="crud-summary__item">
                    <span class="crud-summary__icon"><i class="bi bi-palette2" aria-hidden="true"></i></span>
                    <span class="crud-summary__body">
                        <span class="crud-summary__label">Categorías registradas</span>
                        <span class="crud-summary__value">{{ $categorias->count() }}</span>
                    </span>
                </div>
                <div class="crud-summary__item">
                    <span class="crud-summary__icon"><i class="bi bi-stars" aria-hidden="true"></i></span>
                    <span class="crud-summary__body">
                        <span class="crud-summary__label">Módulo</span>
                        <span class="crud-summary__value">Catálogo</span>
                    </span>
                </div>
            </section>

        <!-- MENSAJES -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <!-- TABLA -->
        <section class="crud-table-card beauty-crud__table-card">
            <div class="crud-table-card__header">
                <div>
                    <h2 class="crud-table-card__title beauty-page__table-title beauty-crud__card-heading">
                        <i class="bi bi-palette2" aria-hidden="true"></i>
                        Categorías de belleza
                    </h2>
                </div>
                <span class="badge text-bg-light border beauty-page__badge">
                    {{ $categorias->count() }} registros
                </span>
            </div>
            <div class="crud-table-card__body table-responsive">
            <table class="crud-table table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categorias as $categoria)
                        <tr>
                            <td>#{{ $categoria->id }}</td>
                            <td class="fw-semibold beauty-crud__item-name">{{ $categoria->nombre }}</td>
                            <td class="text-secondary">{{ $categoria->descripcion }}</td>
                            <td class="crud-table__actions beauty-crud__actions">
                                <!-- VER -->
                                <button type="button" class="btn btn-info btn-sm text-white beauty-crud__action beauty-crud__action--view"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalVer"
                                    data-nombre="{{ $categoria->nombre }}"
                                    data-descripcion="{{ $categoria->descripcion }}">
                                    <i class="bi bi-eye" aria-hidden="true"></i>
                                    Ver
                                </button>

                                <!-- EDITAR -->
                                <button type="button" class="btn btn-warning btn-sm beauty-crud__action beauty-crud__action--edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditar"
                                    data-url="{{ route('categoria_productos.update', $categoria->id) }}"
                                    data-nombre="{{ $categoria->nombre }}"
                                    data-descripcion="{{ $categoria->descripcion }}">
                                    <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                    Editar
                                </button>

                                <!-- ELIMINAR -->
                                <button type="button" class="btn btn-danger btn-sm beauty-crud__action beauty-crud__action--delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar"
                                    data-url="{{ route('categoria_productos.destroy', $categoria->id) }}"
                                    data-nombre="{{ $categoria->nombre }}">
                                    <i class="bi bi-trash3" aria-hidden="true"></i>
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="crud-table-card__empty beauty-crud__empty">
                                <i class="bi bi-palette" aria-hidden="true"></i>
                                <p>Aún no hay categorías registradas.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </section>
    </div>

    <!-- MODAL AGREGAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalAgregar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('categoria_productos.store') }}"
                method="POST" class="modal-content">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title beauty-page__modal-title">
                        <i class="bi bi-palette-fill beauty-page__modal-icon" aria-hidden="true"></i>
                        Agregar categoría
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre"
                        class="form-control mb-3" maxlength="255" required>

                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control"
                        maxlength="500" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL VER -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalVer" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title beauty-page__modal-title">
                        <i class="bi bi-heart-fill beauty-page__modal-icon" aria-hidden="true"></i>
                        Datos de la categoría
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>Nombre:</strong>
                        <span id="verNombre"></span></p>
                    <p><strong>Descripción:</strong>
                        <span id="verDescripcion"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEditar" method="POST" class="modal-content">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title beauty-page__modal-title">
                        <i class="bi bi-pencil-square beauty-page__modal-icon" aria-hidden="true"></i>
                        Editar categoría
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="editarNombre"
                        class="form-control mb-3" maxlength="255" required>

                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion" id="editarDescripcion"
                        class="form-control" maxlength="500" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL ELIMINAR -->
    <div class="modal fade crud-modal beauty-crud-modal" id="modalEliminar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="POST" class="modal-content">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title beauty-page__modal-title">
                        <i class="bi bi-heartbreak-fill beauty-page__modal-icon" aria-hidden="true"></i>
                        Eliminar categoría
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    ¿Deseas eliminar la categoría
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JAVASCRIPT PARA LOS MODALES -->
    <script>
        document.getElementById('modalVer')
            .addEventListener('show.bs.modal', function (event) {
                const boton = event.relatedTarget;

                document.getElementById('verNombre').textContent =
                    boton.dataset.nombre;

                document.getElementById('verDescripcion').textContent =
                    boton.dataset.descripcion || 'Sin descripción';
            });

        document.getElementById('modalEditar')
            .addEventListener('show.bs.modal', function (event) {
                const boton = event.relatedTarget;

                document.getElementById('formEditar').action =
                    boton.dataset.url;

                document.getElementById('editarNombre').value =
                    boton.dataset.nombre;

                document.getElementById('editarDescripcion').value =
                    boton.dataset.descripcion;
            });

        document.getElementById('modalEliminar')
            .addEventListener('show.bs.modal', function (event) {
                const boton = event.relatedTarget;

                document.getElementById('formEliminar').action =
                    boton.dataset.url;

                document.getElementById('eliminarNombre').textContent =
                    boton.dataset.nombre;
            });
    </script>
</x-app-layout>
