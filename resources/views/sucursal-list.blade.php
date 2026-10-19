<x-app-layout>
    {{-- Bootstrap 5.3.3 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="{{ asset('css/crud-admin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <div class="crud-page crud-theme-red beauty-crud beauty-crud--sucursales">
        <div class="container py-4 py-lg-5">

        <nav class="beauty-page__breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door" aria-hidden="true"></i>
                Inicio
            </a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">Sucursales</span>
        </nav>

        {{-- Encabezado --}}
        <section class="crud-header beauty-crud__hero" aria-labelledby="sucursales-titulo">
            <div class="crud-header__content beauty-crud__hero-copy">
                <span class="beauty-crud__eyebrow">
                    <i class="bi bi-stars" aria-hidden="true"></i>
                    Pink Beauty · Establecimientos
                </span>
                <h1 class="crud-header__title" id="sucursales-titulo">
                    <i class="bi bi-buildings-fill" aria-hidden="true"></i>
                    Sucursales
                </h1>
                <p class="crud-header__subtitle mb-0">
                    Organiza los espacios donde Pink Beauty recibe a su comunidad.
                </p>

                <div class="beauty-crud__count" aria-label="{{ $sucursales->count() }} sucursales registradas">
                    <strong>{{ $sucursales->count() }}</strong>
                    <span>sucursales registradas</span>
                </div>
            </div>

            <div class="crud-header__actions beauty-crud__hero-actions">
                <button class="btn btn-primary beauty-crud__primary-action"
                        data-bs-toggle="modal"
                        data-bs-target="#modalAgregar">
                    <i class="bi bi-building-add" aria-hidden="true"></i>
                    Agregar sucursal
                </button>
            </div>

            <span class="beauty-crud__hero-icon" aria-hidden="true">
                <i class="bi bi-shop-window"></i>
            </span>
        </section>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div class="alert alert-success crud-alert" role="alert">
                <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger crud-alert" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
                <strong>Revisa los datos del formulario:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tabla de sucursales --}}
        <div class="crud-table-card beauty-crud__table-card">
            <div class="crud-table-card__toolbar beauty-crud__table-toolbar">
                <div>
                    <span class="beauty-crud__eyebrow">
                        <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                        Mapa de belleza
                    </span>
                    <h2 class="h5 mb-1 beauty-crud__card-heading">Tu red de sucursales</h2>
                    <p class="mb-0 text-muted">Consulta sus datos de contacto y ubicación.</p>
                </div>
            </div>

            <div class="crud-table-card__body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 crud-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($sucursales as $sucursal)
                            <tr>
                                <td>{{ $sucursal->id }}</td>
                                <td>{{ $sucursal->nombre }}</td>
                                <td>{{ $sucursal->direccion }}</td>
                                <td>{{ $sucursal->correo }}</td>
                                <td>{{ $sucursal->telefono }}</td>

                                <td class="text-nowrap text-end">
                                    <div class="crud-table__actions">

                                    {{-- Botón VER --}}
                                    <button type="button"
                                            class="btn btn-info btn-sm btn-ver crud-action beauty-crud__action beauty-crud__action--view"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalVer"
                                            data-id="{{ $sucursal->id }}"
                                            data-nombre="{{ $sucursal->nombre }}"
                                            data-direccion="{{ $sucursal->direccion }}"
                                            data-correo="{{ $sucursal->correo }}"
                                            data-telefono="{{ $sucursal->telefono }}">
                                        <i class="bi bi-eye-fill" aria-hidden="true"></i>
                                        Ver
                                    </button>

                                    {{-- Botón EDITAR --}}
                                    <button type="button"
                                            class="btn btn-warning btn-sm btn-editar crud-action beauty-crud__action beauty-crud__action--edit"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEditar"
                                            data-id="{{ $sucursal->id }}"
                                            data-nombre="{{ $sucursal->nombre }}"
                                            data-direccion="{{ $sucursal->direccion }}"
                                            data-correo="{{ $sucursal->correo }}"
                                            data-telefono="{{ $sucursal->telefono }}"
                                            data-url="{{ route('sucursales.update', $sucursal->id) }}">
                                        <i class="bi bi-pencil-fill" aria-hidden="true"></i>
                                        Editar
                                    </button>

                                    {{-- Botón ELIMINAR --}}
                                    <button type="button"
                                            class="btn btn-danger btn-sm btn-eliminar crud-action beauty-crud__action beauty-crud__action--delete"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalEliminar"
                                            data-nombre="{{ $sucursal->nombre }}"
                                            data-url="{{ route('sucursales.destroy', $sucursal->id) }}">
                                        <i class="bi bi-trash-fill" aria-hidden="true"></i>
                                        Eliminar
                                    </button>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="crud-table-card__empty beauty-crud__empty">
                                    <i class="bi bi-buildings" aria-hidden="true"></i>
                                    <p>No hay sucursales registradas todavía.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- MODAL AGREGAR --}}
    <div class="modal fade" id="modalAgregar" tabindex="-1"
         aria-labelledby="tituloAgregar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content crud-modal beauty-crud-modal">

                <form action="{{ route('sucursales.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="tituloAgregar">
                            <i class="bi bi-building-add" aria-hidden="true"></i>
                            Agregar sucursal
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
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono"
                                   class="form-control" required maxlength="20">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Guardar sucursal
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- MODAL VER --}}
    <div class="modal fade" id="modalVer" tabindex="-1"
         aria-labelledby="tituloVer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content crud-modal beauty-crud-modal">

                <div class="modal-header">
                    <h5 class="modal-title" id="tituloVer">
                        <i class="bi bi-building-fill" aria-hidden="true"></i>
                        Detalles de la sucursal
                    </h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>ID:</strong> <span id="verId"></span></p>
                    <p><strong>Nombre:</strong> <span id="verNombre"></span></p>
                    <p><strong>Dirección:</strong> <span id="verDireccion"></span></p>
                    <p><strong>Correo:</strong> <span id="verCorreo"></span></p>
                    <p><strong>Teléfono:</strong> <span id="verTelefono"></span></p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL EDITAR --}}
    <div class="modal fade" id="modalEditar" tabindex="-1"
         aria-labelledby="tituloEditar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content crud-modal beauty-crud-modal">

                <form id="formEditar" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="tituloEditar">
                            <i class="bi bi-pencil-square" aria-hidden="true"></i>
                            Editar sucursal
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
                            <label class="form-label">Dirección</label>
                            <input type="text" name="direccion" id="editarDireccion"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" id="editarCorreo"
                                   class="form-control" required maxlength="255">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" id="editarTelefono"
                                   class="form-control" required maxlength="20">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-warning">
                            Guardar cambios
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- MODAL ELIMINAR --}}
    <div class="modal fade" id="modalEliminar" tabindex="-1"
         aria-labelledby="tituloEliminar" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content crud-modal beauty-crud-modal">

                <form id="formEliminar" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="tituloEliminar">
                            <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                            Confirmar eliminación
                        </h5>
                        <button type="button" class="btn-close"
                                data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        ¿Estás segura de que deseas eliminar la sucursal
                        <strong id="eliminarNombre"></strong>?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-danger">
                            Sí, eliminar
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- Bootstrap JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- JavaScript para cargar los datos en los modales --}}
    <script>
        // Mostrar los datos de la sucursal
        document.querySelectorAll('.btn-ver').forEach(boton => {
            boton.addEventListener('click', function () {
                document.getElementById('verId').textContent = this.dataset.id;
                document.getElementById('verNombre').textContent = this.dataset.nombre;
                document.getElementById('verDireccion').textContent = this.dataset.direccion;
                document.getElementById('verCorreo').textContent = this.dataset.correo;
                document.getElementById('verTelefono').textContent = this.dataset.telefono;
            });
        });

        // Cargar los datos en el formulario de edición
        document.querySelectorAll('.btn-editar').forEach(boton => {
            boton.addEventListener('click', function () {
                document.getElementById('editarNombre').value = this.dataset.nombre;
                document.getElementById('editarDireccion').value = this.dataset.direccion;
                document.getElementById('editarCorreo').value = this.dataset.correo;
                document.getElementById('editarTelefono').value = this.dataset.telefono;

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
</x-app-layout>
