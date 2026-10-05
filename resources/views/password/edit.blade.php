<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Cambiar contraseña | APCH-DECE</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        background: #e2e8f0;
        color: #1e293b;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-direction: column;
    }

    .header {
        margin: 16px 16px 0;
        background: #e2e8f0;
        border: 2px solid #000;
        border-radius: 24px;
        overflow: hidden;
    }

    .header-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 20px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .logo-box {
        width: 64px;
        height: 64px;
        background: #fff;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .logo-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 8px;
    }

    .institution {
        font-size: 20px;
        font-weight: 800;
        color: #0f172a;
        margin: 0;
    }

    .system-name {
        margin: 5px 0 0;
        font-size: 15px;
        font-weight: 700;
        color: #b91c1c;
    }

    .header-right {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .user-info {
        text-align: right;
    }

    .user-name {
        margin: 0;
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
    }

    .user-role {
        margin: 4px 0 0;
        font-size: 12px;
        color: #64748b;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        padding: 0 20px;
        background: #fff;
        color: #334155;
        border: 2px solid #cbd5e1;
        border-radius: 12px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 700;
        transition: .2s ease;
    }

    .back-button:hover {
        border-color: #dc2626;
        color: #b91c1c;
    }

    main {
        width: 100%;
        max-width: 850px;
        margin: 0 auto;
        padding: 48px 20px 64px;
        flex: 1;
    }

    .page-heading {
        margin-bottom: 28px;
    }

    .badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        background: #fee2e2;
        color: #b91c1c;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 14px;
    }

    h1 {
        margin: 0;
        font-size: 38px;
        line-height: 1.15;
        color: #0f172a;
    }

    .description {
        margin: 10px 0 0;
        font-size: 17px;
        color: #64748b;
    }

    .card {
        background: #fff;
        border: 1px solid #cbd5e1;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .06);
    }

    .red-bar {
        height: 8px;
        background: #b91c1c;
    }

    .card-content {
        padding: 32px;
    }

    .alert-success {
        margin-bottom: 24px;
        padding: 16px 18px;
        background: #f0fdf4;
        border: 1px solid #86efac;
        border-radius: 12px;
        color: #166534;
        font-size: 15px;
        font-weight: 600;
    }

    .alert-error {
        margin-bottom: 24px;
        padding: 16px 18px;
        background: #fef2f2;
        border: 1px solid #fca5a5;
        border-radius: 12px;
        color: #991b1b;
    }

    .alert-error-title {
        margin: 0 0 8px;
        font-weight: 700;
    }

    .alert-error ul {
        margin: 0;
        padding-left: 20px;
    }

    .alert-error li {
        margin-bottom: 4px;
    }

    .field {
        margin-bottom: 24px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #334155;
        font-size: 16px;
        font-weight: 700;
    }

    input {
        width: 100%;
        height: 56px;
        padding: 0 16px;
        border: 2px solid #cbd5e1;
        border-radius: 12px;
        background: #fff;
        color: #0f172a;
        font-size: 16px;
        outline: none;
        transition: .2s ease;
    }

    input:focus {
        border-color: #dc2626;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, .12);
    }

    .help-text {
        margin: 8px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .actions {
        display: flex;
        gap: 12px;
        margin-top: 32px;
    }

    .cancel-button,
    .submit-button {
        flex: 1;
        min-height: 56px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .cancel-button {
        background: #fff;
        color: #334155;
        border: 2px solid #cbd5e1;
    }

    .cancel-button:hover {
        background: #f8fafc;
    }

    .submit-button {
        background: #b91c1c;
        color: #fff;
        border: 2px solid #b91c1c;
    }

    .submit-button:hover {
        background: #991b1b;
        border-color: #991b1b;
    }

    footer {
        background: #000;
        color: #fff;
        margin-top: auto;
    }

    .footer-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 28px 32px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
    }

    .footer-title {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
    }

    .footer-subtitle {
        margin: 5px 0 0;
        color: #cbd5e1;
        font-size: 13px;
    }

    .footer-right {
        text-align: right;
        color: #cbd5e1;
        font-size: 13px;
    }

    .footer-right p {
        margin: 4px 0;
    }

    .footer-right strong {
        color: #fff;
    }

    @media (max-width: 768px) {

        .header {
            margin: 10px 10px 0;
        }

        .header-inner {
            padding: 18px;
            flex-direction: column;
            align-items: stretch;
        }

        .header-right {
            justify-content: space-between;
        }

        .user-info {
            text-align: left;
        }

        main {
            padding: 32px 14px 48px;
        }

        h1 {
            font-size: 30px;
        }

        .card-content {
            padding: 22px;
        }

        .actions {
            flex-direction: column;
        }

        .footer-inner {
            padding: 24px 20px;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-right {
            text-align: left;
        }
    }

    @media (max-width: 480px) {

        .brand {
            align-items: flex-start;
        }

        .logo-box {
            width: 54px;
            height: 54px;
        }

        .institution {
            font-size: 16px;
        }

        .system-name {
            font-size: 13px;
        }

        .header-right {
            flex-direction: column;
            align-items: stretch;
        }

        .back-button {
            width: 100%;
        }

        .description {
            font-size: 15px;
        }
    }
</style>


</head>

<body>


<header class="header">

    <div class="header-inner">

        <div class="brand">

            <div class="logo-box">
                <img
                    src="{{ asset('images/logo-apch.png') }}"
                    alt="Logo APCH"
                >
            </div>

            <div>
                <p class="institution">
                    Unidad Educativa “Ángel Polibio Chaves”
                </p>

                <p class="system-name">
                    Sistema de Gestión DECE
                </p>
            </div>

        </div>

        <div class="header-right">

            <div class="user-info">

                <p class="user-name">
                    {{ auth()->user()->name }}
                </p>

                <p class="user-role">
                    {{ auth()->user()->role === 'admin' ? 'Administrador' : 'Secretaría DECE' }}
                </p>

            </div>

            <a
                href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('secretario.dashboard') }}"
                class="back-button"
            >
                Volver
            </a>

        </div>

    </div>

</header>


<main>

    <div class="page-heading">

        <span class="badge">
            Seguridad de la cuenta
        </span>

        <h1>
            Cambiar contraseña
        </h1>

        <p class="description">
            Actualiza la contraseña de tu cuenta.
        </p>

    </div>


    <div class="card">

        <div class="red-bar"></div>

        <div class="card-content">

            @if (session('success'))

                <div class="alert-success">
                    {{ session('success') }}
                </div>

            @endif


            @if ($errors->any())

                <div class="alert-error">

                    <p class="alert-error-title">
                        Revisa los siguientes datos:
                    </p>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('password.update') }}"
            >

                @csrf

                @method('PUT')


                <div class="field">

                    <label for="current_password">
                        Contraseña actual
                    </label>

                    <input
                        type="password"
                        id="current_password"
                        name="current_password"
                        required
                        autocomplete="current-password"
                    >

                </div>


                <div class="field">

                    <label for="password">
                        Nueva contraseña
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    >

                    <p class="help-text">
                        La nueva contraseña debe tener al menos 8 caracteres.
                    </p>

                </div>


                <div class="field">

                    <label for="password_confirmation">
                        Confirmar nueva contraseña
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    >

                </div>


                <div class="actions">

                    <a
                        href="{{ auth()->user()->role === 'admin' ? route('dashboard') : route('secretario.dashboard') }}"
                        class="cancel-button"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Cambiar contraseña
                    </button>

                </div>

            </form>

        </div>

    </div>

</main>


<footer>

    <div class="footer-inner">

        <div>

            <p class="footer-title">
                Sistema de Gestión DECE
            </p>

            <p class="footer-subtitle">
                Unidad Educativa “Ángel Polibio Chaves”
            </p>

        </div>

        <div class="footer-right">

            <p>
                Desarrollado por
                <strong>Stalyn Alvarado</strong>
            </p>

            <p>
                Departamento de Consejería Estudiantil · APCH · 2026-2027
            </p>

        </div>

    </div>

</footer>


</body>

</html>
