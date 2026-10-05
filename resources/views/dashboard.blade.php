<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de control | APCH</title>

    <style>
        /* =========================================================
           CONFIGURACIÓN GENERAL
        ========================================================= */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #f7f7f8;
            color: #1e293b;
            font-family: "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* =========================================================
           ANIMACIONES
        ========================================================= */

        @keyframes fadeUp {
            0% {
                opacity: 0;
                transform: translateY(18px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.7s ease-out forwards;
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }

        /* =========================================================
           CONTENEDOR GENERAL
        ========================================================= */

        .dashboard-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #f8fafc;
        }

        /* =========================================================
           CABECERA
        ========================================================= */

        .dashboard-header {
            margin: 1rem 0.25rem 0;
            overflow: hidden;
            border-radius: 12px;
            background: #e2e8f0;
            border: 2px solid #000000;
        }

        .header-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .header-inner {
            min-height: 88px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.25rem;
        }

        /* =========================================================
           IDENTIDAD
        ========================================================= */

        .identity {
            display: flex;
            align-items: center;
            gap: 1rem;
            min-width: 0;
        }

        .header-logo {
            width: 64px;
            height: 64px;
            flex-shrink: 0;
            padding: 0.5rem;
            border-radius: 16px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
        }

        .header-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .identity-info {
            min-width: 0;
        }

        .identity-label {
            margin: 0;
            color: #c54848;
            font-size: 0.75rem;
            line-height: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .identity-title {
            margin: 0;
            color: #0f172a;
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .identity-subtitle {
            margin: 0.25rem 0 0;
            color: #64748b;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        /* =========================================================
           PERFIL
        ========================================================= */

        .header-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-shrink: 0;
        }

        .profile-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .profile-text {
            text-align: right;
        }

        .profile-name {
            margin: 0;
            color: #1e293b;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 700;
        }

        .profile-role {
            margin: 0;
            color: #64748b;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .profile-avatar {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #ffe7e7;
            color: #ad2d2d;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ffcfcf;
            font-weight: 700;
        }

        /* =========================================================
           BOTONES DE CABECERA
        ========================================================= */

        .header-action {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            padding: 0;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            cursor: pointer;
            transition:
                background-color 0.3s ease,
                color 0.3s ease,
                border-color 0.3s ease;
        }

        .header-action:hover {
            background: #c83d3d;
            color: #ffffff;
            border-color: #c83d3d;
        }

        .header-action svg {
            width: 20px;
            height: 20px;
        }

        .header-action span {
            display: none;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .logout-form {
            margin: 0;
        }

        /* =========================================================
           CONTENIDO PRINCIPAL
        ========================================================= */

        .dashboard-main {
            flex: 1;
        }

        .main-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 2.5rem 2rem 3.5rem;
        }

        /* =========================================================
           BIENVENIDA
        ========================================================= */

        .welcome-section {
            position: relative;
            overflow: hidden;
            border-radius: 30px;
            background: #c83d3d;
            color: #ffffff;
            box-shadow: 0 20px 35px rgba(120, 32, 32, 0.15);
        }

        .welcome-decoration-one {
            position: absolute;
            top: -6rem;
            right: -5rem;
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.10);
        }

        .welcome-decoration-two {
            position: absolute;
            right: 8rem;
            bottom: -7rem;
            width: 16rem;
            height: 16rem;
            border-radius: 50%;
            background: rgba(146, 38, 38, 0.20);
        }

        .welcome-decoration-three {
            position: absolute;
            top: 0;
            left: 50%;
            width: 1px;
            height: 100%;
            background: rgba(255, 255, 255, 0.05);
        }

        .welcome-content {
            position: relative;
            z-index: 10;
            padding: 3rem;
        }

        .welcome-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }

        .welcome-text {
            max-width: 48rem;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.20);
        }

        .welcome-badge-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ffffff;
        }

        .welcome-badge-text {
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
        }

        .welcome-title {
            margin: 1.5rem 0 0;
            color: #ffffff;
            font-size: 3rem;
            line-height: 1;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .welcome-description {
            max-width: 42rem;
            margin: 1rem 0 0;
            color: #fef2f2;
            font-size: 1.125rem;
            line-height: 2rem;
        }

        /* =========================================================
           ICONO DE BIENVENIDA
        ========================================================= */

        .welcome-icon-outer {
            width: 144px;
            height: 144px;
            flex-shrink: 0;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.20);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon-inner {
            width: 96px;
            height: 96px;
            border-radius: 24px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.10);
        }

        .welcome-icon-inner svg {
            width: 48px;
            height: 48px;
            color: #c83d3d;
        }

        /* =========================================================
           ENCABEZADO DE FUNCIONES
        ========================================================= */

        .functions-header {
            margin-top: 3rem;
            margin-bottom: 1.75rem;
        }

        .functions-label {
            margin: 0;
            color: #c54848;
            font-size: 0.75rem;
            line-height: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .functions-title {
            margin: 0.5rem 0 0;
            color: #0f172a;
            font-size: 1.875rem;
            line-height: 2.25rem;
            font-weight: 700;
        }

        .functions-description {
            margin: 0.5rem 0 0;
            color: #64748b;
            font-size: 1rem;
            line-height: 1.5rem;
        }

        /* =========================================================
           TARJETAS
        ========================================================= */

        .functions-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1.5rem;
        }

        .dashboard-card {
            position: relative;
            overflow: hidden;
            padding: 2rem;
            border-radius: 26px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease,
                border-color 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-6px);
            border-color: #f5a5a5;
            box-shadow: 0 20px 30px rgba(120, 32, 32, 0.10);
        }

        .card-top-line {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: #c83d3d;
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }

        .card-icon {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            background: #ffe7e7;
            color: #ad2d2d;
            border: 1px solid #ffcfcf;
            display: flex;
            align-items: center;
            justify-content: center;
            transition:
                background-color 0.3s ease,
                color 0.3s ease;
        }

        .dashboard-card:hover .card-icon {
            background: #c83d3d;
            color: #ffffff;
        }

        .card-icon svg {
            width: 32px;
            height: 32px;
        }

        .card-arrow-top {
            color: #cbd5e1;
            transition: color 0.3s ease;
        }

        .dashboard-card:hover .card-arrow-top {
            color: #c54848;
        }

        .card-arrow-top svg {
            width: 24px;
            height: 24px;
        }

        .card-category {
            margin: 1.75rem 0 0;
            color: #c54848;
            font-size: 0.75rem;
            line-height: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
        }

        .card-title {
            margin: 0.5rem 0 0;
            color: #0f172a;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 700;
        }

        .card-description {
            margin: 0.75rem 0 0;
            color: #64748b;
            font-size: 1rem;
            line-height: 1.75rem;
        }

        .card-footer {
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-footer-text {
            color: #1e293b;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 700;
        }

        .card-footer-arrow {
            color: #c54848;
            font-size: 1.25rem;
            line-height: 1.75rem;
            transition: transform 0.3s ease;
        }

        .dashboard-card:hover .card-footer-arrow {
            transform: translateX(8px);
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .dashboard-footer {
            background: #000000;
            color: #ffffff;
        }

        .footer-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 2rem;
        }

        .footer-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .footer-institution {
            display: flex;
            align-items: center;
            gap: 1rem;
            text-align: left;
        }

        .footer-logo {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            padding: 6px;
            border-radius: 12px;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .footer-system-name {
            margin: 0;
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 700;
        }

        .footer-institution-name {
            margin: 0.25rem 0 0;
            color: #94a3b8;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .footer-developer {
            text-align: right;
        }

        .footer-developer-label {
            margin: 0;
            color: #e97979;
            font-size: 0.625rem;
            line-height: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.18em;
        }

        .footer-developer-name {
            margin: 0.25rem 0 0;
            color: #ffffff;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
        }

        .footer-developer-email {
            margin: 0.25rem 0 0;
            color: #94a3b8;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .footer-bottom {
            margin-top: 1.75rem;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(255, 255, 255, 0.10);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .footer-bottom p {
            margin: 0;
            color: #64748b;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1023px) {

            .header-container,
            .main-container,
            .footer-container {
                padding-left: 2rem;
                padding-right: 2rem;
            }

            .functions-grid {
                grid-template-columns: 1fr;
            }

            .welcome-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 767px) {

            .header-container,
            .main-container,
            .footer-container {
                padding-left: 1.25rem;
                padding-right: 1.25rem;
            }

            .header-inner {
                min-height: 78px;
            }

            .header-logo {
                width: 56px;
                height: 56px;
            }

            .identity-title {
                font-size: 1rem;
                line-height: 1.5rem;
            }

            .identity-label {
                font-size: 0.625rem;
            }

            .profile-info {
                display: none;
            }

            .header-action {
                width: 44px;
                height: 44px;
            }

            .welcome-content {
                padding: 2.5rem;
            }

            .welcome-row {
                align-items: flex-start;
            }

            .welcome-title {
                font-size: 2.25rem;
            }

            .welcome-description {
                font-size: 1rem;
                line-height: 1.75rem;
            }

            .welcome-icon-outer {
                display: none;
            }

            .footer-main {
                flex-direction: column;
                align-items: center;
            }

            .footer-institution {
                text-align: center;
            }

            .footer-developer {
                text-align: center;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 639px) {

            .dashboard-header {
                margin-top: 0.5rem;
            }

            .header-container {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .header-inner {
                gap: 0.5rem;
            }

            .identity {
                gap: 0.625rem;
            }

            .header-logo {
                width: 50px;
                height: 50px;
                border-radius: 12px;
                padding: 0.375rem;
            }

            .identity-subtitle {
                display: none;
            }

            .identity-title {
                font-size: 0.9rem;
            }

            .identity-label {
                font-size: 0.55rem;
            }

            .main-container {
                padding-top: 2rem;
                padding-bottom: 2.5rem;
            }

            .welcome-content {
                padding: 2rem;
            }

            .welcome-title {
                margin-top: 1.25rem;
                font-size: 2rem;
                line-height: 1.15;
            }

            .welcome-description {
                margin-top: 0.875rem;
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .welcome-badge-text {
                font-size: 0.75rem;
            }

            .functions-header {
                margin-top: 2.5rem;
            }

            .functions-title {
                font-size: 1.625rem;
                line-height: 2rem;
            }

            .dashboard-card {
                padding: 1.75rem;
            }

            .card-title {
                font-size: 1.375rem;
            }

            .footer-container {
                padding-top: 1.75rem;
                padding-bottom: 1.75rem;
            }
        }

        @media (max-width: 420px) {

            .header-profile {
                gap: 0.4rem;
            }

            .header-action {
                width: 40px;
                height: 40px;
                border-radius: 10px;
            }

            .header-action svg {
                width: 18px;
                height: 18px;
            }

            .welcome-content {
                padding: 1.5rem;
            }

            .welcome-title {
                font-size: 1.75rem;
            }

            .dashboard-card {
                padding: 1.5rem;
            }

            .card-icon {
                width: 56px;
                height: 56px;
            }

            .card-icon svg {
                width: 28px;
                height: 28px;
            }
        }

        /* =========================================================
           PANTALLAS PEQUEÑAS
           Mantener los textos de botones ocultos como en Tailwind
        ========================================================= */

        @media (min-width: 640px) {

            .header-action {
                width: auto;
                padding: 0 1rem;
            }

            .header-action span {
                display: inline;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-page">

    <!-- =====================================================
         CABECERA
    ====================================================== -->

    <header class="dashboard-header">

        <div class="header-container">

            <div class="header-inner">


                <!-- IDENTIDAD -->

                <div class="identity">

                    <!-- LOGO -->

                    <div class="header-logo">

                        <img
                            src="{{ asset('images/logo-apch.png') }}"
                            alt="Logo APCH"
                        >

                    </div>


                    <!-- INFORMACIÓN -->

                    <div class="identity-info">

                        <p class="identity-label">
                            APCH · DECE
                        </p>

                        <h1 class="identity-title">
                            Sistema de Formularios Digitales
                        </h1>

                        <p class="identity-subtitle">
                            Unidad Educativa "Ángel Polibio Chaves"
                        </p>

                    </div>

                </div>


                <!-- PERFIL -->

                <div class="header-profile">

                    <div class="profile-info">

                        <div class="profile-text">

                            <p class="profile-name">
                                {{ auth()->user()->name }}
                            </p>

                            <p class="profile-role">
                                Administrador
                            </p>

                        </div>

                        <div class="profile-avatar">

                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                        </div>

                    </div>


                    <!-- CAMBIAR CONTRASEÑA -->

                    <a
                        href="{{ route('password.edit') }}"
                        title="Cambiar contraseña"
                        class="header-action"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5.25 10.5h13.5v9H5.25v-9z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 14.25v1.5"
                            />

                        </svg>

                        <span>
                            Cambiar contraseña
                        </span>

                    </a>


                    <!-- CERRAR SESIÓN -->

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                        class="logout-form"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="header-action"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.8"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m0 0l3-3m3 3l-3 3"
                                />

                            </svg>

                            <span>
                                Cerrar sesión
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </header>


    <!-- =====================================================
         CONTENIDO
    ====================================================== -->

    <main class="dashboard-main">

        <div class="main-container">


            <!-- =================================================
                 BIENVENIDA
            ================================================== -->

            <section class="welcome-section animate-fade-up">

                <!-- Decoración -->

                <div class="welcome-decoration-one"></div>

                <div class="welcome-decoration-two"></div>

                <div class="welcome-decoration-three"></div>


                <div class="welcome-content">

                    <div class="welcome-row">


                        <!-- TEXTO -->

                        <div class="welcome-text">

                            <div class="welcome-badge">

                                <span class="welcome-badge-dot"></span>

                                <span class="welcome-badge-text">
                                    Panel de administración
                                </span>

                            </div>


                            <h2 class="welcome-title">

                                Bienvenido,
                                {{ auth()->user()->name }}

                            </h2>


                            <p class="welcome-description">

                                Administra de manera centralizada los usuarios,
                                formularios y registros del Sistema de
                                Formularios Digitales del DECE.

                            </p>

                        </div>


                        <!-- ICONO -->

                        <div class="welcome-icon-outer animate-float">

                            <div class="welcome-icon-inner">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3.75 6.75A2.25 2.25 0 016 4.5h12a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0118 19.5H6a2.25 2.25 0 01-2.25-2.25V6.75z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8.25 9.75h7.5M8.25 13.5h4.5"
                                    />

                                </svg>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            <!-- =================================================
                 ENCABEZADO FUNCIONES
            ================================================== -->

            <div class="functions-header">

                <p class="functions-label">
                    Administración del sistema
                </p>

                <h3 class="functions-title">
                    Funciones principales
                </h3>

                <p class="functions-description">
                    Seleccione una de las opciones disponibles.
                </p>

            </div>


            <!-- =================================================
                 FUNCIONES
            ================================================== -->

            <section class="functions-grid">


                <!-- =================================================
                     USUARIOS
                ================================================== -->

                <a
                    href="{{ route('usuarios.index') }}"
                    class="dashboard-card animate-fade-up"
                    style="animation-delay: 0.10s"
                >

                    <div class="card-top-line"></div>


                    <div class="card-header">

                        <div class="card-icon">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.375 9.375 0 10-18.75 0A9.38 9.38 0 011.5 19.5"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 8.25v3m1.5-1.5h-3"
                                />

                            </svg>

                        </div>


                        <span class="card-arrow-top">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                />

                            </svg>

                        </span>

                    </div>


                    <p class="card-category">
                        Gestión
                    </p>


                    <h4 class="card-title">
                        Gestionar usuarios
                    </h4>


                    <p class="card-description">

                        Crear, desactivar y reactivar las cuentas
                        de los usuarios del sistema.

                    </p>


                    <div class="card-footer">

                        <span class="card-footer-text">
                            Administrar usuarios
                        </span>

                        <span class="card-footer-arrow">
                            →
                        </span>

                    </div>

                </a>


                <!-- =================================================
                     FORMULARIOS
                ================================================== -->

                <a
                    href="{{ route('formularios.index') }}"
                    class="dashboard-card animate-fade-up"
                    style="animation-delay: 0.18s"
                >

                    <div class="card-top-line"></div>


                    <div class="card-header">

                        <div class="card-icon">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-3.75a3.375 3.375 0 01-3.375-3.375V3.75"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.25 3.75H6.375A2.625 2.625 0 003.75 6.375v11.25a2.625 2.625 0 002.625 2.625h12.75a2.625 2.625 0 002.625-2.625V9.75"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 13.5h6M9 16.5h4.5"
                                />

                            </svg>

                        </div>


                        <span class="card-arrow-top">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                />

                            </svg>

                        </span>

                    </div>


                    <p class="card-category">
                        Documentos
                    </p>


                    <h4 class="card-title">
                        Formularios DECE
                    </h4>


                    <p class="card-description">

                        Acceder a los formularios disponibles
                        del Departamento de Consejería Estudiantil.

                    </p>


                    <div class="card-footer">

                        <span class="card-footer-text">
                            Ver formularios
                        </span>

                        <span class="card-footer-arrow">
                            →
                        </span>

                    </div>

                </a>


                <!-- =================================================
                     REGISTROS
                ================================================== -->

                <a
                    href="{{ route('formularios.registros') }}"
                    class="dashboard-card animate-fade-up"
                    style="animation-delay: 0.26s"
                >

                    <div class="card-top-line"></div>


                    <div class="card-header">

                        <div class="card-icon">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 13.125l6-6 4.5 4.5L21 4.125"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 19.875h18"
                                />

                            </svg>

                        </div>


                        <span class="card-arrow-top">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                />

                            </svg>

                        </span>

                    </div>


                    <p class="card-category">
                        Control
                    </p>


                    <h4 class="card-title">
                        Registros de formularios
                    </h4>


                    <p class="card-description">

                        Consultar los registros generados
                        por los usuarios del sistema.

                    </p>


                    <div class="card-footer">

                        <span class="card-footer-text">
                            Consultar registros
                        </span>

                        <span class="card-footer-arrow">
                            →
                        </span>

                    </div>

                </a>

            </section>

        </div>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="dashboard-footer">

        <div class="footer-container">

            <div class="footer-main">


                <!-- INSTITUCIÓN -->

                <div class="footer-institution">

                    <div class="footer-logo">

                        <img
                            src="{{ asset('images/logo-apch.png') }}"
                            alt="Logo APCH"
                        >

                    </div>


                    <div>

                        <p class="footer-system-name">
                            Sistema de Formularios Digitales
                        </p>

                        <p class="footer-institution-name">
                            Unidad Educativa "Ángel Polibio Chaves" · DECE
                        </p>

                    </div>

                </div>


                <!-- DESARROLLADOR -->

                <div class="footer-developer">

                    <p class="footer-developer-label">
                        Desarrollo
                    </p>

                    <p class="footer-developer-name">
                        Stalyn Alvarado
                    </p>

                    <p class="footer-developer-email">
                        tu-correo@ejemplo.com
                    </p>

                </div>

            </div>


            <!-- SEPARADOR -->

            <div class="footer-bottom">

                <p>
                    Plataforma institucional del Departamento de Consejería Estudiantil
                </p>

                <p>
                    2026–2027 · APCH
                </p>

            </div>

        </div>

    </footer>

</div>

</body>

</html>
