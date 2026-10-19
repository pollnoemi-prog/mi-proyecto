<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de envíos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #ffffff;
            color: #222222;
        }

        .tarjeta-envios {
            background-color: #fff;
            border: 1px solid #D9C5B2;
            border-radius: 0;
            overflow: hidden;
        }

        .encabezado-tabla,
        .modal-header {
            background-color: #E68A35;
            color: #222;
            border-bottom: 1px solid #D6B28E;
        }

        .tabla-envios {
            margin-bottom: 0;
        }

        .tabla-envios thead th {
            background-color: #F6E9DC;
            border: 1px solid #D9C5B2;
            padding: 14px 16px;
            white-space: nowrap;
        }

        .tabla-envios tbody td {
            background-color: #fff;
            border: 1px solid #E0D4C8;
            padding: 13px 16px;
        }

        .tabla-envios tbody tr:hover td {
            background-color: #FCF4EC;
        }

        .pie-tabla,
        .modal-footer {
            background-color: #F8EEE4;
            border-top: 1px solid #D9C5B2;
        }

        .acciones-envio {
            min-width: 220px;
            white-space: nowrap;
        }

        .modal-envio .modal-content {
            border: 1px solid #D9C5B2;
            border-radius: 8px;
            overflow: hidden;
        }

        .modal-envio .form-control:focus,
        .modal-envio .form-select:focus {
            border-color: #E68A35;
            box-shadow: 0 0 0 .2rem rgba(230, 138, 53, .20);
        }

        .marco-graficas {
            width: 100%;
            height: 560px;
            border: 0;
            display: block;
            background: #fff;
        }
    </style>
</head>

<body>

<div class="container py-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold">Lista de envíos</h1>
        <p class="text-muted">
            Consulta las direcciones y el estatus de los envíos registrados.
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Revisa los datos ingresados:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card tarjeta-envios shadow-sm">

        <div class="card-header encabezado-tabla p-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <h5 class="mb-0 fw-bold">Información de envíos</h5>

                <div class="d-flex gap-2 flex-wrap">

                    <button type="button"
                            class="btn btn-dark btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modalAgregar">
                        + Nuevo envío
                    </button>

                    <button type="button"
                            class="btn btn-light btn-sm border border-dark"
                            data-bs-toggle="modal"
                            data-bs-target="#modalGraficas">
                        Ver gráficas
                    </button>

                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle tabla-envios">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Dirección</th>
                            <th>Estatus</th>
                            <th class="acciones-envio">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                    @forelse($envios as $envio)

                        <tr>
                            <td class="fw-semibold">{{ $envio->id }}</td>

                            <td>{{ $envio->direccion }}</td>

                            <td>
                                @if($envio->estatus === 'Entregado')
                                    <span class="badge text-bg-success">
                                        {{ $envio->estatus }}
                                    </span>
                                @elseif($envio->estatus === 'En tránsito')
                                    <span class="badge text-bg-primary">
                                        {{ $envio->estatus }}
                                    </span>
                                @else
                                    <span class="badge text-bg-warning">
                                        {{ $envio->estatus }}
                                    </span>
                                @endif
                            </td>

                            <td class="acciones-envio">

                                <button type="button"
                                        class="btn btn-info btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalVer{{ $envio->id }}">
                                    Ver
                                </button>

                                <button type="button"
                                        class="btn btn-warning btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar{{ $envio->id }}">
                                    Editar
                                </button>

                                <form action="{{ route('envios.destroy', $envio->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Deseas eliminar este envío?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>

                            </td>
                        </tr>

                        <!-- MODAL VER -->
                        <div class="modal fade modal-envio"
                             id="modalVer{{ $envio->id }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">
                                            Detalles del envío #{{ $envio->id }}
                                        </h5>

                                        <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                    </div>

                                    <div class="modal-body">
                                        <p>
                                            <strong>ID:</strong>
                                            {{ $envio->id }}
                                        </p>

                                        <p>
                                            <strong>Dirección:</strong>
                                            {{ $envio->direccion }}
                                        </p>

                                        <p class="mb-0">
                                            <strong>Estatus:</strong>
                                            {{ $envio->estatus }}
                                        </p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-secondary"
                                                data-bs-dismiss="modal">
                                            Cerrar
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- MODAL EDITAR -->
                        <div class="modal fade modal-envio"
                             id="modalEditar{{ $envio->id }}"
                             tabindex="-1"
                             aria-hidden="true">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">
                                            Editar envío #{{ $envio->id }}
                                        </h5>

                                        <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"
                                                aria-label="Cerrar"></button>
                                    </div>

                                    <form action="{{ route('envios.update', $envio->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">
                                                    Dirección del envío
                                                </label>

                                                <input type="text"
                                                       name="direccion"
                                                       class="form-control"
                                                       value="{{ $envio->direccion }}"
                                                       maxlength="255"
                                                       required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">
                                                    Estatus del envío
                                                </label>

                                                <select name="estatus"
                                                        class="form-select"
                                                        required>

                                                    <option value="Pendiente"
                                                        {{ $envio->estatus === 'Pendiente' ? 'selected' : '' }}>
                                                        Pendiente
                                                    </option>

                                                    <option value="En tránsito"
                                                        {{ $envio->estatus === 'En tránsito' ? 'selected' : '' }}>
                                                        En tránsito
                                                    </option>

                                                    <option value="Entregado"
                                                        {{ $envio->estatus === 'Entregado' ? 'selected' : '' }}>
                                                        Entregado
                                                    </option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                Cancelar
                                            </button>

                                            <button type="submit" class="btn btn-dark">
                                                Actualizar envío
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                No hay envíos registrados.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        <div class="card-footer pie-tabla p-3">
            <strong>Total de envíos:</strong>
            {{ $envios->count() }}
        </div>

    </div>
</div>

<!-- MODAL AGREGAR -->
<div class="modal fade modal-envio"
     id="modalAgregar"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold">Agregar envío</h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
            </div>

            <form action="{{ route('envios.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Dirección del envío
                        </label>

                        <input type="text"
                               name="direccion"
                               class="form-control"
                               placeholder="Ingresa la dirección"
                               maxlength="255"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Estatus del envío
                        </label>

                        <select name="estatus" class="form-select" required>
                            <option value="" disabled selected>
                                Selecciona un estatus
                            </option>

                            <option value="Pendiente">Pendiente</option>
                            <option value="En tránsito">En tránsito</option>
                            <option value="Entregado">Entregado</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-dark">
                        Guardar envío
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- MODAL DE GRÁFICAS -->
<div class="modal fade modal-envio"
     id="modalGraficas"
     tabindex="-1"
     aria-labelledby="tituloModalGraficas"
     aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="tituloModalGraficas">
                    Gráficas de envíos
                </h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
            </div>

            <div class="modal-body p-0">

                <iframe
                    id="iframeGraficas"
                    data-src="{{ route('graficas.index') }}"
                    title="Gráficas de envíos"
                    class="marco-graficas">
                </iframe>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Cerrar
                </button>
            </div>

        </div>
    </div>
</div>

<div class="container pb-4">
    <a href="{{ url('/home') }}" class="btn btn-primary btn-lg">
        Regresar
    </a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Cargar las gráficas al abrir el modal -->
<script>
    const modalGraficas = document.getElementById('modalGraficas');
    const iframeGraficas = document.getElementById('iframeGraficas');

    modalGraficas.addEventListener('show.bs.modal', function () {
        if (!iframeGraficas.src || iframeGraficas.src === window.location.href) {
            iframeGraficas.src = iframeGraficas.dataset.src;
        }
    });
</script>

</body>
</html>