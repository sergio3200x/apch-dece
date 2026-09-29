
<html>
<head>
<meta charset="UTF-8">
<title>FICHA DE NOTIFICACIÓN DE ALERTA</title>

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

    body {
        margin: 0;
        padding: 0;
        background: #e5e5e5;
        font-family: "Times New Roman", Times, serif;
        color: #000;
    }

    /* ===== BARRA DE HERRAMIENTAS ===== */

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
        padding: 9px 16px;
        cursor: pointer;

        border: 1px solid #c7c7c7;
        border-radius: 6px;
        background: #f5f5f5;

        transition: background 0.15s ease,
                    border-color 0.15s ease,
                    transform 0.1s ease;
    }

    .toolbar button:hover {
        background: #e9e9e9;
        border-color: #999;
    }

    .toolbar button:active {
        transform: scale(0.97);
    }

    .btn-volver {
        color: #222;
    }

    .btn-borrar {
        color: #a00000;
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

    /* ===== CONTROL DE ZOOM ===== */

    .zoom-control {
        display: flex;
        align-items: center;
        gap: 5px;

        padding: 3px 5px;

        border: 1px solid #d0d0d0;
        border-radius: 7px;
        background: #fafafa;
    }

    .zoom-control .btn-zoom {
        width: 34px;
        height: 32px;

        padding: 0;

        font-size: 20px;
        line-height: 1;
    }

    .zoom-label {
        min-width: 52px;

        text-align: center;

        font-family: Arial, sans-serif;
        font-size: 13px;
        font-weight: bold;
        color: #444;
    }

    .zoom-control .btn-reset {
        padding: 7px 10px;
        font-size: 12px;
    }

    /* ===== ESTADO DE GUARDADO ===== */

    .estado-guardado {
        display: flex;
        align-items: center;
        gap: 6px;

        margin-left: 5px;

        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #555;
    }

    .estado-punto {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #3b8f3b;
    }

    /* ===== CONTENEDOR DEL DOCUMENTO ===== */

    .documento {
        width: 100%;
        overflow-x: auto;
        overflow-y: visible;

        padding: 25px 20px 40px;
    }

    /* ===== HOJA A4 ===== */

    .page {
        width: 210mm;
        height: 297mm;

        padding: 12mm 14mm 10mm 14mm;

        margin: 0 auto 25px auto;

        background: #fff;
        position: relative;

        box-shadow: 0 2px 14px rgba(0, 0, 0, 0.18);

        zoom: var(--zoom-documento, 1);
        transform-origin: top center;
    }

    /* ===== HEADER ===== */

    .header {
        display: flex;
        align-items: center;
        border-bottom: 3px solid #000;
        padding-bottom: 4px;
        margin-bottom: 10px;
    }

    .header img {
        width: 85px;
        height: auto;
        margin-right: 10px;
    }

    .header-logo img {
        width: 78px;
        position: relative;
        left: 170px;
    }

    .header-text {
        flex: 1;
        text-align: center;
    }

    .header-text .line1 {
        font-size: 17px;
        font-weight: bold;
        line-height: 1.15;
    }

    .header-text .line2 {
        font-size: 17px;
        font-weight: bold;
        line-height: 1.15;
    }

    .header-text .line3 {
        font-size: 12px;
        line-height: 1.3;
    }

    /* ===== Main form table ===== */

    table.form {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
        table-layout: fixed;
    }

    table.form td,
    table.form th {
        border: 1px solid #000;
        padding: 5px 6px;
        vertical-align: top;
        font-size: 12px;
    }

    col.label {
        width: 21.4%;
    }

    col.value {
        width: 78.6%;
    }

    .title-row td {
        text-align: center;
        font-size: 15px;
        font-weight: bold;
        padding: 8px 6px;
    }

    .section-row td {
        text-align: center;
        font-weight: bold;
        font-size: 12px;
        padding: 4px 6px;
    }

    .label-cell {
        font-weight: bold;
        vertical-align: middle !important;
    }

    /* ===== TEXT INPUTS ===== */

    .field-input {
        width: 100%;
        border: none;
        border-bottom: 1px solid transparent;
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        background: transparent;
        padding: 2px;
        height: 20px;
    }

    .field-input:focus {
        outline: none;
        background: #fafff0;
    }

    .instructions {
        font-size: 10.5px;
        margin: 0 0 4px 0;
    }

    /* ===== DESCRIPCIÓN ===== */

    .description-cell {
        height: 445px;
        padding: 5px 6px;
    }

    textarea.description {
        width: 100%;
        height: 405px;
        border: none;
        resize: none;

        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        line-height: 20px;

        background-image:
            linear-gradient(
                to bottom,
                transparent 19px,
                #999 19px,
                #999 20px,
                transparent 20px
            );

        background-size: 100% 20px;
        background-repeat: repeat-y;
        background-attachment: local;
    }

    textarea.description:focus {
        outline: none;
    }

    .fecha-cell {
        padding: 6px;
    }

    .fecha-cell .instructions {
        margin-bottom: 5px;
    }

    /* ===== FOOTER / CITATION ===== */

    .citation {
        font-size: 10px;
        margin-top: 5px;
        margin-bottom: 0;
    }

    .signature-block {
        text-align: center;
        margin-top: 24px;
    }

    .signature-line {
        border-bottom: 1px solid #000;
        width: 260px;
        margin: 0 auto;
        height: 14px;
    }

    .signature-label {
        font-weight: bold;
        font-size: 12px;
        margin-top: 3px;
    }

    /* ===== IMPRESIÓN ===== */

    @media print {

        body {
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

            padding: 12mm 14mm 10mm 14mm;

            box-shadow: none;

            zoom: 1 !important;

            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        textarea.description {
            background-image:
                linear-gradient(
                    to bottom,
                    transparent 19px,
                    #999 19px,
                    #999 20px,
                    transparent 20px
                );

            background-size: 100% 20px;
            background-repeat: repeat-y;
        }
    }
</style>
</head>

<body>

<!-- =====================================================
     BARRA DE HERRAMIENTAS
     ===================================================== -->

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


<!-- =====================================================
     DOCUMENTO
     ===================================================== -->

<div class="documento">

<div class="page">

    <div class="header">

        <div class="header-logo">

            <img
                src="{{ asset('images/logo-apch.png') }}"
                alt="Logo institucional"
            >

        </div>


        <div class="header-text">

            <div class="line1">
                UNIDAD EDUCATIVA
            </div>

            <div class="line2">
                &ldquo;ANGEL POLIBIO CHAVES&rdquo;
            </div>

            <div class="line3">
                San Miguel - Provincia Bolívar - Ecuador
            </div>

        </div>

    </div>


    <table class="form">

        <colgroup>

            <col class="label">
            <col class="value">

        </colgroup>


        <tr class="title-row">

            <td colspan="2">
                FICHA DE NOTIFICACIÓN DE ALERTA
            </td>

        </tr>


        <tr class="section-row">

            <td colspan="2">
                Información de la o el estudiante
            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Nombre y apellido
            </td>

            <td>

                <input
                    type="text"
                    class="field-input"
                    name="estudiante_nombre"
                >

            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Grado o curso
            </td>

            <td>

                <input
                    type="text"
                    class="field-input"
                    name="estudiante_grado"
                >

            </td>

        </tr>


        <tr class="section-row">

            <td colspan="2">
                Información sobre la alerta
            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Descripción de la alerta
            </td>

            <td class="description-cell">

                <p class="instructions">
                    Escribir de forma concreta la alerta identificada, ubicar factores, fecha, lugar, contexto
                </p>

                <textarea
                    class="description"
                    name="descripcion_alerta"
                ></textarea>

            </td>

        </tr>


        <tr class="section-row">

            <td colspan="2">
                Información de quien notifica la alerta
            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Nombre y apellido
            </td>

            <td>

                <input
                    type="text"
                    class="field-input"
                    name="notifica_nombre"
                >

            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Cargo
            </td>

            <td>

                <input
                    type="text"
                    class="field-input"
                    name="notifica_cargo"
                >

            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Contacto
            </td>

            <td>

                <input
                    type="text"
                    class="field-input"
                    name="notifica_contacto"
                >

            </td>

        </tr>


        <tr>

            <td class="label-cell">
                Fecha
            </td>

            <td class="fecha-cell">

                <p class="instructions">
                    Ubicar la fecha cuando se entrega la ficha al Departamento de Consejería Estudiantil
                </p>

                <input
                    type="date"
                    class="field-input"
                    name="fecha_entrega"
                >

            </td>

        </tr>

    </table>


    <p class="citation">

        Ministerio de Educación (2023).

        <em>
            Modelo de Gestión del Departamento de Consejería Estudiantil.
        </em>

        &nbsp; Quito: Ecuador.

    </p>


    <div class="signature-block">

        <div class="signature-line"></div>

        <div class="signature-label">
            Firma
        </div>

    </div>

</div>

</div>


<script>

    /* =====================================================
       CLAVE DEL BORRADOR
       ===================================================== */

    const CLAVE_BORRADOR =
        'apch_ficha_notificacion_alerta_borrador';


    /* =====================================================
       OBTENER TODOS LOS CAMPOS
       ===================================================== */

    function obtenerCampos() {

        return document.querySelectorAll(
            '.page input, .page textarea'
        );

    }


    /* =====================================================
       ACTUALIZAR ESTADO DE GUARDADO
       ===================================================== */

    function actualizarEstadoGuardado(texto) {

        const textoEstado =
            document.getElementById('textoEstado');

        if (textoEstado) {

            textoEstado.textContent = texto;

        }

    }


    /* =====================================================
       GUARDAR BORRADOR AUTOMATICAMENTE
       ===================================================== */

    function guardarBorrador() {

        const campos =
            obtenerCampos();

        const datos = {};


        campos.forEach(campo => {

            if (!campo.name) {

                return;

            }


            if (
                campo.type === 'checkbox' ||
                campo.type === 'radio'
            ) {

                datos[campo.name] = {

                    tipo: campo.type,

                    valor: campo.checked

                };

            } else {

                datos[campo.name] = {

                    tipo: 'texto',

                    valor: campo.value

                };

            }

        });


        localStorage.setItem(

            CLAVE_BORRADOR,

            JSON.stringify(datos)

        );


        actualizarEstadoGuardado(
            'Guardado'
        );

    }


    /* =====================================================
       CARGAR BORRADOR
       ===================================================== */

    function cargarBorrador() {

        const borrador =
            localStorage.getItem(
                CLAVE_BORRADOR
            );


        if (!borrador) {

            return;

        }


        try {

            const datos =
                JSON.parse(borrador);


            const campos =
                obtenerCampos();


            campos.forEach(campo => {

                if (
                    !campo.name ||
                    !datos[campo.name]
                ) {

                    return;

                }


                if (
                    campo.type === 'checkbox' ||
                    campo.type === 'radio'
                ) {

                    campo.checked =
                        datos[campo.name].valor;

                } else {

                    campo.value =
                        datos[campo.name].valor || '';

                }

            });


            actualizarEstadoGuardado(
                'Borrador cargado'
            );


        } catch (error) {

            console.error(
                'Error al cargar el borrador:',
                error
            );

        }

    }


    /* =====================================================
       BORRAR TODO
       ===================================================== */

    function borrarTodo() {

        const confirmar = confirm(

            '¿Está seguro de que desea borrar todos los datos ingresados en este formulario?'

        );


        if (!confirmar) {

            return;

        }


        const campos =
            obtenerCampos();


        campos.forEach(campo => {

            if (
                campo.type === 'checkbox' ||
                campo.type === 'radio'
            ) {

                campo.checked = false;

            } else {

                campo.value = '';

            }

        });


        localStorage.removeItem(
            CLAVE_BORRADOR
        );


        actualizarEstadoGuardado(
            'Sin datos guardados'
        );


        alert(
            'Formulario borrado correctamente.'
        );

    }


    /* =====================================================
       VOLVER
       ===================================================== */

    function volver() {

        window.history.back();

    }


    /* =====================================================
       ZOOM
       ===================================================== */

    const ZOOM_MINIMO = 0.80;
    const ZOOM_MAXIMO = 1.70;
    const ZOOM_PASO = 0.10;

    let zoomActual = 1;


    function aplicarZoom() {

        document.documentElement.style.setProperty(
            '--zoom-documento',
            zoomActual
        );


        const zoomLabel =
            document.getElementById('zoomLabel');


        if (zoomLabel) {

            zoomLabel.textContent =
                Math.round(
                    zoomActual * 100
                ) + '%';

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

        zoomActual +=
            ZOOM_PASO;


        if (
            zoomActual >
            ZOOM_MAXIMO
        ) {

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

        zoomActual -=
            ZOOM_PASO;


        if (
            zoomActual <
            ZOOM_MINIMO
        ) {

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


    /* =====================================================
       GUARDAR E IMPRIMIR
       ===================================================== */

    function guardarEImprimir() {

        guardarBorrador();

        window.print();

    }


    /* =====================================================
       INICIAR
       ===================================================== */

    document.addEventListener(

        'DOMContentLoaded',

        function () {

            cargarBorrador();

            calcularZoomAutomatico();


            const campos =
                obtenerCampos();


            campos.forEach(campo => {

                campo.addEventListener(
                    'input',
                    guardarBorrador
                );


                campo.addEventListener(
                    'change',
                    guardarBorrador
                );

            });


            window.addEventListener(
                'resize',
                function () {

                    calcularZoomAutomatico();

                }
            );

        }

    );

</script>

</body>
</html>



