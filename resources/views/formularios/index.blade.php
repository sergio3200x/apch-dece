<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Formularios DECE | APCH</title>

<style>

    :root {
        --apch-50: #fff5f5;
        --apch-100: #fee2e2;
        --apch-200: #fecaca;
        --apch-300: #fca5a5;
        --apch-400: #f87171;
        --apch-500: #ef4444;
        --apch-600: #dc2626;
        --apch-700: #b30000;
        --apch-800: #8f0000;
        --apch-900: #650000;

        --slate-50: #f8fafc;
        --slate-100: #f1f5f9;
        --slate-200: #e2e8f0;
        --slate-300: #cbd5e1;
        --slate-400: #94a3b8;
        --slate-500: #64748b;
        --slate-600: #475569;
        --slate-700: #334155;
        --slate-800: #1e293b;
        --slate-900: #0f172a;

        --green-50: #f0fdf4;
        --green-200: #bbf7d0;
        --green-400: #4ade80;
        --green-500: #22c55e;
        --green-700: #15803d;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        min-height: 100vh;
        background: var(--slate-100);
        color: var(--slate-800);
        font-family: "Segoe UI", Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    button,
    input,
    select,
    textarea {
        font-family: inherit;
    }

    a {
        -webkit-tap-highlight-color: transparent;
    }

    /* =========================================================
       ANIMACIONES
       ========================================================= */

    @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(14px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes ping {
        75%,
        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    .animate-fade-up {
        animation: fadeUp 0.55s ease-out forwards;
    }

    /* =========================================================
       ENCABEZADO
       ========================================================= */

    .site-header {
        margin: 16px 4px 0;
        border: 2px solid #000;
        border-radius: 12px;
        background: #e2e8f0;
        overflow: hidden;
    }

    .header-inner {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px 24px;
    }

    .institution-brand {
        display: flex;
        align-items: center;
        gap: 16px;
        min-width: 0;
    }

    .institution-logo {
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 6px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .institution-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .institution-info {
        min-width: 0;
    }

    .institution-label {
        margin: 0;
        color: var(--apch-700);
        font-size: 14px;
        line-height: 1.5;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .institution-name {
        margin: 2px 0 0;
        color: var(--slate-900);
        font-size: 20px;
        line-height: 1.3;
        font-weight: 700;
        letter-spacing: -0.025em;
    }

    .system-name {
        margin: 4px 0 0;
        color: var(--slate-500);
        font-size: 14px;
        line-height: 1.5;
        font-weight: 500;
    }

    /* =========================================================
       ACCIONES DEL ENCABEZADO
       ========================================================= */

    .header-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .system-status {
        display: none;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid var(--green-200);
        border-radius: 999px;
        background: var(--green-50);
        color: var(--green-700);
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status-indicator {
        position: relative;
        display: flex;
        width: 10px;
        height: 10px;
    }

    .status-ping {
        position: absolute;
        display: inline-flex;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--green-400);
        opacity: 0.6;
        animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .status-dot {
        position: relative;
        display: inline-flex;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: var(--green-500);
    }

    .logout-form {
        margin: 0;
    }

    .logout-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        border: 2px solid var(--slate-200);
        border-radius: 12px;
        background: #fff;
        color: var(--slate-700);
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition:
            border-color 0.2s ease,
            background-color 0.2s ease,
            color 0.2s ease;
    }

    .logout-button svg {
        width: 20px;
        height: 20px;
        transition: transform 0.2s ease;
    }

    .logout-button:hover {
        border-color: var(--apch-700);
        background: var(--apch-700);
        color: #fff;
    }

    .logout-button:hover svg {
        transform: translateX(2px);
    }

    /* =========================================================
       CONTENIDO PRINCIPAL
       ========================================================= */

    .main-container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 40px 24px;
    }

    /* =========================================================
       CABECERA DE LA PÁGINA
       ========================================================= */

    .page-heading {
        margin-bottom: 32px;
    }

    .heading-card {
        padding: 28px;
        border: 1px solid var(--slate-200);
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
    }

    .heading-content {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .heading-text {
        min-width: 0;
    }

    .department-label {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .department-bar {
        width: 6px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 999px;
        background: var(--apch-700);
    }

    .department-text {
        margin: 0;
        color: var(--apch-700);
        font-size: 14px;
        line-height: 1.5;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.18em;
    }

    .page-title {
        margin: 0;
        color: var(--slate-900);
        font-size: 30px;
        line-height: 1.2;
        font-weight: 700;
        letter-spacing: -0.025em;
    }

    .page-description {
        max-width: 768px;
        margin: 12px 0 0;
        color: var(--slate-500);
        font-size: 16px;
        line-height: 1.75;
    }

    /* =========================================================
       CONTADOR
       ========================================================= */

    .forms-counter {
        flex-shrink: 0;
        padding: 16px 24px;
        border: 1px solid var(--apch-100);
        border-radius: 16px;
        background: var(--apch-50);
        text-align: center;
    }

    .counter-number {
        margin: 0;
        color: var(--apch-700);
        font-size: 30px;
        line-height: 1.2;
        font-weight: 700;
    }

    .counter-label {
        margin: 4px 0 0;
        color: var(--slate-600);
        font-size: 14px;
        line-height: 1.5;
        font-weight: 600;
    }

    /* =========================================================
       GRID DE FORMULARIOS
       ========================================================= */

    .forms-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
    }

    /* =========================================================
       TARJETAS DE FORMULARIOS
       ========================================================= */

    .form-card {
        min-width: 0;
        padding: 28px;
        border: 1px solid var(--slate-200);
        border-radius: 24px;
        background: #fff;
        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
        transition:
            transform 0.3s ease,
            border-color 0.3s ease,
            box-shadow 0.3s ease;
    }

    .form-card:hover {
        transform: translateY(-4px);
        border-color: var(--apch-200);
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.1);
    }

    .form-card-content {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .form-icon {
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: var(--apch-50);
        color: var(--apch-700);
        transition:
            background-color 0.3s ease,
            color 0.3s ease;
    }

    .form-icon svg {
        width: 32px;
        height: 32px;
    }

    .form-card:hover .form-icon {
        background: var(--apch-700);
        color: #fff;
    }

    .form-information {
        min-width: 0;
        flex: 1;
    }

    .form-number {
        display: block;
        color: var(--apch-700);
        font-size: 12px;
        line-height: 1.5;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .form-title {
        margin: 4px 0 0;
        color: var(--slate-900);
        font-size: 18px;
        line-height: 1.55;
        font-weight: 700;
    }

    .form-description {
        margin: 8px 0 0;
        color: var(--slate-500);
        font-size: 14px;
        line-height: 1.5;
    }

    /* =========================================================
       BOTÓN ABRIR FORMULARIO
       ========================================================= */

    .open-form-button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        padding: 12px 20px;
        border-radius: 12px;
        background: var(--apch-700);
        color: #fff;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 700;
        text-decoration: none;
        transition:
            background-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .open-form-button:hover {
        background: var(--apch-800);
        box-shadow: 0 4px 10px rgba(101, 0, 0, 0.2);
    }

    .open-form-arrow {
        display: inline-block;
        font-size: 18px;
        line-height: 1;
        transition: transform 0.2s ease;
    }

    .form-card:hover .open-form-arrow {
        transform: translateX(4px);
    }

    /* =========================================================
       FOOTER
       ========================================================= */

    .site-footer {
        margin-top: 40px;
        background: #000;
        color: #fff;
    }

    .footer-inner {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 28px 24px;
    }

    .footer-main {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .footer-block {
        min-width: 0;
    }

    .footer-title {
        margin: 0;
        color: #fff;
        font-size: 16px;
        line-height: 1.5;
        font-weight: 700;
    }

    .footer-subtitle {
        margin: 4px 0 0;
        color: var(--slate-400);
        font-size: 14px;
        line-height: 1.5;
    }

    .footer-developer {
        text-align: left;
    }

    .footer-divider {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 16px;
    }

    .footer-description {
        margin: 0;
        color: var(--slate-500);
        font-size: 12px;
        line-height: 1.5;
        text-align: left;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (min-width: 640px) {

        .header-inner {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .institution-name {
            font-size: 24px;
        }

        .system-status {
            display: flex;
        }

        .heading-content {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .page-title {
            font-size: 36px;
        }

        .footer-main {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .footer-developer {
            text-align: right;
        }

        .footer-description {
            text-align: left;
        }
    }

    @media (min-width: 768px) {

        .forms-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 1024px) {

        .header-inner {
            padding-left: 40px;
            padding-right: 40px;
        }

        .main-container {
            padding-left: 40px;
            padding-right: 40px;
        }
    }

    @media (max-width: 639px) {

        .header-actions {
            width: 100%;
            justify-content: flex-end;
        }

        .logout-form {
            width: 100%;
        }

        .logout-button {
            width: 100%;
            justify-content: center;
        }

        .page-title {
            font-size: 30px;
        }

        .heading-card {
            padding: 24px;
        }

        .form-card {
            padding: 24px;
        }

        .form-card-content {
            gap: 16px;
        }

        .form-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
        }

        .form-icon svg {
            width: 28px;
            height: 28px;
        }
    }

</style>
</head>

<body>
    <!-- =========================================================
     ENCABEZADO
     ========================================================= -->

<header class="site-header">

    <div class="header-inner">

        <!-- IDENTIDAD INSTITUCIONAL -->

        <div class="institution-brand">

            <div class="institution-logo">

                <img
                    src="{{ asset('images/logo-apch.png') }}"
                    alt="Logo APCH"
                >

            </div>

            <div class="institution-info">

                <p class="institution-label">
                    Unidad Educativa
                </p>

                <h1 class="institution-name">
                    "Ángel Polibio Chaves"
                </h1>

                <p class="system-name">
                    Sistema de Formularios Digitales
                </p>

            </div>

        </div>


        <!-- ACCIONES -->

        <div class="header-actions">

            <!-- ESTADO -->

            <div class="system-status">

                <span class="status-indicator">

                    <span class="status-ping"></span>

                    <span class="status-dot"></span>

                </span>

                Sistema activo

            </div>


            <!-- CERRAR SESIÓN -->

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="logout-form"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"
                        />

                    </svg>

                    Cerrar sesión

                </button>

            </form>

        </div>

    </div>

</header>


<!-- =========================================================
     CONTENIDO
     ========================================================= -->

<main class="main-container">


    <!-- =====================================================
         TÍTULO
         ===================================================== -->

    <section class="page-heading animate-fade-up">

        <div class="heading-card">

            <div class="heading-content">

                <div class="heading-text">

                    <div class="department-label">

                        <div class="department-bar"></div>

                        <p class="department-text">
                            Departamento de Consejería Estudiantil
                        </p>

                    </div>

                    <h2 class="page-title">
                        Formularios DECE
                    </h2>

                    <p class="page-description">
                        Seleccione el formulario que desea utilizar para iniciar su llenado e impresión.
                    </p>

                </div>


                <!-- CONTADOR -->

                <div class="forms-counter">

                    <p class="counter-number">
                        8
                    </p>

                    <p class="counter-label">
                        Formularios disponibles
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         FORMULARIOS
         ===================================================== -->

    <section class="forms-grid">


        <!-- =================================================
             1. ENTREVISTA ESTUDIANTES
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.003a9.365 9.365 0 01-3.75.772 9.36 9.36 0 01-3.75-.772M15 19.128a9.35 9.35 0 00-3.75-.772m0 0a9.35 9.35 0 00-3.75.772m3.75-.772v-.003c0-1.113.285-2.16.786-3.07M12 12a3 3 0 100-6 3 3 0 000 6zm6 3a3 3 0 100-6 3 3 0 000 6zM6 15a3 3 0 100-6 3 3 0 000 6z"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 01
                    </span>

                    <h3 class="form-title">
                        Entrevista estudiantes
                    </h3>

                    <p class="form-description">
                        Formulario para la entrevista y atención de estudiantes.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-estudiantes') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             2. FICHA DE OBSERVACIÓN
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.644C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.178.07.21.07.434 0 .644C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 02
                    </span>

                    <h3 class="form-title">
                        Ficha de observación
                    </h3>

                    <p class="form-description">
                        Registro correspondiente al proceso de observación del estudiante.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-observacion') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             3. FICHA DE DERIVACIÓN
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125V5.625a3.375 3.375 0 00-3.375-3.375h-.75m-4.5 2.25H6A2.25 2.25 0 003.75 6.75v10.5A2.25 2.25 0 006 19.5h12a2.25 2.25 0 002.25-2.25V10.5M14.25 2.25V5.25a1.5 1.5 0 001.5 1.5h3"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 03
                    </span>

                    <h3 class="form-title">
                        Ficha de derivación
                    </h3>

                    <p class="form-description">
                        Formulario utilizado para realizar una derivación dentro del proceso DECE.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-derivacion') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             4. ENTREVISTA REPRESENTANTES
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.499-1.632z"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 04
                    </span>

                    <h3 class="form-title">
                        Entrevista representantes
                    </h3>

                    <p class="form-description">
                        Formulario destinado a la entrevista con representantes del estudiante.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-representantes') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             5. ENTREVISTA DOCENTES
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM2.25 19.125a7.125 7.125 0 0114.25 0m2.25-6.75a3.75 3.75 0 110-7.5 3.75 3.75 0 010 7.5zm0 0c1.765 0 3.29 1.02 4.03 2.5"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 05
                    </span>

                    <h3 class="form-title">
                        Entrevista docentes
                    </h3>

                    <p class="form-description">
                        Formulario destinado a la entrevista y recopilación de información docente.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-docentes') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             6. CONSENTIMIENTO INFORMADO
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-3A2.25 2.25 0 008.25 5.25V9m7.5 0h.75A2.25 2.25 0 0118.75 11.25v7.5A2.25 2.25 0 0116.5 21h-9A2.25 2.25 0 015.25 18.75v-7.5A2.25 2.25 0 017.5 9h.75m7.5 0h-7.5"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 06
                    </span>

                    <h3 class="form-title">
                        Consentimiento informado
                    </h3>

                    <p class="form-description">
                        Documento institucional para el consentimiento correspondiente.
                    </p>

                    <a
                        href="{{ route('formularios.consentimiento-informado') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             7. FICHA DE ALERTA
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.007v.008H12V16.5z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.29 3.86l-7.11 12.25A1.875 1.875 0 004.8 18.94h14.4a1.875 1.875 0 001.62-2.83L13.71 3.86a1.875 1.875 0 00-3.42 0z"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 07
                    </span>

                    <h3 class="form-title">
                        Ficha de notificación de alerta DECE
                    </h3>

                    <p class="form-description">
                        Formulario correspondiente a la notificación de alertas al DECE.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-alerta-dece') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


        <!-- =================================================
             8. PLAN DE ATENCIÓN PSICOSOCIAL
             ================================================= -->

        <div class="form-card animate-fade-up">

            <div class="form-card-content">

                <div class="form-icon">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12h6m-6 4h6m2.25-13.5H6.75A2.25 2.25 0 004.5 4.75v14.5a2.25 2.25 0 002.25 2.25h10.5a2.25 2.25 0 002.25-2.25V7.25a2.25 2.25 0 00-2.25-2.25z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 5V3.75A1.75 1.75 0 0110.75 2h2.5A1.75 1.75 0 0115 3.75V5"
                        />

                    </svg>

                </div>

                <div class="form-information">

                    <span class="form-number">
                        Formulario 08
                    </span>

                    <h3 class="form-title">
                        Plan de atención psicosocial y seguimiento
                    </h3>

                    <p class="form-description">
                        Formulario correspondiente al plan de atención y seguimiento.
                    </p>

                    <a
                        href="{{ route('formularios.plan-atencion-psicosocial') }}"
                        class="open-form-button"
                    >

                        Abrir formulario

                        <span class="open-form-arrow">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


    </section>

</main>


<!-- =========================================================
     PIE DE PÁGINA
     ========================================================= -->

<footer class="site-footer">

    <div class="footer-inner">

        <div class="footer-main">

            <div class="footer-block">

                <p class="footer-title">
                    Sistema de Formularios Digitales
                </p>

                <p class="footer-subtitle">
                    Unidad Educativa "Ángel Polibio Chaves"
                </p>

            </div>

            <div class="footer-block footer-developer">

                <p class="footer-title">
                    Desarrollado por Stalyn Alvarado
                </p>

                <p class="footer-subtitle">
                    tu-correo@ejemplo.com
                </p>

            </div>

        </div>

        <div class="footer-divider">

            <p class="footer-description">
                Departamento de Consejería Estudiantil · Sistema institucional de formularios digitales
            </p>

        </div>

    </div>

</footer>
</body>

</html>
