
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="{{ asset('css/crud-admin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <div class="crud-page crud-theme-yellow beauty-crud beauty-crud--clientes">
        <div class="container py-4 py-lg-5">
        <nav class="beauty-page__breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('dashboard') }}">
                <i class="bi bi-house-door" aria-hidden="true"></i>
                Inicio
            </a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">Clientes</span>
        </nav>

        <section class="crud-header beauty-crud__hero" aria-labelledby="clientes-titulo">
            <div class="crud-header__content beauty-crud__hero-copy">
                <span class="beauty-crud__eyebrow">
                    <i class="bi bi-stars" aria-hidden="true"></i>
                    Pink Beauty · Comunidad
                </span>
                <h1 class="crud-header__title" id="clientes-titulo">
                    <i class="bi bi-people-fill" aria-hidden="true"></i>
                    Clientes
                </h1>
                <p class="crud-header__subtitle mb-0">
                    Cuida y mantén cerca a la comunidad que elige tu belleza.
                </p>

                <div class="beauty-crud__count" aria-label="{{ $clientes->count() }} clientes registrados">
                    <strong>{{ $clientes->count() }}</strong>
                    <span>clientes registrados</span>
                </div>
            </div>

            <div class="crud-header__actions beauty-crud__hero-actions">
                <button class="btn btn-primary beauty-crud__primary-action"
                    data-bs-toggle="modal" data-bs-target="#modalAgregar">
                    <i class="bi bi-person-plus-fill" aria-hidden="true"></i>
                    Agregar cliente
                </button>
            </div>

            <span class="beauty-crud__hero-icon" aria-hidden="true">
                <i class="bi bi-heart-fill"></i>
            </span>
        </section>

        @if(session('success'))
            <div class="alert alert-success crud-alert" role="alert">
                <i class="bi bi-check-circle-fill me-2" aria-hidden="true"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger crud-alert" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <div class="crud-table-card beauty-crud__table-card">
            <div class="crud-table-card__toolbar beauty-crud__table-toolbar">
                <div>
                    <span class="beauty-crud__eyebrow">
                        <i class="bi bi-person-vcard" aria-hidden="true"></i>
                        Directorio de belleza
                    </span>
                    <h2 class="h5 mb-1 beauty-crud__card-heading">Tu comunidad de clientes</h2>
                    <p class="mb-0 text-muted">Gestiona su información de contacto desde una sola vista.</p>
                </div>
            </div>

            <div class="crud-table-card__body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 crud-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->correo }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td class="text-nowrap text-end">
                                <div class="crud-table__actions">
                                <button class="btn btn-info btn-sm text-white crud-action beauty-crud__action beauty-crud__action--view"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalVer"
                                    data-nombre="{{ $cliente->nombre }}"
                                    data-correo="{{ $cliente->correo }}"
                                    data-telefono="{{ $cliente->telefono }}">
                                    <i class="bi bi-eye-fill" aria-hidden="true"></i>
                                    Ver
                                </button>

                                <button class="btn btn-warning btn-sm crud-action beauty-crud__action beauty-crud__action--edit"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEditar"
                                    data-url="{{ route('clientes.update', $cliente->id) }}"
                                    data-nombre="{{ $cliente->nombre }}"
                                    data-correo="{{ $cliente->correo }}"
                                    data-telefono="{{ $cliente->telefono }}">
                                    <i class="bi bi-pencil-fill" aria-hidden="true"></i>
                                    Editar
                                </button>

                                <button class="btn btn-danger btn-sm crud-action beauty-crud__action beauty-crud__action--delete"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalEliminar"
                                    data-url="{{ route('clientes.destroy', $cliente->id) }}"
                                    data-nombre="{{ $cliente->nombre }}">
                                    <i class="bi bi-trash-fill" aria-hidden="true"></i>
                                    Eliminar
                                </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="crud-table-card__empty beauty-crud__empty">
                                <i class="bi bi-people" aria-hidden="true"></i>
                                <p>No hay clientes registrados todavía.</p>
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

    <!-- MODAL AGREGAR -->
    <div class="modal fade" id="modalAgregar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('clientes.store') }}" method="POST"
                class="modal-content crud-modal beauty-crud-modal">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus-fill" aria-hidden="true"></i>
                        Agregar cliente
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre"
                        class="form-control mb-3" required>

                    <label class="form-label">Correo</label>
                    <input type="email" name="correo"
                        class="form-control mb-3" required>

                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono"
                        class="form-control" maxlength="20" required>
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
    <div class="modal fade" id="modalVer" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content crud-modal beauty-crud-modal">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-vcard-fill" aria-hidden="true"></i>
                        Datos del cliente
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p><strong>Nombre:</strong> <span id="verNombre"></span></p>
                    <p><strong>Correo:</strong> <span id="verCorreo"></span></p>
                    <p><strong>Teléfono:</strong> <span id="verTelefono"></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDITAR -->
    <div class="modal fade" id="modalEditar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEditar" method="POST" class="modal-content crud-modal beauty-crud-modal">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil-square" aria-hidden="true"></i>
                        Editar cliente
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" id="editarNombre"
                        class="form-control mb-3" required>

                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" id="editarCorreo"
                        class="form-control mb-3" required>

                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" id="editarTelefono"
                        class="form-control" maxlength="20" required>
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
    <div class="modal fade" id="modalEliminar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formEliminar" method="POST" class="modal-content crud-modal beauty-crud-modal">
                @csrf
                @method('DELETE')

                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                        Eliminar cliente
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    ¿Deseas eliminar al cliente
                    <strong id="eliminarNombre"></strong>?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('modalVer')
            .addEventListener('show.bs.modal', function (event) {
                const boton = event.relatedTarget;

                document.getElementById('verNombre').textContent =
                    boton.dataset.nombre;
                document.getElementById('verCorreo').textContent =
                    boton.dataset.correo;
                document.getElementById('verTelefono').textContent =
                    boton.dataset.telefono;
            });

        document.getElementById('modalEditar')
            .addEventListener('show.bs.modal', function (event) {
                const boton = event.relatedTarget;

                document.getElementById('formEditar').action =
                    boton.dataset.url;
                document.getElementById('editarNombre').value =
                    boton.dataset.nombre;
                document.getElementById('editarCorreo').value =
                    boton.dataset.correo;
                document.getElementById('editarTelefono').value =
                    boton.dataset.telefono;
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
