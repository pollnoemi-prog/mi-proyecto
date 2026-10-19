<x-app-layout>
    {{-- Recursos visuales compartidos por los módulos administrativos. --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">
    <link href="{{ asset('css/crud-admin.css') }}" rel="stylesheet">

    <div class="crud-page crud-theme-pink beauty-crud beauty-crud--departamentos">
        <div class="container py-4 py-lg-5">
            <nav class="beauty-page__breadcrumb" aria-label="Ruta de navegación">
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door" aria-hidden="true"></i>
                    Inicio
                </a>
                <span aria-hidden="true">/</span>
                <span aria-current="page">Departamentos</span>
            </nav>

            <section class="crud-header beauty-crud__hero" aria-labelledby="departamentos-titulo">
                <div class="crud-header__content beauty-crud__hero-copy">
                    <span class="crud-header__eyebrow beauty-crud__eyebrow">
                        <i class="bi bi-stars" aria-hidden="true"></i>
                        Pink Beauty · Organización
                    </span>
                    <h1 class="crud-header__title" id="departamentos-titulo">
                        <i class="bi bi-diagram-3-fill" aria-hidden="true"></i>
                        Departamentos
                    </h1>
                    <p class="crud-header__subtitle mb-0">
                        Consulta la estructura y las personas responsables de cada área.
                    </p>

                    <div class="beauty-crud__count"
                         aria-label="{{ $departamento_sucursales->count() }} departamentos registrados">
                        <strong>{{ $departamento_sucursales->count() }}</strong>
                        <span>departamentos registrados</span>
                    </div>
                </div>

                <span class="beauty-crud__hero-icon" aria-hidden="true">
                    <i class="bi bi-buildings-fill"></i>
                </span>
            </section>

            <section class="crud-table-card beauty-crud__table-card" aria-labelledby="departamentos-lista-titulo">
                <div class="crud-table-card__header">
                    <div>
                        <span class="beauty-crud__eyebrow">
                            <i class="bi bi-diagram-3-fill" aria-hidden="true"></i>
                            Estructura interna
                        </span>
                        <h2 class="crud-table-card__title beauty-crud__card-heading" id="departamentos-lista-titulo">
                            <i class="bi bi-people-fill" aria-hidden="true"></i>
                            Directorio de departamentos
                        </h2>
                    </div>
                    <span class="badge text-bg-light border beauty-page__badge">
                        {{ $departamento_sucursales->count() }} registros
                    </span>
                </div>

                <div class="crud-table-card__body table-responsive">
                    <table class="crud-table table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Encargado</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($departamento_sucursales as $departamento_sucursal)
                                <tr>
                                    <td>#{{ $departamento_sucursal->id }}</td>
                                    <td class="fw-semibold beauty-crud__item-name">
                                        {{ $departamento_sucursal->nombre }}
                                    </td>
                                    <td>{{ $departamento_sucursal->descripcion }}</td>
                                    <td>
                                        <span class="badge text-bg-light border beauty-crud__stock">
                                            <i class="bi bi-person-fill" aria-hidden="true"></i>
                                            {{ $departamento_sucursal->encargado }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="crud-table-card__empty beauty-crud__empty">
                                        <i class="bi bi-diagram-3" aria-hidden="true"></i>
                                        <p>Aún no hay departamentos registrados.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
