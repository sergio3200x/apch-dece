<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | APCH</title>

<style>
    :root {
        --apch-50: #fef2f2;
        --apch-100: #fee2e2;
        --apch-200: #fecaca;
        --apch-300: #fca5a5;
        --apch-400: #f87171;
        --apch-500: #ef4444;
        --apch-600: #dc2626;
        --apch-700: #b30000;
        --apch-800: #8f0000;
        --apch-900: #650000;
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
        background: #f1f5f9;
        color: #1e293b;
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
        font: inherit;
    }

    /* =========================================
       ANIMACIONES
    ========================================== */

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

    @keyframes pulseSoft {
        0%,
        100% {
            opacity: 0.5;
        }

        50% {
            opacity: 1;
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
        animation: float 5s ease-in-out infinite;
    }

    .animate-pulse-soft {
        animation: pulseSoft 3s ease-in-out infinite;
    }

    .animate-ping {
        animation: ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    /* =========================================
       ENCABEZADO
    ========================================== */

    .page-header {
        position: relative;
        width: 100%;
        margin: 0;
        overflow: hidden;
        border-radius: 20px;
        background: linear-gradient(115deg, #fff 0%, #fff 72%, #fff7f7 100%);
        border: 0;
        border-bottom: 1px solid #e2e8f0;
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

    .header-container {
        width: 100%;
        max-width: none;
        margin: 0 auto;
        padding: 18px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .brand-section {
        display: flex;
        align-items: center;
        gap: 18px;
        min-width: 0;
    }

    .brand-logo {
        width: 80px;
        height: 80px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        background: #fff;
        border: 1px solid #f1d5d5;
        padding: 9px;
        box-shadow: 0 5px 14px rgba(143, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }

    .brand-logo:hover {
        transform: translateY(-1px);
    }

    .brand-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .brand-text {
        min-width: 0;
    }

    .brand-title {
        margin: 0;
        color: #0f172a;
        font-size: 19px;
        font-weight: 700;
        letter-spacing: -0.025em;
        line-height: 1.3;
    }

    .brand-subtitle {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
        font-weight: 500;
        line-height: 1.4;
    }

    .brand-eyebrow {
        margin: 0 0 3px;
        color: #a31616;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.16em;
        line-height: 1.4;
        text-transform: uppercase;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
        padding-left: 20px;
        border-left: 1px solid #e2e8f0;
    }

    .system-status {
        display: none;
        align-items: center;
        gap: 8px;
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
        background: #22c55e;
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

    .status-text {
        color: #64748b;
        font-size: 12px;
        font-weight: 500;
    }

    .user-info {
        display: none;
        align-items: center;
        gap: 10px;
        padding: 8px 12px 8px 8px;
        border-radius: 13px;
        background: #f8fafc;
        border: 1px solid #e8edf3;
    }

    .user-info svg {
        width: 32px;
        height: 32px;
        padding: 7px;
        border-radius: 10px;
        background: #fff1f1;
        color: #a31616;
        flex-shrink: 0;
    }

    .user-name {
        color: #334155;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .header-action,
    .logout-button {
        display: flex;
        align-items: center;
        gap: 8px;
        min-height: 42px;
        padding: 10px 13px;
        border-radius: 12px;
        background: #fff;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
    }

    .header-action {
        border: 1px solid #e2e8f0;
        color: #475569;
    }

    .header-action:hover {
        background: #fff5f5;
        border-color: #e8bcbc;
        color: #9f1717;
        box-shadow: 0 4px 10px rgba(143, 0, 0, 0.08);
        transform: translateY(-1px);
    }

    .logout-form {
        margin: 0;
    }

    .logout-button {
        border: 1px solid #a31616;
        background: #a31616;
        color: #fff;
    }

    .logout-button:hover {
        background: #7f1010;
        border-color: #7f1010;
        color: #fff;
        box-shadow: 0 4px 10px rgba(143, 0, 0, 0.16);
        transform: translateY(-1px);
    }

    .header-action svg,
    .logout-button svg {
        width: 16px;
        height: 16px;
        transition: transform 0.3s ease;
    }

    .header-action:hover svg {
        transform: scale(1.05);
    }

    .logout-button:hover svg {
        transform: translateX(2px);
    }

    .header-action:focus-visible,
    .logout-button:focus-visible {
        outline: 3px solid rgba(163, 22, 22, 0.24);
        outline-offset: 2px;
    }

    /* =========================================
       CONTENIDO
    ========================================== */

    .main-content {
        flex: 1;
    }

    .main-container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 32px 20px;
    }

    /* =========================================
       PANEL DE BIENVENIDA
    ========================================== */

    .welcome-panel {
        position: relative;
        overflow: hidden;
        margin-bottom: 32px;
        border-radius: 16px;
        background: var(--apch-700);
        color: #fff;
        box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12);
        animation: fadeUp 0.6s ease-out forwards;
    }

    .welcome-decoration-1 {
        position: absolute;
        right: -80px;
        top: -96px;
        width: 288px;
        height: 288px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .welcome-decoration-2 {
        position: absolute;
        right: -40px;
        bottom: -112px;
        width: 256px;
        height: 256px;
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.1);
    }

    .welcome-decoration-3 {
        position: absolute;
        left: 50%;
        bottom: -96px;
        width: 192px;
        height: 192px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.05);
    }

    .welcome-content {
        position: relative;
        padding: 24px;
    }

    .welcome-row {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .welcome-badges {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
    }

    .welcome-badge {
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .welcome-panel-label {
        color: rgba(255, 255, 255, 0.6);
        font-size: 12px;
    }

    .welcome-title {
        margin: 0;
        color: #fff;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -0.025em;
    }

    .welcome-description {
        max-width: 672px;
        margin: 12px 0 0;
        color: rgba(255, 255, 255, 0.75);
        font-size: 14px;
        line-height: 1.5rem;
    }

    .welcome-icon {
        display: none;
        width: 64px;
        height: 64px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.2);
        animation: float 5s ease-in-out infinite;
    }

    .welcome-icon svg {
        width: 32px;
        height: 32px;
        color: #fff;
    }

    /* =========================================
       SECCIÓN FORMULARIOS
    ========================================== */

    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .section-heading-content {
        min-width: 0;
    }

    .section-title {
        margin: 0;
        color: #0f172a;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.3;
    }

    .section-description {
        margin: 4px 0 0;
        color: #64748b;
        font-size: 14px;
    }

    .section-line {
        display: none;
        height: 1px;
        flex: 1;
        margin-left: 24px;
        background: #e2e8f0;
    }

    /* =========================================
       TARJETA PRINCIPAL
    ========================================== */

    .forms-card {
        position: relative;
        display: block;
        overflow: hidden;
        border-radius: 16px;
        background: #fff;
        border: 1px solid #e2e8f0;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        animation: fadeUp 0.6s ease-out forwards;
    }

    .forms-card:hover {
        transform: translateY(-4px);
        border-color: var(--apch-200);
        box-shadow: 0 10px 20px rgba(15, 23, 42, 0.1);
    }

    .forms-card-bar {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--apch-700);
    }

    .forms-card-decoration {
        position: absolute;
        right: -64px;
        top: -80px;
        width: 256px;
        height: 256px;
        border-radius: 50%;
        border: 1px solid var(--apch-100);
        transition: transform 0.7s ease;
    }

    .forms-card:hover .forms-card-decoration {
        transform: scale(1.1);
    }

    .forms-card-content {
        position: relative;
        padding: 28px;
    }

    .forms-card-row {
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .forms-card-information {
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }

    .forms-card-icon {
        width: 56px;
        height: 56px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: var(--apch-50);
        border: 1px solid var(--apch-100);
        color: var(--apch-700);
        transition: all 0.3s ease;
    }

    .forms-card:hover .forms-card-icon {
        background: var(--apch-700);
        color: #fff;
        transform: scale(1.05);
    }

    .forms-card-icon svg {
        width: 28px;
        height: 28px;
    }

    .forms-card-title {
        margin: 0;
        color: #0f172a;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.3;
    }

    .forms-card-description {
        max-width: 672px;
        margin: 8px 0 0;
        color: #64748b;
        font-size: 14px;
        line-height: 1.5rem;
    }

    .open-forms {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        color: var(--apch-700);
        font-size: 14px;
        font-weight: 700;
    }

    .open-forms-arrow {
        transition: transform 0.3s ease;
    }

    .forms-card:hover .open-forms-arrow {
        transform: translateX(4px);
    }

    .forms-card-arrow {
        display: none;
        width: 48px;
        height: 48px;
        flex-shrink: 0;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        border: 1px solid #e2e8f0;
        color: #94a3b8;
        transition: all 0.3s ease;
    }

    .forms-card:hover .forms-card-arrow {
        background: var(--apch-700);
        border-color: var(--apch-700);
        color: #fff;
    }

    .forms-card-arrow svg {
        width: 20px;
        height: 20px;
        transition: transform 0.3s ease;
    }

    .forms-card:hover .forms-card-arrow svg {
        transform: translateX(4px);
    }

    /* =========================================
       PIE DE PÁGINA
    ========================================== */

    .site-footer {
        margin-top: auto;
        background: #000;
        color: #fff;
    }

    .footer-container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 28px 20px;
    }

    .footer-main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .footer-brand,
    .footer-author {
        text-align: center;
    }

    .footer-title {
        margin: 0;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
    }

    .footer-institution {
        margin: 4px 0 0;
        color: rgba(255, 255, 255, 0.5);
        font-size: 12px;
    }

    .footer-author-label {
        margin: 0;
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        font-weight: 600;
    }

    .footer-author-name {
        margin: 4px 0 0;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
    }

    .footer-email {
        margin: 0;
        color: rgba(255, 255, 255, 0.4);
        font-size: 12px;
    }

    .footer-bottom {
        margin-top: 20px;
        padding-top: 16px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
    }

    .footer-bottom-text {
        margin: 0;
        color: rgba(255, 255, 255, 0.4);
        font-size: 11px;
    }

    /* =========================================
       RESPONSIVE
    ========================================== */

    @media (min-width: 640px) {
        .header-container {
            padding-left: 32px;
            padding-right: 32px;
        }

        .header-action,
        .logout-button {
            padding-left: 13px;
            padding-right: 13px;
        }

        .user-info {
            display: flex;
        }

        .header-action span,
        .logout-button span {
            display: inline;
        }

        .main-container {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .welcome-content {
            padding: 32px;
        }

        .welcome-row {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .welcome-icon {
            display: flex;
            width: 64px;
            height: 64px;
        }

        .welcome-title {
            font-size: 30px;
        }

        .welcome-description {
            font-size: 16px;
        }

        .section-title {
            font-size: 24px;
        }

        .forms-card-content {
            padding: 36px;
        }

        .forms-card-row {
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .forms-card-title {
            font-size: 24px;
        }

        .forms-card-description {
            font-size: 16px;
        }

        .forms-card-arrow {
            display: flex;
        }

        .footer-main {
            flex-direction: row;
            align-items: center;
        }

        .footer-brand {
            text-align: left;
        }

        .footer-author {
            text-align: right;
        }

        .footer-bottom {
            text-align: center;
        }
    }

    @media (min-width: 768px) {
        .system-status {
            display: flex;
        }
    }

    @media (min-width: 1024px) {
        .header-container {
            padding-left: 32px;
            padding-right: 32px;
        }

        .main-container {
            padding-left: 32px;
            padding-right: 32px;
        }

        .welcome-content {
            padding: 36px;
        }

        .welcome-icon {
            width: 80px;
            height: 80px;
        }

        .welcome-icon svg {
            width: 40px;
            height: 40px;
        }

        .welcome-title {
            font-size: 36px;
        }

        .section-line {
            display: block;
        }

        .forms-card-content {
            padding: 36px;
        }

        .footer-container {
            padding-left: 32px;
            padding-right: 32px;
        }
    }

    @media (max-width: 639px) {
        .header-container {
            flex-wrap: wrap;
            padding: 14px 14px 12px 16px;
            gap: 12px;
        }

        .brand-section {
            width: 100%;
            min-width: 0;
            gap: 12px;
        }

        .brand-logo {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            padding: 8px;
        }

        .brand-title {
            font-size: 15px;
        }

        .brand-subtitle {
            margin-top: 3px;
            font-size: 10px;
        }

        .brand-eyebrow {
            font-size: 9px;
        }

        .header-actions {
            width: 100%;
            justify-content: flex-end;
            gap: 8px;
            padding: 10px 0 0;
            border-top: 1px solid #eef0f3;
            border-left: 0;
        }

        .header-action span {
            display: none;
        }

        .logout-button span {
            display: none;
        }

        .header-action,
        .logout-button {
            width: 40px;
            min-height: 40px;
            justify-content: center;
            padding: 0;
        }

        .header-actions .system-status {
            margin-right: auto;
        }

        .page-header {
            width: 100%;
            margin-top: 0;
            border-radius: 18px;
        }
    }
</style>
</head>

<body>
    <!-- =========================================
     ENCABEZADO
========================================== -->

<header class="page-header">

    <div class="header-container">

        <!-- IDENTIDAD -->

        <div class="brand-section">

            <div class="brand-logo">

                <img
                    src="{{ asset('images/logo-apch.png') }}"
                    alt="Logo APCH"
                >

            </div>

            <div class="brand-text">

                <p class="brand-eyebrow">
                    APCH · DECE
                </p>

                <h1 class="brand-title">
                    Sistema de Formularios Digitales
                </h1>

                <p class="brand-subtitle">
                    UNIDAD EDUCATIVA "ÁNGEL POLIBIO CHAVES"
                </p>

            </div>

        </div>

        <!-- USUARIO + LOGOUT -->

        <div class="header-actions">

            <!-- ESTADO -->

            <div class="system-status">

                <span class="status-indicator">

                    <span class="status-ping animate-ping"></span>

                    <span class="status-dot"></span>

                </span>

                <span class="status-text">
                    Sistema activo
                </span>

            </div>

            <!-- USUARIO -->

            <div class="user-info">

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
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                    />

                </svg>

                <span class="user-name">
                    {{ auth()->user()->name }}
                </span>

            </div>

            <!-- CAMBIAR CONTRASEÑA -->

            <a
                href="{{ route('password.edit') }}"
                title="Cambiar contraseña"
                aria-label="Cambiar contraseña"
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
                    class="logout-button"
                    aria-label="Cerrar sesión"
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

</header>

<!-- =========================================
     CONTENIDO
========================================== -->

<main class="main-content">

    <div class="main-container">

        <!-- =================================
             PANEL DE BIENVENIDA
        ================================== -->

        <section class="welcome-panel">

            <!-- Decoraciones -->

            <div class="welcome-decoration-1"></div>

            <div class="welcome-decoration-2"></div>

            <div class="welcome-decoration-3"></div>

            <div class="welcome-content">

                <div class="welcome-row">

                    <div>

                        <div class="welcome-badges">

                            <span class="welcome-badge">
                                Secretaría DECE
                            </span>

                            <span class="welcome-panel-label">
                                Panel principal
                            </span>

                        </div>

                        <h2 class="welcome-title">
                            Bienvenido, {{ auth()->user()->name }}
                        </h2>

                        <p class="welcome-description">
                            Acceda a los formularios institucionales
                            del Departamento de Consejería Estudiantil
                            para su llenado e impresión.
                        </p>

                    </div>

                    <!-- ICONO -->

                    <div class="welcome-icon">

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
                                d="M19.5 14.25v-8.625a1.125 1.125 0 00-1.125-1.125H5.625A1.125 1.125 0 004.5 5.625v12.75A1.125 1.125 0 005.625 19.5H18.375A1.125 1.125 0 0019.5 18.375v-4.125z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h4.5"
                            />

                        </svg>

                    </div>

                </div>

            </div>

        </section>

        <!-- =================================
             SECCIÓN FORMULARIOS
        ================================== -->

        <div class="section-heading">

            <div class="section-heading-content">

                <h3 class="section-title">
                    Formularios DECE
                </h3>

                <p class="section-description">
                    Acceda al catálogo de formularios institucionales.
                </p>

            </div>

            <div class="section-line"></div>

        </div>

        <!-- =================================
             TARJETA PRINCIPAL
        ================================== -->

        <a
            href="{{ route('formularios.index') }}"
            class="forms-card"
        >

            <!-- Barra roja -->

            <div class="forms-card-bar"></div>

            <!-- Decoración -->

            <div class="forms-card-decoration"></div>

            <div class="forms-card-content">

                <div class="forms-card-row">

                    <!-- INFORMACIÓN -->

                    <div class="forms-card-information">

                        <div class="forms-card-icon">

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
                                    d="M19.5 14.25v-8.625a1.125 1.125 0 00-1.125-1.125H5.625A1.125 1.125 0 004.5 5.625v12.75A1.125 1.125 0 005.625 19.5H18.375A1.125 1.125 0 0019.5 18.375v-4.125z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h4.5"
                                />

                            </svg>

                        </div>

                        <div>

                            <h4 class="forms-card-title">
                                Formularios disponibles
                            </h4>

                            <p class="forms-card-description">
                                Acceda a los formularios del Departamento
                                de Consejería Estudiantil para realizar
                                su llenado e impresión.
                            </p>

                            <div class="open-forms">

                                Abrir formularios

                                <span class="open-forms-arrow">
                                    →
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- FLECHA -->

                    <div class="forms-card-arrow">

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
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />

                        </svg>

                    </div>

                </div>

            </div>

        </a>

    </div>

</main>

<!-- =========================================
     PIE DE PÁGINA
========================================== -->

<footer class="site-footer">

    <div class="footer-container">

        <div class="footer-main">

            <div class="footer-brand">

                <p class="footer-title">
                    Sistema de Formularios Digitales del DECE
                </p>

                <p class="footer-institution">
                    Unidad Educativa "Ángel Polibio Chaves"
                </p>

            </div>

            <div class="footer-author">

                <p class="footer-author-label">
                    Desarrollado por
                </p>

                <p class="footer-author-name">
                    Stalyn Alvarado
                </p>

                <p class="footer-email">
                    tu-correo@ejemplo.com
                </p>

            </div>

        </div>

        <div class="footer-bottom">

            <p class="footer-bottom-text">
                Departamento de Consejería Estudiantil · APCH · 2026-2027
            </p>

        </div>

    </div>

</footer>
</body>

</html>
