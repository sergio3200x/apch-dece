
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO</title>

<style>
    @page {
        size: A4;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    :root {
        --zoom-documento: 1;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        color: #000;
    }

    body {
        background: #e5e5e5;
        font-family: Carlito, Arial, Helvetica, sans-serif;
        font-size: 10pt;
        padding: 0;
    }

    /* =========================
       BARRA DE HERRAMIENTAS
       ========================= */

    .toolbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 8px;
        padding: 12px 15px;
        background: #ffffff;
        border-bottom: 1px solid #d0d0d0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        font-family: Arial, sans-serif;
    }

    .toolbar button {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 15px;
        cursor: pointer;
        border: 1px solid #b8b8b8;
        border-radius: 6px;
        background: #f5f5f5;
        color: #222;
        transition: background 0.15s ease, border-color 0.15s ease;
    }

    .toolbar button:hover {
        background: #e9e9e9;
        border-color: #999;
    }

    .btn-volver {
        background: #f5f5f5 !important;
    }

    .btn-borrar {
        color: #a00000 !important;
        border-color: #d0a0a0 !important;
        background: #fff7f7 !important;
    }

    .btn-borrar:hover {
        background: #ffecec !important;
    }

    .btn-imprimir {
        color: #fff !important;
        background: #b00000 !important;
        border-color: #900000 !important;
        font-weight: bold !important;
    }

    .btn-imprimir:hover {
        background: #900000 !important;
    }

    /* =========================
       CONTROL DE ZOOM
       ========================= */

    .zoom-control {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-left: 5px;
        padding: 3px;
        border: 1px solid #d0d0d0;
        border-radius: 7px;
        background: #f7f7f7;
    }

    .zoom-control .btn-zoom {
        width: 34px;
        height: 32px;
        padding: 0;
        font-size: 20px;
        line-height: 1;
        border: 1px solid #c5c5c5;
        background: #fff;
    }

    .zoom-label {
        min-width: 52px;
        text-align: center;
        font-size: 13px;
        font-weight: bold;
        color: #333;
    }

    .btn-reset {
        height: 32px !important;
        padding: 0 10px !important;
        font-size: 13px !important;
    }

    /* =========================
       ESTADO DE GUARDADO
       ========================= */

    .estado-guardado {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-left: 4px;
        padding: 7px 10px;
        font-family: Arial, sans-serif;
        font-size: 13px;
        color: #555;
        white-space: nowrap;
    }

    .estado-punto {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #3b8f3b;
        display: inline-block;
    }

    /* =========================
       CONTENEDOR DEL DOCUMENTO
       ========================= */

    .documento {
        width: 100%;
        overflow-x: auto;
        overflow-y: visible;
        padding: 25px 20px 40px;
    }

    /* =========================
       HOJA A4
       ========================= */

    .page {
        width: 210mm;
        height: 297mm;
        position: relative;
        margin: 0 auto 25px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.20);
        page-break-after: always;
        break-after: page;
        zoom: var(--zoom-documento, 1);
        transform-origin: top center;
    }

    .page:last-of-type {
        page-break-after: auto;
        break-after: auto;
    }

    /* =========================
       ENCABEZADO INSTITUCIONAL
       ========================= */

    .institution-header {
        position: absolute;
        top: 7.5mm;
        left: 31.7mm;
        width: 147mm;
        height: 20.5mm;
        border-bottom: 1.2mm solid #000;
        font-family: "Times New Roman", Times, serif;
    }

    .institution-header img {
        position: absolute;
        left: 6.5mm;
        top: 0.5mm;
        width: 15.4mm;
        height: 17.3mm;
        object-fit: contain;
    }

    .institution-text {
        position: absolute;
        left: 34mm;
        top: -0.3mm;
        width: 88mm;
        text-align: center;
        line-height: 1.05;
        white-space: nowrap;
    }

    .institution-text .line1 {
        font-size: 14pt;
    }

    .institution-text .line2 {
        font-size: 16pt;
    }

    .institution-text .line3 {
        margin-top: 0.8mm;
        font-size: 11pt;
    }

    /* =========================
       CONTENEDORES PRINCIPALES
       ========================= */

    .form-box {
        position: absolute;
        left: 15mm;
        width: 180mm;
        border: 0.55mm solid #000;
    }

    .page1-box {
        top: 32.8mm;
        height: 212.3mm;
    }

    .page2-box {
        top: 32.8mm;
        height: 259.4mm;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        margin: 0;
    }

    td,
    th {
        border: 0.25mm solid #000;
        padding: 1.2mm 1.7mm;
        vertical-align: top;
    }

    .thick {
        border-width: 0.5mm !important;
    }

    /* =========================
       PRIMERA PÁGINA
       ========================= */

    .title-cell {
        height: 14.8mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 12pt;
        font-family: Carlito, Arial, Helvetica, sans-serif;
    }

    .section-title {
        height: 4.6mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 10pt;
        padding-top: 0.5mm;
        padding-bottom: 0.5mm;
    }

    .data-row {
        height: 5.7mm;
        vertical-align: middle;
    }

    .data-row td {
        vertical-align: middle;
        padding-top: 0.6mm;
        padding-bottom: 0.6mm;
    }

    .diagnostic {
        height: 41.2mm;
        font-size: 9pt;
        line-height: 1.55;
    }

    .diagnostic strong {
        font-size: 10pt;
    }

    .intervention-row {
        height: 6mm;
        font-size: 10pt;
        font-weight: bold;
        vertical-align: middle;
        white-space: nowrap;
    }

    .intervention-row .normal {
        font-weight: normal;
        position: absolute;
        top: 0.7mm;
        height: 4mm;
        line-height: 4mm;
    }

    .intervention-row .opt-individual {
        left: 78mm;
    }

    .intervention-row .opt-familiar {
        left: 106mm;
    }

    .intervention-row .opt-grupal {
        left: 134mm;
    }

    .intervention-row td {
        position: relative;
    }

    .actions-title {
        height: 4.5mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 10pt;
        padding-top: 0.4mm;
        padding-bottom: 0.4mm;
    }

    .actions-head {
        height: 15.8mm;
        font-weight: bold;
        font-size: 10pt;
        line-height: 1.25;
        vertical-align: top;
    }

    .actions-row {
        height: 21.5mm;
    }

    /* =========================
       FIRMA
       ========================= */

    .signature-box {
        position: absolute;
        left: 15mm;
        top: 247.2mm;
        width: 180mm;
        height: 36.2mm;
        border: 0.55mm solid #000;
    }

    .signature-inner {
        width: 100%;
        border-collapse: collapse;
    }

    .signature-title {
        height: 12.5mm;
        text-align: center;
        vertical-align: bottom;
        font-weight: bold;
        font-size: 10pt;
        padding-bottom: 1.5mm;
    }

    .name-row {
        height: 10mm;
        font-weight: bold;
        vertical-align: middle;
    }

    .confidential {
        height: 11mm;
        font-style: italic;
        font-size: 10pt;
        line-height: 1.25;
        vertical-align: top;
    }

    .citation {
        position: absolute;
        left: 17mm;
        top: 284.6mm;
        font-family: "Times New Roman", Times, serif;
        font-size: 8pt;
        white-space: nowrap;
    }

    /* =========================
       SEGUNDA PÁGINA
       ========================= */

    .page2-blank-header {
        height: 14.7mm;
        border-bottom: 0.55mm solid #000;
    }

    .follow-title {
        height: 14.5mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 12pt;
    }

    .follow-subtitle {
        height: 4.8mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 10pt;
        padding-top: 0.5mm;
        padding-bottom: 0.5mm;
    }

    .follow-head {
        height: 17.8mm;
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
        font-size: 10pt;
        line-height: 1.05;
        padding: 1.1mm 1.5mm;
    }

    .follow-row {
        height: 21.4mm;
    }

    .follow-confidential {
        height: 11mm;
        font-style: italic;
        font-size: 10pt;
        line-height: 1.25;
        vertical-align: top;
    }

    /* =========================
       CAMPOS
       ========================= */

    input[type="text"],
    input[type="date"],
    textarea {
        width: 100%;
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        border-radius: 0;
        background: transparent;
        color: #000;
        font: inherit;
        resize: none;
    }

    input[type="text"],
    input[type="date"] {
        height: 4.5mm;
    }

    textarea {
        height: 100%;
        min-height: 24mm;
    }

    .inline-field {
        display: inline-block;
        vertical-align: middle;
        height: 4.5mm;
    }

    .student-field {
        width: 100mm;
    }

    .course-field {
        width: 55mm;
    }

    .day-field {
        width: 30mm;
    }

    .teacher-field {
        width: 55mm;
    }

    .date-field {
        width: 38mm;
    }

    .diagnostic-input {
        height: 30mm;
        border-bottom: none;
    }

    .cell-input,
    .cell-textarea {
        height: 100%;
        min-height: 17mm;
    }

    /* =========================
       CHECKBOX
       ========================= */

    .check-wrap {
        display: inline-flex;
        align-items: center;
        gap: 1mm;
        margin-left: 2mm;
        font-weight: normal;
        white-space: nowrap;
    }

    input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 3.3mm;
        height: 3.3mm;
        border: 0.25mm solid #000;
        border-radius: 0;
        vertical-align: middle;
        margin: 0;
        padding: 0;
        background: #fff;
    }

    input[type="checkbox"]:checked::after {
        content: "✓";
        display: block;
        font-size: 9pt;
        line-height: 3mm;
        text-align: center;
    }

    /* =========================
       IMPRESIÓN
       ========================= */

    @media print {

        html,
        body {
            width: 210mm;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        .toolbar {
            display: none !important;
        }

        .documento {
            width: auto;
            overflow: visible;
            padding: 0;
        }

        .page {
            width: 210mm;
            height: 297mm;
            margin: 0;
            box-shadow: none;
            overflow: hidden;
            zoom: 1 !important;
        }

        .page:last-of-type {
            page-break-after: auto;
            break-after: auto;
        }
    }
</style>
</head>

<body>

<!-- =========================
     BARRA DE HERRAMIENTAS
     ========================= -->

<div class="toolbar">

    <button
        type="button"
        class="btn-volver"
        onclick="volver()"
    >
        ↩ Volver
    </button>

    <button
        type="button"
        class="btn-borrar"
        onclick="borrarTodo()"
    >
        🗑 Borrar todo
    </button>

    <div class="zoom-control">

        <button
            type="button"
            class="btn-zoom"
            onclick="disminuirZoom()"
            title="Reducir tamaño"
        >
            −
        </button>

        <span
            class="zoom-label"
            id="zoomLabel"
        >
            100%
        </span>

        <button
            type="button"
            class="btn-zoom"
            onclick="aumentarZoom()"
            title="Aumentar tamaño"
        >
            +
        </button>

        <button
            type="button"
            class="btn-reset"
            onclick="restablecerZoom()"
            title="Ajustar al tamaño de la pantalla"
        >
            Ajustar
        </button>

    </div>

    <button
        type="button"
        class="btn-imprimir"
        onclick="guardarEImprimir()"
    >
        🖨 Guardar e imprimir
    </button>

    <div
        class="estado-guardado"
        id="estadoGuardado"
    >
        <span class="estado-punto"></span>
        <span id="textoEstado">Guardado</span>
    </div>

</div>


<!-- =========================
     CONTENEDOR DEL DOCUMENTO
     ========================= -->

<div class="documento">


<!-- =========================
     PÁGINA 1
     ========================= -->

<section class="page">

    <header class="institution-header">

        <img
            src="{{ asset('images/logo-apch.png') }}"
            alt="Logo institucional"
        >

        <div class="institution-text">
            <div class="line1">UNIDAD EDUCATIVA</div>
            <div class="line2">“ANGEL POLIBIO CHAVES”</div>
            <div class="line3">San Miguel - Provincia Bolívar - Ecuador</div>
        </div>

    </header>


    <div class="form-box page1-box">

        <table>

            <colgroup>
                <col style="width:25%">
                <col style="width:25%">
                <col style="width:25%">
                <col style="width:25%">
            </colgroup>


            <tr>
                <td colspan="4" class="title-cell thick">
                    PLAN DE ATENCIÓN PSICOSOCIAL Y SEGUIMIENTO
                </td>
            </tr>


            <tr>
                <td colspan="4" class="section-title thick">
                    DATOS INFORMATIVOS GENERALES
                </td>
            </tr>


            <tr class="data-row">

                <td colspan="4">

                    Nombre de estudiante a atender:

                    <span class="inline-field student-field">
                        <input
                            type="text"
                            aria-label="Nombre de estudiante a atender"
                        >
                    </span>

                </td>

            </tr>


            <tr class="data-row">

                <td colspan="2">

                    Curso y paralelo:

                    <span class="inline-field course-field">
                        <input
                            type="text"
                            aria-label="Curso y paralelo"
                        >
                    </span>

                </td>


                <td colspan="2">

                    Jornada:

                    <span class="inline-field day-field">
                        <input
                            type="text"
                            aria-label="Jornada"
                        >
                    </span>

                </td>

            </tr>


            <tr class="data-row">

                <td colspan="2">

                    Nombre docente tutor/a:

                    <span class="inline-field teacher-field">
                        <input
                            type="text"
                            aria-label="Nombre docente tutor/a"
                        >
                    </span>

                </td>


                <td colspan="2">

                    Fecha de elaboración del plan:

                    <span class="inline-field date-field">
                        <input
                            type="date"
                            aria-label="Fecha de elaboración del plan"
                        >
                    </span>

                </td>

            </tr>


            <tr>

                <td colspan="4" class="diagnostic thick">

                    <strong>
                        Resumen del diagnóstico situacional:
                    </strong>

                    Sintetizar la información que motiva de la atención psicosocial
                    (ficha notificación de alerta; ficha de observación; entrevista)

                    <textarea
                        class="diagnostic-input"
                        aria-label="Resumen del diagnóstico situacional"
                    ></textarea>

                </td>

            </tr>


            <tr class="intervention-row thick">

                <td colspan="4">

                    Tipo o tipos de intervención psicosocial a realizar:


                    <span class="normal check-wrap opt-individual">

                        <input
                            type="checkbox"
                            aria-label="Intervención individual"
                        >

                        Individual ( )

                    </span>


                    <span class="normal check-wrap opt-familiar">

                        <input
                            type="checkbox"
                            aria-label="Intervención familiar"
                        >

                        Familiar ( )

                    </span>


                    <span class="normal check-wrap opt-grupal">

                        <input
                            type="checkbox"
                            aria-label="Intervención grupal"
                        >

                        Grupal ( )

                    </span>

                </td>

            </tr>


            <tr>

                <td colspan="4" class="actions-title thick">

                    Acciones para implementar para la atención psicosocial

                </td>

            </tr>


            <tr class="actions-head">

                <th class="thick">
                    Acciones para implementar
                </th>

                <th class="thick">
                    Profesional que ejecutará la acción
                </th>

                <th class="thick">
                    Tiempo en que se ejecutará la acción<br>
                    (días/semanas/meses)
                </th>

                <th class="thick">
                    Observaciones
                </th>

            </tr>


            <tr class="actions-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Acción 1"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Profesional acción 1"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Tiempo acción 1"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Observaciones acción 1"
                    ></textarea>
                </td>

            </tr>


            <tr class="actions-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Acción 2"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Profesional acción 2"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Tiempo acción 2"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Observaciones acción 2"
                    ></textarea>
                </td>

            </tr>


            <tr class="actions-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Acción 3"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Profesional acción 3"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Tiempo acción 3"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Observaciones acción 3"
                    ></textarea>
                </td>

            </tr>


            <tr class="actions-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Acción 4"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Profesional acción 4"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Tiempo acción 4"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Observaciones acción 4"
                    ></textarea>
                </td>

            </tr>


            <tr class="actions-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Acción 5"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Profesional acción 5"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Tiempo acción 5"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Observaciones acción 5"
                    ></textarea>
                </td>

            </tr>

        </table>

    </div>


    <div class="signature-box">

        <table class="signature-inner">

            <tr>

                <td class="signature-title">

                    Firma profesional del Departamento de Consejería Estudiantil que elabora el plan

                </td>

            </tr>


            <tr>

                <td class="name-row">

                    Nombre profesional DECE:

                    <span
                        class="inline-field"
                        style="width:105mm;"
                    >
                        <input
                            type="text"
                            aria-label="Nombre profesional DECE"
                        >
                    </span>

                </td>

            </tr>


            <tr>

                <td class="confidential">

                    *La información registrada en este documento es confidencial y de uso exclusivo del Departamento de Consejería Estudiantil

                </td>

            </tr>

        </table>

    </div>


    <div class="citation">

        *Ministerio de Educación (2023).
        <i>
            Modelo de Gestión del Departamento de Consejería Estudiantil.
        </i>
        &nbsp;&nbsp; Quito: Ecuador.

    </div>

</section>


<!-- =========================
     PÁGINA 2
     ========================= -->

<section class="page">

    <header class="institution-header">

        <img
            src="{{ asset('images/logo-apch.png') }}"
            alt="Logo institucional"
        >

        <div class="institution-text">
            <div class="line1">UNIDAD EDUCATIVA</div>
            <div class="line2">“ANGEL POLIBIO CHAVES”</div>
            <div class="line3">San Miguel - Provincia Bolívar - Ecuador</div>
        </div>

    </header>


    <div class="form-box page2-box">

        <table>

            <colgroup>
                <col style="width:21.5%">
                <col style="width:30.0%">
                <col style="width:12.0%">
                <col style="width:12.0%">
                <col style="width:24.5%">
            </colgroup>


            <tr>

                <td
                    colspan="5"
                    class="page2-blank-header thick"
                ></td>

            </tr>


            <tr>

                <td
                    colspan="5"
                    class="follow-title thick"
                >

                    SEGUIMIENTO DE LA ATENCIÓN PSICOSOCIAL

                </td>

            </tr>


            <tr>

                <td
                    colspan="5"
                    class="follow-subtitle thick"
                >

                    Acciones implementadas para la atención psicosocial

                </td>

            </tr>


            <tr class="follow-head">

                <th class="thick">

                    Tipo de intervención realizada
                    (individual, familiar o grupal, en crisis)

                </th>

                <th class="thick">

                    Descripción de la atención psicosocial realizada

                </th>

                <th class="thick">

                    Profesional que realiza la atención psicosocial

                </th>

                <th class="thick">

                    Fecha de atención

                </th>

                <th class="thick">

                    Observaciones

                </th>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 1 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 1 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 1 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 1 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 1 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 2 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 2 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 2 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 2 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 2 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 3 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 3 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 3 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 3 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 3 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 4 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 4 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 4 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 4 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 4 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 5 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 5 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 5 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 5 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 5 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 6 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 6 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 6 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 6 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 6 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 7 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 7 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 7 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 7 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 7 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 8 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 8 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 8 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 8 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 8 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr class="follow-row">

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 9 tipo de intervención"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 9 descripción"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 9 profesional"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 9 fecha"
                    ></textarea>
                </td>

                <td>
                    <textarea
                        class="cell-textarea"
                        aria-label="Seguimiento 9 observaciones"
                    ></textarea>
                </td>

            </tr>


            <tr>

                <td
                    colspan="5"
                    class="follow-confidential thick"
                >

                    *La información registrada en este documento es confidencial y de uso exclusivo del Departamento de Consejería Estudiantil

                </td>

            </tr>

        </table>

    </div>

</section>


</div>


<!-- =========================
     BORRADOR AUTOMÁTICO
     ========================= -->

<script>

const CLAVE_BORRADOR =
    "apch_plan_atencion_psicosocial_borrador";


function actualizarEstadoGuardado(texto) {

    const textoEstado =
        document.getElementById("textoEstado");

    if (textoEstado) {
        textoEstado.textContent = texto;
    }

}


function obtenerCampos() {

    return document.querySelectorAll(
        ".page input, .page textarea"
    );

}


function guardarBorrador() {

    const campos =
        obtenerCampos();

    const datos = {};

    campos.forEach((campo, index) => {

        if (campo.type === "checkbox") {

            datos[index] = {
                tipo: "checkbox",
                valor: campo.checked
            };

        } else {

            datos[index] = {
                tipo: "texto",
                valor: campo.value
            };

        }

    });


    localStorage.setItem(
        CLAVE_BORRADOR,
        JSON.stringify(datos)
    );

    actualizarEstadoGuardado("Guardado");

}


function cargarBorrador() {

    const borrador =
        localStorage.getItem(
            CLAVE_BORRADOR
        );

    if (!borrador) {

        actualizarEstadoGuardado(
            "Sin datos guardados"
        );

        return;
    }


    try {

        const datos =
            JSON.parse(borrador);

        const campos =
            obtenerCampos();


        campos.forEach((campo, index) => {

            if (!datos[index]) {
                return;
            }


            if (campo.type === "checkbox") {

                campo.checked =
                    datos[index].valor;

            } else {

                campo.value =
                    datos[index].valor || "";

            }

        });


        actualizarEstadoGuardado(
            "Borrador cargado"
        );


    } catch (error) {

        console.error(
            "Error al cargar el borrador:",
            error
        );

        actualizarEstadoGuardado(
            "Error al cargar"
        );

    }

}


function borrarTodo() {

    const confirmar =
        confirm(
            "¿Está seguro de que desea borrar toda la información del formulario?"
        );


    if (!confirmar) {
        return;
    }


    const campos =
        obtenerCampos();


    campos.forEach(campo => {

        if (campo.type === "checkbox") {

            campo.checked = false;

        } else {

            campo.value = "";

        }

    });


    localStorage.removeItem(
        CLAVE_BORRADOR
    );


    actualizarEstadoGuardado(
        "Sin datos guardados"
    );


    alert(
        "Todos los datos del formulario fueron borrados."
    );

}


function volver() {

    window.history.back();

}


function guardarEImprimir() {

    guardarBorrador();

    window.print();

}


/* =========================
   ZOOM
   ========================= */

const ZOOM_MINIMO = 0.80;
const ZOOM_MAXIMO = 1.70;
const ZOOM_PASO = 0.10;

let zoomActual = 1;


function aplicarZoom() {

    document.documentElement.style.setProperty(
        "--zoom-documento",
        zoomActual
    );


    const zoomLabel =
        document.getElementById("zoomLabel");


    if (zoomLabel) {

        zoomLabel.textContent =
            Math.round(zoomActual * 100) + "%";

    }

}


function calcularZoomAutomatico() {

    const anchoDisponible =
        window.innerWidth - 80;

    const anchoA4 =
        793.7;


    let zoomCalculado =
        (anchoDisponible * 0.92) /
        anchoA4;


    zoomCalculado =
        Math.max(
            ZOOM_MINIMO,
            Math.min(
                ZOOM_MAXIMO,
                zoomCalculado
            )
        );


    zoomCalculado =
        Math.round(
            zoomCalculado * 10
        ) / 10;


    zoomActual =
        zoomCalculado;


    aplicarZoom();

}


function aumentarZoom() {

    zoomActual += ZOOM_PASO;


    if (zoomActual > ZOOM_MAXIMO) {

        zoomActual =
            ZOOM_MAXIMO;

    }


    zoomActual =
        Math.round(
            zoomActual * 10
        ) / 10;


    aplicarZoom();

}


function disminuirZoom() {

    zoomActual -= ZOOM_PASO;


    if (zoomActual < ZOOM_MINIMO) {

        zoomActual =
            ZOOM_MINIMO;

    }


    zoomActual =
        Math.round(
            zoomActual * 10
        ) / 10;


    aplicarZoom();

}


function restablecerZoom() {

    calcularZoomAutomatico();

}


/* =========================
   INICIO
   ========================= */

document.addEventListener(
    "DOMContentLoaded",
    function () {

        cargarBorrador();


        const campos =
            obtenerCampos();


        campos.forEach(campo => {

            campo.addEventListener(
                "input",
                guardarBorrador
            );

            campo.addEventListener(
                "change",
                guardarBorrador
            );

        });


        calcularZoomAutomatico();

    }
);


window.addEventListener(
    "resize",
    function () {

        calcularZoomAutomatico();

    }
);

</script>

</body>
</html>

