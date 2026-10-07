<!DOCTYPE html>
<html lang="es">
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

html,
body {
    margin: 0;
    padding: 0;
}

body {
    font-family: "Times New Roman", Times, serif;
    color: #000;
    background: #fff;
    font-size: 12px;
}

/* =========================================================
   HOJA A4
   ========================================================= */

.hoja {
    width: 210mm;
    height: 297mm;

    padding: 12mm 14mm 10mm 14mm;

    margin: 0;
    background: #fff;
}

/* =========================================================
   ENCABEZADO
   ========================================================= */

.encabezado {
    width: 100%;
    border-bottom: 3px solid #000;
    padding-bottom: 4px;
    margin-bottom: 10px;
}

/*
    Tabla utilizada solamente para controlar
    la posición del logo y del texto en Dompdf.
*/

.encabezado-tabla {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    border: 0;
}

.encabezado-tabla td {
    border: 0;
    padding: 0;
    vertical-align: middle;
}

/* LOGO */

.encabezado-logo {
    width: 85px;
    text-align: left;
    vertical-align: middle;
}

.encabezado-logo img {
    width: 78px;
    height: auto;
    display: block;
}

/* TEXTO CENTRAL */

.encabezado-texto {
    text-align: center;
    vertical-align: middle;
    padding-left: 8px !important;
    padding-right: 8px !important;
}

.linea1 {
    font-size: 17px;
    font-weight: bold;
    line-height: 19px;
}

.linea2 {
    font-size: 17px;
    font-weight: bold;
    line-height: 19px;
}

.linea3 {
    font-size: 12px;
    line-height: 15px;
}

.linea4 {
    font-size: 12px;
    line-height: 15px;
}

/* ESPACIO DERECHO */

.encabezado-espacio {
    width: 85px;
}

/* =========================================================
   TABLA PRINCIPAL
   ========================================================= */

.formulario {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #000;
    table-layout: fixed;
}

.formulario td {
    border: 1px solid #000;
    padding: 5px 6px;
    vertical-align: top;
    font-size: 12px;
}

/*
    182 mm aproximadamente es el ancho útil de la hoja.

    21.4% = 38.95 mm
    78.6% = 143.05 mm
*/

.columna-label {
    width: 21.4%;
}

.columna-valor {
    width: 78.6%;
}

/* =========================================================
   TÍTULO
   ========================================================= */

.fila-titulo td {
    height: 32px;
    padding: 7px 6px;
    text-align: center;
    vertical-align: middle;
    font-size: 15px;
    font-weight: bold;
}

/* =========================================================
   SECCIONES
   ========================================================= */

.fila-seccion td {
    height: 24px;
    padding: 4px 6px;
    text-align: center;
    vertical-align: middle;
    font-size: 12px;
    font-weight: bold;
}

/* =========================================================
   ETIQUETAS
   ========================================================= */

.etiqueta {
    font-weight: bold;
    vertical-align: middle !important;
}

/* =========================================================
   CAMPOS NORMALES
   ========================================================= */

.fila-normal td {
    height: 31px;
}

.valor {
    width: 100%;
    min-height: 20px;

    padding: 2px;

    font-family: "Times New Roman", Times, serif;
    font-size: 12px;
    line-height: 20px;

    white-space: nowrap;
    overflow: hidden;
}

/* =========================================================
   DESCRIPCIÓN
   ========================================================= */

.fila-descripcion td {
    height: 445px;
}

.celda-descripcion {
    height: 445px;
    padding: 5px 6px !important;
    vertical-align: top !important;
}

.instruccion {
    margin: 0 0 4px 0;
    padding: 0;

    font-size: 10.5px;
    line-height: 13px;
}

.texto-descripcion {
    width: 100%;

    height: 400px;

    padding: 0;
    margin: 0;

    font-family: "Times New Roman", Times, serif;
    font-size: 12px;
    line-height: 20px;

    white-space: pre-wrap;
    word-wrap: break-word;
    overflow: hidden;
}

/* =========================================================
   FECHA
   ========================================================= */

.celda-fecha {
    height: 55px;
    padding: 6px !important;
}

.celda-fecha .instruccion {
    margin-bottom: 5px;
}

/* =========================================================
   CITACIÓN
   ========================================================= */

.citacion {
    margin-top: 5px;
    margin-bottom: 0;

    font-size: 10px;
    line-height: 12px;
}

/* =========================================================
   FIRMA
   ========================================================= */

.firma {
    width: 100%;
    text-align: center;
    margin-top: 22px;
}

.linea-firma {
    width: 260px;
    height: 14px;

    margin-left: auto;
    margin-right: auto;

    border-bottom: 1px solid #000;
}

.texto-firma {
    margin-top: 3px;
    font-size: 12px;
    font-weight: bold;
}

</style>
</head>

<body>

<div class="hoja">

    <!-- =====================================================
         ENCABEZADO
         ===================================================== -->

    <div class="encabezado">

        <table class="encabezado-tabla">

            <tr>

                <!-- LOGO -->

                <td class="encabezado-logo">

                    @php
                        $logo = public_path('images/logo-apch.png');
                        $logoBase64 = '';

                        if (file_exists($logo)) {
                            $logoBase64 = base64_encode(
                                file_get_contents($logo)
                            );
                        }
                    @endphp

                    @if($logoBase64)
                        <img
                            src="data:image/png;base64,{{ $logoBase64 }}"
                            alt="Logo institucional"
                        >
                    @endif

                </td>

                <!-- TEXTO -->

                <td class="encabezado-texto">

                    <div class="linea1">
                        UNIDAD EDUCATIVA
                    </div>

                    <div class="linea2">
                        &ldquo;ANGEL POLIBIO CHAVES&rdquo;
                    </div>

                    <div class="linea3">
                        San Miguel - Provincia Bolívar - Ecuador
                    </div>

                    <div class="linea4">
                        DEPARTAMENTO DE CONSEJERIA ESTUDIANTIL
                    </div>

                </td>

                <!-- ESPACIO DERECHO -->

                <td class="encabezado-espacio"></td>

            </tr>

        </table>

    </div>


    <!-- =====================================================
         FORMULARIO
         ===================================================== -->

    <table class="formulario">

        <colgroup>
            <col class="columna-label">
            <col class="columna-valor">
        </colgroup>


        <!-- TÍTULO -->

        <tr class="fila-titulo">
            <td colspan="2">
                FICHA DE NOTIFICACIÓN DE ALERTA
            </td>
        </tr>


        <!-- INFORMACIÓN ESTUDIANTE -->

        <tr class="fila-seccion">
            <td colspan="2">
                Información de la o el estudiante
            </td>
        </tr>


        <!-- NOMBRE -->

        <tr class="fila-normal">

            <td class="etiqueta">
                Nombre y apellido
            </td>

            <td>
                <div class="valor">
                    {{ $datos['estudiante_nombre'] ?? '' }}
                </div>
            </td>

        </tr>


        <!-- GRADO -->

        <tr class="fila-normal">

            <td class="etiqueta">
                Grado o curso
            </td>

            <td>
                <div class="valor">
                    {{ $datos['estudiante_grado'] ?? '' }}
                </div>
            </td>

        </tr>


        <!-- INFORMACIÓN ALERTA -->

        <tr class="fila-seccion">
            <td colspan="2">
                Información sobre la alerta
            </td>
        </tr>


        <!-- DESCRIPCIÓN -->

        <tr class="fila-descripcion">

            <td class="etiqueta">
                Descripción de la alerta
            </td>

            <td class="celda-descripcion">

                <p class="instruccion">
                    Escribir de forma concreta la alerta identificada, ubicar factores, fecha, lugar, contexto
                </p>

                <div class="texto-descripcion">
                    {{ $datos['descripcion_alerta'] ?? '' }}
                </div>

            </td>

        </tr>


        <!-- INFORMACIÓN NOTIFICANTE -->

        <tr class="fila-seccion">
            <td colspan="2">
                Información de quien notifica la alerta
            </td>
        </tr>


        <!-- NOMBRE -->

        <tr class="fila-normal">

            <td class="etiqueta">
                Nombre y apellido
            </td>

            <td>
                <div class="valor">
                    {{ $datos['notifica_nombre'] ?? '' }}
                </div>
            </td>

        </tr>


        <!-- CARGO -->

        <tr class="fila-normal">

            <td class="etiqueta">
                Cargo
            </td>

            <td>
                <div class="valor">
                    {{ $datos['notifica_cargo'] ?? '' }}
                </div>
            </td>

        </tr>


        <!-- CONTACTO -->

        <tr class="fila-normal">

            <td class="etiqueta">
                Contacto
            </td>

            <td>
                <div class="valor">
                    {{ $datos['notifica_contacto'] ?? '' }}
                </div>
            </td>

        </tr>


        <!-- FECHA -->

        <tr>

            <td class="etiqueta">
                Fecha
            </td>

            <td class="celda-fecha">

                <p class="instruccion">
                    Ubicar la fecha cuando se entrega la ficha al Departamento de Consejería Estudiantil
                </p>

                <div class="valor">
                    {{ $datos['fecha_entrega'] ?? '' }}
                </div>

            </td>

        </tr>

    </table>


    <!-- =====================================================
         CITACIÓN
         ===================================================== -->

    <p class="citacion">
        Ministerio de Educación (2023).
        <em>
            Modelo de Gestión del Departamento de Consejería Estudiantil.
        </em>
        &nbsp; Quito: Ecuador.
    </p>


    <!-- =====================================================
         FIRMA
         ===================================================== -->

    <div class="firma">

        <div class="linea-firma"></div>

        <div class="texto-firma">
            Firma
        </div>

    </div>

</div>

</body>
</html>
