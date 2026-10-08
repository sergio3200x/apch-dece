<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Usuarios | APCH</title>

    <style>

        /* =========================================================
           VARIABLES
        ========================================================= */

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
            --green-100: #dcfce7;
            --green-200: #bbf7d0;
            --green-400: #4ade80;
            --green-500: #22c55e;
            --green-600: #16a34a;
            --green-700: #15803d;
            --green-800: #166534;
        }


        /* =========================================================
           RESET GENERAL
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
            background: var(--slate-100);
            color: var(--slate-800);
            font-family: "Segoe UI", Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select,
        textarea {
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


        @keyframes ping {

            0% {
                transform: scale(1);
                opacity: 0.6;
            }

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
            animation: fadeIn 0.5s ease-out forwards;
        }


        /* =========================================================
           CABECERA
        ========================================================= */

        .site-header {
            position: relative;
            width: 100%;
            margin: 0;
            overflow: hidden;
            border: 0;
            border-bottom: 1px solid var(--slate-200);
            border-radius: 20px;
            background: linear-gradient(115deg, #fff 0%, #fff 72%, #fff7f7 100%);
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.07);
        }

        .site-header::before {
            position: absolute;
            inset: 0 auto 0 0;
            width: 5px;
            background: linear-gradient(180deg, #d34848, #8f0000);
            content: "";
        }

        .site-header::after {
            position: absolute;
            inset: auto 0 0;
            height: 4px;
            background: linear-gradient(90deg, #8f0000, #d34848 50%, #8f0000);
            content: "";
        }


        .header-container {
            width: 100%;
            max-width: none;
            margin: 0 auto;
            padding: 12px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            min-height: 104px;
        }


        .header-left {
            display: flex;
            align-items: center;
            gap: 18px;
            min-width: 0;
        }


        .logo-container {
            width: 80px;
            height: 80px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 9px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 14px rgba(143, 0, 0, 0.08);
            border: 1px solid #f1d5d5;
        }


        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }


        .header-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 19px;
            font-weight: 700;
            line-height: 1.25;
            letter-spacing: -0.025em;
        }


        .header-subtitle {
            margin: 3px 0 0;
            color: var(--slate-500);
            font-size: 13px;
            font-weight: 500;
            line-height: 1.5;
        }

        .header-eyebrow {
            margin: 0 0 3px;
            color: #a31616;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.16em;
            line-height: 1.4;
            text-transform: uppercase;
        }


        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-shrink: 0;
            padding-left: 20px;
            border-left: 1px solid var(--slate-200);
        }


        /* =========================================================
           ESTADO DEL SISTEMA
        ========================================================= */

        .system-status {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid #bbf7d0;
            border-radius: 999px;
            background: var(--green-50);
            color: var(--green-700);
            font-size: 14px;
            font-weight: 600;
        }


        .status-dot-container {
            position: relative;
            display: flex;
            width: 10px;
            height: 10px;
        }


        .status-dot-ping {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: var(--green-400);
            opacity: 0.6;
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }


        .status-dot {
            position: relative;
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--green-500);
        }


        /* =========================================================
           BOTÓN CERRAR SESIÓN
        ========================================================= */

        .logout-button {
            display: flex;
            align-items: center;
            gap: 8px;
            min-height: 42px;
            padding: 10px 13px;
            border: 1px solid #a31616;
            border-radius: 12px;
            background: #a31616;
            color: #fff;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition:
                border-color 0.2s ease,
                background-color 0.2s ease,
                color 0.2s ease,
                box-shadow 0.2s ease,
                transform 0.2s ease;
        }


        .logout-button svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }


        .logout-button:hover {
            border-color: #7f1010;
            background: #7f1010;
            color: #fff;
            box-shadow: 0 4px 10px rgba(143, 0, 0, 0.16);
            transform: translateY(-1px);
        }

        .logout-button:focus-visible {
            outline: 3px solid rgba(163, 22, 22, 0.24);
            outline-offset: 2px;
        }


        .logout-button:hover svg {
            transform: translateX(2px);
        }


        /* =========================================================
           CONTENIDO PRINCIPAL
        ========================================================= */

        main {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 40px 24px;
        }


        /* =========================================================
           TÍTULO
        ========================================================= */

        .page-heading {
            margin-bottom: 32px;
        }


        .page-heading-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
        }


        .section-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 8px;
        }


        .section-label-dot {
            width: 10px;
            height: 10px;
            flex-shrink: 0;
            border-radius: 50%;
            background: var(--apch-700);
        }


        .section-label-text {
            margin: 0;
            color: var(--apch-700);
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.2em;
        }


        .page-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 48px;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.025em;
        }


        .page-description {
            max-width: 672px;
            margin: 12px 0 0;
            color: var(--slate-500);
            font-size: 18px;
            line-height: 1.75;
        }


        /* =========================================================
           BOTÓN CREAR USUARIO
        ========================================================= */

        .create-user-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            padding: 16px 24px;
            border-radius: 16px;
            background: var(--apch-700);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            box-shadow: 0 10px 15px -3px rgba(127, 29, 29, 0.10);
            transition:
                transform 0.3s ease,
                background 0.3s ease,
                box-shadow 0.3s ease;
            white-space: nowrap;
        }


        .create-user-button:hover {
            transform: translateY(-4px);
            background: var(--apch-800);
            box-shadow: 0 20px 25px -5px rgba(127, 29, 29, 0.12);
        }


        .create-user-icon {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.20);
        }


        .create-user-icon svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }


        .create-user-button:hover .create-user-icon svg {
            transform: rotate(90deg);
        }


        /* =========================================================
           MENSAJE DE ÉXITO
        ========================================================= */

        .success-message {
            margin-bottom: 32px;
            padding: 20px 24px;
            border: 2px solid var(--green-200);
            border-radius: 16px;
            background: var(--green-50);
        }


        .success-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }


        .success-icon {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--green-100);
            color: var(--green-700);
        }


        .success-icon svg {
            width: 24px;
            height: 24px;
        }


        .success-title {
            margin: 0;
            color: var(--green-800);
            font-size: 16px;
            font-weight: 700;
        }


        .success-text {
            margin: 4px 0 0;
            color: var(--green-700);
            font-size: 14px;
        }


        /* =========================================================
           RESUMEN
        ========================================================= */

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 32px;
        }


        .summary-card {
            padding: 24px;
            border: 2px solid var(--slate-200);
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
            transition:
                transform 0.3s ease,
                box-shadow 0.3s ease;
        }


        .summary-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 10px rgba(15, 23, 42, 0.10);
        }


        .summary-card-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }


        .summary-label {
            margin: 0;
            color: var(--slate-500);
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }


        .summary-number {
            margin: 8px 0 0;
            color: var(--slate-900);
            font-size: 36px;
            font-weight: 700;
            line-height: 1;
        }


        .summary-icon {
            width: 56px;
            height: 56px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--apch-50);
            color: var(--apch-700);
        }


        .summary-icon svg {
            width: 28px;
            height: 28px;
        }


        /* =========================================================
           TABLA
        ========================================================= */

        .users-section {
            overflow: hidden;
            border: 2px solid var(--slate-200);
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
        }


        .table-header {
            padding: 24px 32px;
            border-bottom: 2px solid var(--slate-100);
        }


        .table-header-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
        }


        .table-title {
            margin: 0;
            color: var(--slate-900);
            font-size: 20px;
            font-weight: 700;
        }


        .table-description {
            margin: 4px 0 0;
            color: var(--slate-500);
            font-size: 14px;
        }


        .access-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: 1px solid var(--apch-200);
            border-radius: 999px;
            background: var(--apch-50);
            color: var(--apch-700);
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }


        .access-badge svg {
            width: 20px;
            height: 20px;
        }


        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }


        .users-table {
            width: 100%;
            min-width: 800px;
            border-collapse: collapse;
        }


        .users-table thead tr {
            background: var(--slate-50);
        }


        .users-table th {
            padding: 20px 24px;
            border-bottom: 1px solid var(--slate-200);
            color: var(--slate-500);
            font-size: 14px;
            font-weight: 700;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }


        .users-table td {
            padding: 20px 24px;
            border-bottom: 1px solid var(--slate-100);
        }


        .users-table tbody tr {
            transition: background 0.2s ease;
        }


        .users-table tbody tr:hover {
            background: rgba(254, 242, 242, 0.40);
        }


        /* =========================================================
           INFORMACIÓN DEL USUARIO
        ========================================================= */

        .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
        }


        .user-avatar {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: var(--apch-50);
            color: var(--apch-700);
            font-size: 16px;
            font-weight: 700;
            transition:
                background 0.2s ease,
                color 0.2s ease;
        }


        .users-table tbody tr:hover .user-avatar {
            background: var(--apch-700);
            color: #fff;
        }


        .user-name {
            margin: 0;
            color: var(--slate-800);
            font-size: 16px;
            font-weight: 700;
        }


        .user-account {
            margin: 4px 0 0;
            color: var(--slate-400);
            font-size: 14px;
        }


        /* =========================================================
           NOMBRE DE USUARIO
        ========================================================= */

        .username-badge {
            display: inline-flex;
            padding: 8px 12px;
            border-radius: 8px;
            background: var(--slate-100);
            color: var(--slate-600);
            font-size: 14px;
            font-weight: 600;
        }


        /* =========================================================
           ROLES
        ========================================================= */

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 999px;
            background: var(--apch-50);
            color: var(--apch-700);
            font-size: 14px;
            font-weight: 700;
        }


        .role-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--apch-700);
        }


        /* =========================================================
           ESTADOS
        ========================================================= */

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
        }


        .status-active {
            background: var(--green-50);
            color: var(--green-700);
        }


        .status-inactive {
            background: var(--slate-100);
            color: var(--slate-500);
        }


        .status-dot-wrapper {
            position: relative;
            display: flex;
            width: 10px;
            height: 10px;
        }


        .status-active .status-dot-wrapper::before {
            content: "";
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--green-400);
            opacity: 0.5;
            animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
        }


        .status-active .status-dot-wrapper::after {
            content: "";
            position: relative;
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--green-500);
        }


        .status-inactive .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--slate-400);
        }


        /* =========================================================
           BOTONES DE ACCIÓN
        ========================================================= */

        .action-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition:
                border-color 0.2s ease,
                background 0.2s ease,
                color 0.2s ease;
        }


        .action-button svg {
            width: 16px;
            height: 16px;
            transition: transform 0.2s ease;
        }


        .action-button:hover svg {
            transform: scale(1.1);
        }


        .deactivate-button {
            border: 1px solid var(--apch-200);
            background: var(--apch-50);
            color: var(--apch-700);
        }


        .deactivate-button:hover {
            border-color: var(--apch-700);
            background: var(--apch-700);
            color: #fff;
        }


        .reactivate-button {
            border: 1px solid var(--green-200);
            background: var(--green-50);
            color: var(--green-700);
        }


        .reactivate-button:hover {
            border-color: var(--green-600);
            background: var(--green-600);
            color: #fff;
        }


        /* =========================================================
           TABLA VACÍA
        ========================================================= */

        .empty-cell {
            padding: 80px 24px !important;
            text-align: center !important;
        }


        .empty-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


        .empty-icon {
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            background: var(--apch-50);
            color: var(--apch-700);
        }


        .empty-icon svg {
            width: 32px;
            height: 32px;
        }


        .empty-title {
            margin: 20px 0 0;
            color: var(--slate-700);
            font-size: 16px;
            font-weight: 700;
        }


        .empty-description {
            margin: 4px 0 0;
            color: var(--slate-400);
            font-size: 14px;
        }


        /* =========================================================
           PIE DE PÁGINA
        ========================================================= */

        .site-footer {
            margin-top: 32px;
            background: #000;
            color: #fff;
        }


        .footer-container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            text-align: center;
        }


        .footer-title {
            margin: 0;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
        }


        .footer-subtitle {
            margin: 4px 0 0;
            color: rgba(255, 255, 255, 0.60);
            font-size: 12px;
        }


        .footer-developer {
            margin: 0;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
        }


        .footer-email {
            margin: 4px 0 0;
            color: rgba(255, 255, 255, 0.60);
            font-size: 12px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (min-width: 640px) {

            .header-title {
                font-size: 19px;
            }

            .header-subtitle {
                font-size: 13px;
            }

            .page-heading-content {
                flex-direction: row;
                align-items: center;
            }

            .summary-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .table-header-content {
                flex-direction: row;
                align-items: center;
            }

            .footer-container {
                flex-direction: row;
                text-align: left;
            }

        }


        @media (min-width: 768px) {

            main {
                padding-top: 48px;
                padding-bottom: 48px;
            }

        }


        @media (min-width: 1024px) {

            .header-container {
                padding-left: 32px;
                padding-right: 32px;
            }

            main {
                padding-left: 40px;
                padding-right: 40px;
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .footer-container {
                padding-left: 40px;
                padding-right: 40px;
            }

        }


        @media (max-width: 639px) {

            .header-container {
                min-height: 0;
                flex-wrap: wrap;
                padding: 14px 14px 12px 16px;
                gap: 12px;
            }

            .site-header {
                border-radius: 18px;
            }

            .header-left {
                width: 100%;
                gap: 12px;
            }

            .logo-container {
                width: 64px;
                height: 64px;
                padding: 8px;
                border-radius: 16px;
            }

            .header-title {
                font-size: 15px;
                line-height: 1.3;
            }

            .header-subtitle {
                font-size: 10px;
            }

            .header-eyebrow {
                font-size: 9px;
            }

            .header-right {
                width: 100%;
                justify-content: flex-end;
                padding: 10px 0 0;
                border-top: 1px solid #eef0f3;
                border-left: 0;
            }

            .system-status {
                display: none;
            }

            .logout-button {
                font-size: 0;
                width: 40px;
                height: 40px;
                min-height: 40px;
                justify-content: center;
                padding: 0;
            }

            .logout-button svg {
                width: 20px;
                height: 20px;
            }

            main {
                padding: 32px 16px;
            }

            .page-title {
                font-size: 36px;
            }

            .page-description {
                font-size: 16px;
                line-height: 1.6;
            }

            .create-user-button {
                width: 100%;
            }

            .table-header {
                padding: 20px;
            }

        }

    </style>

</head>


<body>

    <!-- =========================================================
         CABECERA
    ========================================================== -->

    <header class="site-header">

        <div class="header-container">

            <!-- IZQUIERDA -->

            <div class="header-left">

                <div class="logo-container">

                    <img
                        src="{{ asset('images/logo-apch.png') }}"
                        alt="Logo APCH"
                    >

                </div>


                <div>

                    <p class="header-eyebrow">
                        APCH · DECE
                    </p>

                    <h1 class="header-title">

                        Sistema de Formularios Digitales

                    </h1>


                    <p class="header-subtitle">

                        UNIDAD EDUCATIVA "ÁNGEL POLIBIO CHAVES"

                    </p>

                </div>

            </div>


            <!-- DERECHA -->

            <div class="header-right">

                <!-- SISTEMA ACTIVO -->

                <div class="system-status">

                    <span class="status-dot-container">

                        <span class="status-dot-ping"></span>

                        <span class="status-dot"></span>

                    </span>

                    Sistema activo

                </div>


                <!-- CERRAR SESIÓN -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-button"
                        aria-label="Cerrar sesión"
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
    ========================================================== -->

    <main>

        <!-- =====================================================
             TÍTULO
        ====================================================== -->

        <section class="page-heading animate-fade-up">

            <div class="page-heading-content">

                <div>

                    <div class="section-label">

                        <span class="section-label-dot"></span>

                        <p class="section-label-text">

                            Administración

                        </p>

                    </div>


                    <h2 class="page-title">

                        Gestión de usuarios

                    </h2>


                    <p class="page-description">

                        Administre las cuentas, roles y estados de acceso
                        de los usuarios del sistema institucional.

                    </p>

                </div>


                <!-- CREAR USUARIO -->

                <a
                    href="{{ route('usuarios.create') }}"
                    class="create-user-button"
                >

                    <span class="create-user-icon">

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
                                d="M12 4v16m8-8H4"
                            />

                        </svg>

                    </span>

                    Crear usuario

                </a>

            </div>

        </section>


        <!-- =====================================================
             MENSAJE DE ÉXITO
        ====================================================== -->

        @if (session('success'))

            <div class="success-message animate-fade-in">

                <div class="success-content">

                    <div class="success-icon">

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
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                    </div>


                    <div>

                        <p class="success-title">

                            Operación realizada correctamente

                        </p>


                        <p class="success-text">

                            {{ session('success') }}

                        </p>

                    </div>

                </div>

            </div>

        @endif


        <!-- =====================================================
             RESUMEN
        ====================================================== -->

        @php

            $totalUsuarios = $usuarios->count();

            $usuariosActivos = $usuarios->where('status', true)->count();

            $usuariosInactivos = $usuarios->where('status', false)->count();

        @endphp


        <section class="summary-grid animate-fade-up">


            <!-- TOTAL -->

            <div class="summary-card">

                <div class="summary-card-content">

                    <div>

                        <p class="summary-label">

                            Total de usuarios

                        </p>


                        <p class="summary-number">

                            {{ $totalUsuarios }}

                        </p>

                    </div>


                    <div class="summary-icon">

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
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.003a9.365 9.365 0 01-3.75.772 9.36 9.36 0 01-3.75-.772m0 0a9.35 9.35 0 01-3.75.772M12 12a3 3 0 100-6 3 3 0 000 6z"
                            />

                        </svg>

                    </div>

                </div>

            </div>


            <!-- ACTIVOS -->

            <div class="summary-card">

                <div class="summary-card-content">

                    <div>

                        <p class="summary-label">

                            Usuarios activos

                        </p>


                        <p class="summary-number">

                            {{ $usuariosActivos }}

                        </p>

                    </div>


                    <div class="summary-icon">

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
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />

                        </svg>

                    </div>

                </div>

            </div>


            <!-- INACTIVOS -->

            <div class="summary-card">

                <div class="summary-card-content">

                    <div>

                        <p class="summary-label">

                            Usuarios inactivos

                        </p>


                        <p class="summary-number">

                            {{ $usuariosInactivos }}

                        </p>

                    </div>


                    <div class="summary-icon">

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
                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636"
                            />

                        </svg>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             TABLA
        ====================================================== -->

        <section class="users-section animate-fade-up">


            <!-- CABECERA TABLA -->

            <div class="table-header">

                <div class="table-header-content">

                    <div>

                        <h3 class="table-title">

                            Usuarios registrados

                        </h3>


                        <p class="table-description">

                            Cuentas con acceso al sistema institucional.

                        </p>

                    </div>


                    <div class="access-badge">

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
                                d="M12 4.5a3 3 0 110 6 3 3 0 010-6zm-6 14.25a6 6 0 1112 0H6z"
                            />

                        </svg>

                        Gestión de acceso

                    </div>

                </div>

            </div>


            <!-- TABLA RESPONSIVE -->

            <div class="table-wrapper">

                <table class="users-table">


                    <thead>

                        <tr>

                            <th>

                                Nombre

                            </th>

                            <th>

                                Usuario

                            </th>

                            <th>

                                Rol

                            </th>

                            <th>

                                Estado

                            </th>

                            <th>

                                Acción

                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($usuarios as $usuario)

                            <tr>


                                <!-- NOMBRE -->

                                <td>

                                    <div class="user-info">

                                        <div class="user-avatar">

                                            {{ strtoupper(substr($usuario->name, 0, 1)) }}

                                        </div>


                                        <div>

                                            <p class="user-name">

                                                {{ $usuario->name }}

                                            </p>


                                            <p class="user-account">

                                                Cuenta institucional

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <!-- USUARIO -->

                                <td>

    <span class="username-badge">
        {{ $usuario->username }}
    </span>

</td>


<!-- ROL -->

<td>

    @if ($usuario->role === 'coordinador')

        <span class="role-badge">

            <span class="role-dot"></span>

            Coordinador/a

        </span>

    @else

        <span class="role-badge">

            <span class="role-dot"></span>

            Analista

        </span>

    @endif

</td>


<!-- ESTADO -->

<td>

    @if ($usuario->status)

        <span class="status-badge status-active">

            <span class="status-dot-wrapper"></span>

            Activo

        </span>

    @else

        <span class="status-badge status-inactive">

            <span class="status-dot"></span>

            Inactivo

        </span>

    @endif

</td>

                                <!-- ACCIÓN -->

                                <td>

                                    @if ($usuario->status)

                                        <form
                                            method="POST"
                                            action="{{ route('usuarios.desactivar', $usuario) }}"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="action-button deactivate-button"
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
                                                        d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636"
                                                    />

                                                </svg>

                                                Desactivar

                                            </button>

                                        </form>

                                    @else

                                        <form
                                            method="POST"
                                            action="{{ route('usuarios.reactivar', $usuario) }}"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="action-button reactivate-button"
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
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                    />

                                                </svg>

                                                Reactivar

                                            </button>

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="empty-cell"
                                >

                                    <div class="empty-container">

                                        <div class="empty-icon">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.003a9.365 9.365 0 01-3.75-.772m0 0a9.35 9.35 0 01-3.75.772m3.75-.772v-.003c0-1.113.285-2.16.786-3.07M12 12a3 3 0 100-6 3 3 0 000 6z"
                                                />

                                            </svg>

                                        </div>


                                        <p class="empty-title">

                                            No existen usuarios registrados.

                                        </p>


                                        <p class="empty-description">

                                            Los usuarios creados aparecerán aquí.

                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <!-- =========================================================
         PIE DE PÁGINA
    ========================================================== -->

    <footer class="site-footer">

        <div class="footer-container">

            <div>

                <p class="footer-title">

                    Sistema de Formularios Digitales APCH

                </p>


                <p class="footer-subtitle">

                    Unidad Educativa "Ángel Polibio Chaves"

                </p>

            </div>


            <div>

                <p class="footer-developer">

                    Desarrollado por Stalyn Alvarado

                </p>


                <p class="footer-email">

                    tu-correo@ejemplo.com

                </p>

            </div>

        </div>

    </footer>


</body>

</html>
