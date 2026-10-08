<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis formularios | APCH DECE</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            padding: 16px;
            background: #f1f5f9;
            color: #1e293b;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page-header {
            position: relative;
            width: 100%;
            min-height: 104px;
            overflow: hidden;
            border: 0;
            border-bottom: 1px solid #e2e8f0;
            border-radius: 20px;
            background: linear-gradient(115deg, #fff 0%, #fff 72%, #fff7f7 100%);
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.07);
        }

        .page-header::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            background: linear-gradient(180deg, #d34848, #8f0000);
            content: "";
        }

        .page-header::after {
            position: absolute;
            inset: auto 0 0;
            height: 4px;
            background: linear-gradient(90deg, #8f0000, #d34848 50%, #8f0000);
            content: "";
        }

        .header-content {
            display: flex;
            min-height: 104px;
            align-items: center;
            justify-content: center;
            padding: 16px 28px;
        }

        .page-title {
            margin: 0;
            color: #a84b55;
            font-size: clamp(21px, 3vw, 28px);
            font-weight: 700;
            letter-spacing: 0.015em;
            line-height: 1.3;
            text-align: center;
        }

        .content {
            width: 100%;
            max-width: 1152px;
            margin: 32px auto;
        }

        .records-card {
            overflow: hidden;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.06);
        }

        .card-heading {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-title {
            margin: 0;
            color: #0f172a;
            font-size: 18px;
        }

        .card-description {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
        }

        .empty-state {
            padding: 48px 24px;
            text-align: center;
        }

        .empty-icon {
            display: flex;
            width: 56px;
            height: 56px;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            border-radius: 50%;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 25px;
        }

        .empty-title {
            margin: 0;
            color: #0f172a;
            font-size: 16px;
        }

        .empty-description {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.5;
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
        }

        .records-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .records-table th,
        .records-table td {
            padding: 15px 18px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .records-table th {
            background: #fff7f7;
            color: #7f1d1d;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .records-table td {
            color: #334155;
            font-size: 14px;
            line-height: 1.5;
        }

        .records-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .record-id {
            color: #991b1b;
            font-weight: 700;
        }

        .record-name {
            min-width: 220px;
            color: #0f172a;
            font-weight: 700;
        }

        .record-status {
            display: inline-flex;
            min-height: 28px;
            align-items: center;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .record-status-saved {
            background: #ecfdf5;
            color: #047857;
        }

        .record-status-edited {
            background: #fef2f2;
            color: #991b1b;
        }

        .record-actions {
            display: flex;
            min-width: 190px;
            gap: 8px;
        }

        .record-action {
            display: inline-flex;
            min-height: 36px;
            align-items: center;
            justify-content: center;
            padding: 7px 12px;
            border: 1px solid #b91c1c;
            border-radius: 8px;
            background: #fff;
            color: #991b1b;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
        }

        .record-action:hover {
            background: #fef2f2;
        }

        .record-action-muted {
            border-color: #cbd5e1;
            background: #f8fafc;
            color: #64748b;
            cursor: not-allowed;
        }

        .pagination {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 16px 24px;
            border-top: 1px solid #e2e8f0;
        }

        .pagination-link {
            display: inline-flex;
            min-height: 38px;
            align-items: center;
            justify-content: center;
            padding: 8px 13px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            color: #334155;
            font-size: 14px;
            text-decoration: none;
        }

        .pagination-link:hover {
            border-color: #b91c1c;
            background: #fef2f2;
            color: #991b1b;
        }

        .pagination-link[aria-disabled="true"] {
            color: #94a3b8;
            cursor: not-allowed;
        }

        .pagination-status {
            color: #64748b;
            font-size: 13px;
            text-align: center;
        }

        @media (max-width: 640px) {
            body {
                padding: 16px;
            }

            .records-table th,
            .records-table td {
                padding: 12px 14px;
            }
        }

        @media (max-width: 420px) {
            .header-content {
                padding: 14px 18px;
            }

            .pagination {
                padding: 14px;
            }
        }
    </style>
</head>
<body>
    <header class="page-header">
        <div class="header-content">
            <h1 class="page-title">Mis Formularios: {{ $nombreFormulario }}</h1>
        </div>
    </header>

    <main class="content">
        <section class="records-card">
            <div class="card-heading">
                <h2 class="card-title">Registros guardados</h2>
                <p class="card-description">
                    Se muestran únicamente los formularios de este tipo que guardaste.
                </p>
            </div>

            @if ($formularios->isEmpty())
                <div class="empty-state">
                    <div class="empty-icon" aria-hidden="true">📄</div>
                    <h3 class="empty-title">Aún no tienes formularios guardados</h3>
                    <p class="empty-description">
                        Cuando guardes uno, aparecerá aquí.
                    </p>
                </div>
            @else
                <div class="table-scroll">
                    <table class="records-table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre formulario</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formularios as $formulario)
                                <tr>
                                    <td class="record-id">#{{ $formulario->id }}</td>
                                    <td class="record-name">{{ $nombreFormulario }}</td>
                                    <td>{{ $formulario->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $formulario->created_at->format('H:i') }}</td>
                                    <td>
                                        @if ($formulario->ediciones < 1)
                                            <span class="record-status record-status-saved">Guardado</span>
                                        @else
                                            <span class="record-status record-status-edited">Editado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="record-actions">
                                            @if ($formulario->pdf_path)
                                                <a
                                                    class="record-action"
                                                    href="{{ route('formularios.pdf', $formulario) }}"
                                                    target="_blank"
                                                    rel="noopener"
                                                >Ver PDF</a>
                                            @else
                                                <span class="record-action record-action-muted" aria-disabled="true">
                                                    PDF pendiente
                                                </span>
                                            @endif

                                            @if ($formulario->ediciones < 1)
                                                <a
                                                    class="record-action"
                                                    href="{{ route('formularios.editar', $formulario) }}"
                                                >Editar</a>
                                            @else
                                                <span class="record-action record-action-muted" aria-disabled="true">
                                                    Edición utilizada
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($formularios->hasPages())
                    <nav class="pagination" aria-label="Paginación de formularios">
                        @if ($formularios->onFirstPage())
                            <span class="pagination-link" aria-disabled="true">Anterior</span>
                        @else
                            <a class="pagination-link" href="{{ $formularios->previousPageUrl() }}">Anterior</a>
                        @endif

                        <span class="pagination-status">
                            Página {{ $formularios->currentPage() }} de {{ $formularios->lastPage() }}
                        </span>

                        @if ($formularios->hasMorePages())
                            <a class="pagination-link" href="{{ $formularios->nextPageUrl() }}">Siguiente</a>
                        @else
                            <span class="pagination-link" aria-disabled="true">Siguiente</span>
                        @endif
                    </nav>
                @endif
            @endif
        </section>
    </main>
</body>
</html>
