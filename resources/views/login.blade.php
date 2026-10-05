<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acceso | Sistema de Formularios Digitales</title>

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
            min-height: 100vh;
            background: #f1f5f9;
            color: #1e293b;
            font-family: "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        button,
        input {
            font-family: inherit;
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
                transform: translateY(-6px);
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
            animation: fadeUp 0.6s ease-out forwards;
        }

        .animate-fade-in {
            animation: fadeIn 0.7s ease-out forwards;
        }

        .animate-float {
            animation: float 7s ease-in-out infinite;
        }

        .animate-ping {
            animation: ping 1s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        /* =========================================================
           CONTENEDOR PRINCIPAL
        ========================================================= */

        .main-container {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            overflow: hidden;
        }

        /* Decoración superior derecha */

        .decoration-top {
            position: absolute;
            top: -10rem;
            right: -10rem;
            width: 30rem;
            height: 30rem;
            border-radius: 50%;
            background: rgba(249, 231, 231, 0.60);
            filter: blur(48px);
        }

        /* Decoración inferior izquierda */

        .decoration-bottom {
            position: absolute;
            bottom: -12rem;
            left: -10rem;
            width: 30rem;
            height: 30rem;
            border-radius: 50%;
            background: rgba(226, 232, 240, 0.80);
            filter: blur(48px);
        }

        /* =========================================================
           TARJETA PRINCIPAL
        ========================================================= */

        .login-card {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1024px;
            overflow: hidden;
            border-radius: 28px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 25px 70px -20px rgba(15, 23, 42, 0.20);
        }

        .login-grid {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
        }

        /* =========================================================
           PANEL INSTITUCIONAL
        ========================================================= */

        .institution-panel {
            position: relative;
            min-height: 100%;
            background: #f8fafc;
            padding: 3.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .institution-decoration-one {
            position: absolute;
            top: -8rem;
            left: -8rem;
            width: 18rem;
            height: 18rem;
            border-radius: 50%;
            background: rgba(249, 231, 231, 0.50);
        }

        .institution-decoration-two {
            position: absolute;
            right: -8rem;
            bottom: -10rem;
            width: 20rem;
            height: 20rem;
            border-radius: 50%;
            border: 1px solid #f9e7e7;
        }

        .institution-content {
            position: relative;
            z-index: 10;
            width: 100%;
            text-align: center;
        }

        /* =========================================================
           LOGO
        ========================================================= */

        .logo-container {
            width: 144px;
            height: 144px;
            margin: 0 auto;
            padding: 1rem;
            border-radius: 28px;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 15px 35px -12px rgba(15, 23, 42, 0.20);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .logo-container:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(15, 23, 42, 0.25);
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* =========================================================
           INFORMACIÓN INSTITUCIONAL
        ========================================================= */

        .institution-title {
            margin: 2rem 0 0;
            color: #0f172a;
            font-size: 1.875rem;
            line-height: 1.25;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .institution-title span {
            display: block;
            margin-top: 0.25rem;
            color: #1e293b;
        }

        .location {
            margin-top: 1rem;
            color: #64748b;
            font-size: 0.875rem;
        }

        .separator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 2.25rem;
            margin-bottom: 1.75rem;
        }

        .separator-line {
            width: 3rem;
            height: 1px;
            background: #cbd5e1;
        }

        .separator-dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: #c54848;
        }

        .description {
            max-width: 28rem;
            margin: 0 auto;
        }

        .description h2 {
            margin: 0;
            color: #1e293b;
            font-size: 1.125rem;
            line-height: 1.5;
            font-weight: 600;
        }

        .description p {
            margin: 0.75rem 0 0;
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.75;
        }

        /* =========================================================
           ESTADO DEL SISTEMA
        ========================================================= */

        .system-status {
            margin-top: 2.25rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
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
            background: #4ade80;
            opacity: 0.6;
        }

        .status-dot {
            position: relative;
            display: inline-flex;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #22c55e;
        }

        .system-status span:last-child {
            color: #64748b;
            font-size: 0.75rem;
            line-height: 1rem;
            font-weight: 500;
        }

        /* =========================================================
           PANEL DE ACCESO
        ========================================================= */

        .login-panel {
            position: relative;
            overflow: hidden;
            background: #f8fafc;
            padding: 3rem 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-panel::before {
            content: "";
            position: absolute;
            inset: 0;
            background: #c54848;
            clip-path: polygon(
                58% 0,
                100% 0,
                100% 100%,
                0 100%
            );
            opacity: 0.95;
        }

        .login-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 28rem;
        }

        /* =========================================================
           TARJETA DEL FORMULARIO
        ========================================================= */

        .form-card {
            padding: 2.5rem 2.25rem;
            border-radius: 26px;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.70);
            box-shadow: 0 20px 50px -18px rgba(15, 23, 42, 0.28);
            backdrop-filter: blur(8px);
        }

        /* =========================================================
           ENCABEZADO
        ========================================================= */

        .login-header {
            margin-bottom: 2rem;
            text-align: center;
        }

        .login-icon {
            width: 44px;
            height: 44px;
            margin: 0 auto 1rem;
            border-radius: 12px;
            background: #fdf5f5;
            color: #ae3838;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .login-icon svg {
            width: 20px;
            height: 20px;
        }

        .login-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 1.875rem;
            line-height: 1.25;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .login-header p {
            margin: 0.5rem 0 0;
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.5rem;
        }

        /* =========================================================
           ERRORES
        ========================================================= */

        .error-message {
            margin-bottom: 1.5rem;
            padding: 0.875rem 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            border: 1px solid #fecaca;
            border-radius: 16px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .error-message svg {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
            margin-top: 2px;
        }

        /* =========================================================
           FORMULARIO
        ========================================================= */

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .form-group {
            animation-fill-mode: forwards;
        }

        .form-label {
            display: block;
            margin-bottom: 0.625rem;
            color: #334155;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            padding-left: 1.25rem;
            color: #94a3b8;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .input-icon svg {
            width: 20px;
            height: 20px;
        }

        .input-wrapper:focus-within .input-icon {
            color: #c54848;
        }

        .input-field {
            width: 100%;
            min-height: 64px;
            padding: 0 1.25rem 0 3.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            background: #f8fafc;
            color: #1e293b;
            font-size: 1rem;
            outline: none;
            transition:
                border-color 0.2s ease,
                background-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .input-field::placeholder {
            color: #94a3b8;
        }

        .input-field:hover {
            border-color: #cbd5e1;
        }

        .input-field:focus {
            border-color: #d45a5a;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(197, 72, 72, 0.10);
        }

        /* =========================================================
           BOTÓN
        ========================================================= */

        .button-container {
            padding-top: 0.75rem;
        }

        .login-button {
            position: relative;
            width: 100%;
            height: 56px;
            overflow: hidden;
            border: none;
            border-radius: 16px;
            background: #c54848;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(197, 72, 72, 0.20);
            transition:
                background-color 0.3s ease,
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }

        .login-button:hover {
            background: #ae3838;
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(197, 72, 72, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .login-button:focus {
            outline: none;
            box-shadow:
                0 0 0 4px rgba(212, 90, 90, 0.20),
                0 10px 20px rgba(197, 72, 72, 0.20);
        }

        .button-shine {
            position: absolute;
            inset: 0;
            transform: translateX(-100%);
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.15),
                transparent
            );
            transition: transform 0.7s ease;
        }

        .login-button:hover .button-shine {
            transform: translateX(100%);
        }

        .button-content {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .button-content svg {
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
        }

        .login-button:hover .button-content svg {
            transform: translateX(4px);
        }

        /* =========================================================
           PIE DEL FORMULARIO
        ========================================================= */

        .login-footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
            text-align: center;
        }

        .login-footer p {
            margin: 0;
            color: #94a3b8;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .login-footer p + p {
            margin-top: 0.25rem;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1023px) {
            .login-grid {
                grid-template-columns: 1fr;
            }

            .institution-panel {
                padding: 3rem 3rem;
            }

            .login-panel {
                padding: 3rem 3rem;
            }
        }

        @media (max-width: 640px) {
            .main-container {
                padding: 1.5rem 1rem;
            }

            .login-card {
                border-radius: 22px;
            }

            .institution-panel {
                padding: 2.5rem 1.5rem;
            }

            .login-panel {
                padding: 2.5rem 1rem;
            }

            .form-card {
                padding: 2rem 1.5rem;
                border-radius: 22px;
            }

            .logo-container {
                width: 128px;
                height: 128px;
                border-radius: 24px;
            }

            .institution-title {
                font-size: 1.5rem;
            }

            .login-header h2 {
                font-size: 1.75rem;
            }

            .decoration-top {
                width: 20rem;
                height: 20rem;
                top: -7rem;
                right: -7rem;
            }

            .decoration-bottom {
                width: 20rem;
                height: 20rem;
                bottom: -8rem;
                left: -7rem;
            }
        }

        @media (max-width: 400px) {
            .institution-panel {
                padding: 2rem 1rem;
            }

            .login-panel {
                padding: 2rem 0.75rem;
            }

            .form-card {
                padding: 1.75rem 1.25rem;
            }

            .input-field {
                min-height: 58px;
            }

            .login-button {
                height: 54px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================================
         CONTENEDOR PRINCIPAL
    ========================================== -->

    <main class="main-container">

        <!-- Decoración exterior -->
        <div class="decoration-top"></div>

        <div class="decoration-bottom"></div>


        <!-- =========================================
             TARJETA PRINCIPAL
        ========================================== -->

        <div class="login-card animate-fade-in">

            <div class="login-grid">


                <!-- =========================================
                     PANEL INSTITUCIONAL
                ========================================== -->

                <section class="institution-panel">

                    <!-- Decoraciones suaves -->
                    <div class="institution-decoration-one"></div>

                    <div class="institution-decoration-two"></div>


                    <div class="institution-content">

                        <!-- LOGO -->
                        <div class="logo-container animate-float">

                            <img
                                src="{{ asset('images/logo-apch.png') }}"
                                alt="Logo institucional"
                            >

                        </div>


                        <!-- NOMBRE DE LA INSTITUCIÓN -->
                        <h1 class="institution-title">
                            UNIDAD EDUCATIVA

                            <span>
                                "ÁNGEL POLIBIO CHAVES"
                            </span>
                        </h1>


                        <!-- UBICACIÓN -->
                        <p class="location">
                            San Miguel · Provincia Bolívar · Ecuador
                        </p>


                        <!-- SEPARADOR -->
                        <div class="separator">

                            <span class="separator-line"></span>

                            <span class="separator-dot"></span>

                            <span class="separator-line"></span>

                        </div>


                        <!-- DESCRIPCIÓN -->
                        <div class="description">

                            <h2>
                                Sistema de Formularios Digitales del
                                DEPARTAMENTO DE CONSEJERIA ESTUDIANTIL
                            </h2>

                            <p>
                                Plataforma institucional para la gestión,
                                llenado e impresión de formularios de atención
                                psicosocial del Departamento de Consejería
                                Estudiantil.
                            </p>

                        </div>


                        <!-- ESTADO -->
                        <div class="system-status">

                            <span class="status-indicator">

                                <span class="status-ping animate-ping"></span>

                                <span class="status-dot"></span>

                            </span>

                            <span>
                                Sistema institucional
                            </span>

                        </div>

                    </div>

                </section>


                <!-- =========================================
                     PANEL DE ACCESO
                ========================================== -->

                <section class="login-panel">

                    <div class="login-content">


                        <!-- CONTENEDOR DEL FORMULARIO -->
                        <div class="form-card">


                            <!-- ENCABEZADO -->
                            <div class="login-header animate-fade-up">

                                <div class="login-icon">

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
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m0 0l3-3m-3 3l3 3"
                                        />
                                    </svg>

                                </div>


                                <h2>
                                    Iniciar sesión
                                </h2>

                                <p>
                                    Ingrese sus credenciales para acceder al sistema.
                                </p>

                            </div>


                            <!-- =================================
                                 ERRORES DE LARAVEL
                            ================================== -->

                            @if ($errors->any())

                                <div class="error-message animate-fade-up">

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
                                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM10.29 3.86l-7.82 13.5A1.875 1.875 0 004.094 20h15.812a1.875 1.875 0 001.622-2.64l-7.82-13.5a1.875 1.875 0 00-3.418 0z"
                                        />
                                    </svg>

                                    <span>
                                        {{ $errors->first() }}
                                    </span>

                                </div>

                            @endif


                            <!-- =================================
                                 FORMULARIO REAL DE LARAVEL
                            ================================== -->

                            <form
                                method="POST"
                                action="{{ route('login.authenticate') }}"
                                class="login-form"
                            >

                                @csrf


                                <!-- USUARIO -->
                                <div
                                    class="form-group animate-fade-up"
                                    style="animation-delay: 0.1s"
                                >

                                    <label
                                        for="username"
                                        class="form-label"
                                    >
                                        Usuario
                                    </label>


                                    <div class="input-wrapper">

                                        <div class="input-icon">

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
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                                                />
                                            </svg>

                                        </div>


                                        <input
                                            type="text"
                                            id="username"
                                            name="username"
                                            placeholder="Ingrese su usuario"
                                            value="{{ old('username') }}"
                                            autocomplete="username"
                                            required
                                            autofocus
                                            class="input-field"
                                        >

                                    </div>

                                </div>


                                <!-- CONTRASEÑA -->
                                <div
                                    class="form-group animate-fade-up"
                                    style="animation-delay: 0.18s"
                                >

                                    <label
                                        for="password"
                                        class="form-label"
                                    >
                                        Contraseña
                                    </label>


                                    <div class="input-wrapper">

                                        <div class="input-icon">

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
                                                    d="M16.5 10.5V7.125a4.5 4.5 0 00-9 0V10.5m-1.5 0h12a1.5 1.5 0 011.5 1.5v7.125a1.5 1.5 0 01-1.5 1.5h-12a1.5 1.5 0 01-1.5-1.5V12a1.5 1.5 0 011.5-1.5z"
                                                />
                                            </svg>

                                        </div>


                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Ingrese su contraseña"
                                            autocomplete="current-password"
                                            required
                                            class="input-field"
                                        >

                                    </div>

                                </div>


                                <!-- BOTÓN -->
                                <div
                                    class="button-container animate-fade-up"
                                    style="animation-delay: 0.26s"
                                >

                                    <button
                                        type="submit"
                                        class="login-button"
                                    >

                                        <span class="button-shine"></span>


                                        <span class="button-content">

                                            Ingresar al sistema

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

                                    </button>

                                </div>

                            </form>


                            <!-- PIE -->
                            <div
                                class="login-footer animate-fade-up"
                                style="animation-delay: 0.34s"
                            >

                                <p>
                                    Sistema institucional · 2026-2027
                                </p>

                                <p>
                                    Departamento de Consejería Estudiantil
                                </p>

                            </div>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </main>

</body>

</html>
