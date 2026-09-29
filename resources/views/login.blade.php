<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Acceso | Sistema de Formularios Digitales</title>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Segoe UI', 'Arial', 'sans-serif'],
                },

                colors: {
                    apch: {
                        50: '#fdf5f5',
                        100: '#f9e7e7',
                        200: '#f1caca',
                        300: '#e6a0a0',
                        400: '#dc7676',
                        500: '#d45a5a',
                        600: '#c54848',
                        700: '#ae3838',
                        800: '#933030',
                        900: '#7a2929',
                    }
                },

                animation: {
                    'fade-up': 'fadeUp 0.6s ease-out forwards',
                    'fade-in': 'fadeIn 0.7s ease-out forwards',
                    'float': 'float 7s ease-in-out infinite',
                },

                keyframes: {
                    fadeUp: {
                        '0%': {
                            opacity: '0',
                            transform: 'translateY(14px)'
                        },
                        '100%': {
                            opacity: '1',
                            transform: 'translateY(0)'
                        },
                    },

                    fadeIn: {
                        '0%': {
                            opacity: '0'
                        },
                        '100%': {
                            opacity: '1'
                        },
                    },

                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0)'
                        },
                        '50%': {
                            transform: 'translateY(-6px)'
                        },
                    },
                }
            }
        }
    }
</script>

<style>
    html {
        scroll-behavior: smooth;
    }

    body {
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
    }

    .input-field {
        min-height: 64px;
    }

    /* División diagonal del panel de acceso */
    .login-panel {
        position: relative;
        overflow: hidden;
        background: #f8fafc;
    }

    .login-panel::before {
        content: "";
        position: absolute;
        inset: 0;
        background: #c54848;
        clip-path: polygon(58% 0, 100% 0, 100% 100%, 0 100%);
        opacity: 0.95;
    }

    .login-content {
        position: relative;
        z-index: 2;
    }
</style>
```

</head>

<body class="min-h-screen bg-slate-100 font-sans text-slate-800">


<!-- =========================================
     CONTENEDOR PRINCIPAL
========================================== -->

<main class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6 lg:px-8 relative overflow-hidden">

    <!-- Decoración exterior -->
    <div class="absolute -top-40 -right-40 w-[30rem] h-[30rem] rounded-full bg-apch-100/60 blur-3xl"></div>

    <div class="absolute -bottom-48 -left-40 w-[30rem] h-[30rem] rounded-full bg-slate-200/80 blur-3xl"></div>


    <!-- =========================================
         TARJETA PRINCIPAL
    ========================================== -->

    <div
        class="relative z-10 w-full max-w-5xl overflow-hidden rounded-[28px] bg-white border border-slate-200 shadow-[0_25px_70px_-20px_rgba(15,23,42,0.20)] animate-fade-in"
    >

        <div class="grid grid-cols-1 lg:grid-cols-[0.95fr_1.05fr]">


            <!-- =========================================
                 PANEL INSTITUCIONAL
            ========================================== -->

            <section
                class="relative bg-slate-50 px-8 py-12 sm:px-12 lg:px-14 lg:py-14 flex items-center justify-center"
            >

                <!-- Decoraciones suaves -->
                <div class="absolute -top-32 -left-32 w-72 h-72 rounded-full bg-apch-100/50"></div>

                <div class="absolute -bottom-40 -right-32 w-80 h-80 rounded-full border border-apch-100"></div>


                <div class="relative z-10 w-full text-center">

                    <!-- LOGO -->
                    <div
                        class="mx-auto w-32 h-32 sm:w-36 sm:h-36 rounded-[28px] bg-white border border-slate-200 p-4 flex items-center justify-center shadow-[0_15px_35px_-12px_rgba(15,23,42,0.20)] transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_20px_40px_-12px_rgba(15,23,42,0.25)] animate-float"
                    >

                        <img
                            src="{{ asset('images/logo-apch.png') }}"
                            alt="Logo institucional"
                            class="w-full h-full object-contain"
                        >

                    </div>


                    <!-- NOMBRE DE LA INSTITUCIÓN -->
                    <h1
                        class="mt-8 text-2xl sm:text-3xl font-bold leading-tight tracking-tight text-slate-900"
                    >
                        UNIDAD EDUCATIVA
                        <span class="block mt-1 text-slate-800">
                            "ÁNGEL POLIBIO CHAVES"
                        </span>
                    </h1>


                    <!-- UBICACIÓN -->
                    <p class="mt-4 text-sm text-slate-500">
                        San Miguel · Provincia Bolívar · Ecuador
                    </p>


                    <!-- SEPARADOR -->
                    <div class="flex items-center justify-center gap-3 mt-9 mb-7">

                        <span class="w-12 h-px bg-slate-300"></span>

                        <span class="w-2 h-2 rounded-full bg-apch-600"></span>

                        <span class="w-12 h-px bg-slate-300"></span>

                    </div>


                    <!-- DESCRIPCIÓN -->
                    <div class="max-w-md mx-auto">

                        <h2 class="text-lg font-semibold text-slate-800">
                            Sistema de Formularios Digitales del DECE
                        </h2>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            Plataforma institucional para la gestión,
                            llenado e impresión de formularios de atención
                            psicosocial del Departamento de Consejería
                            Estudiantil.
                        </p>

                    </div>


                    <!-- ESTADO -->
                    <div class="mt-9 flex items-center justify-center gap-2">

                        <span class="relative flex h-2.5 w-2.5">

                            <span class="absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-60 animate-ping"></span>

                            <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>

                        </span>

                        <span class="text-xs font-medium text-slate-500">
                            Sistema institucional
                        </span>

                    </div>

                </div>

            </section>


            <!-- =========================================
                 PANEL DE ACCESO
            ========================================== -->

            <section class="login-panel px-6 py-10 sm:px-12 sm:py-14 lg:px-16 lg:py-12 flex items-center justify-center">

                <div class="login-content w-full max-w-md">


                    <!-- CONTENEDOR DEL FORMULARIO -->
                    <div
                        class="rounded-[26px] bg-white/95 backdrop-blur-sm border border-white/70 shadow-[0_20px_50px_-18px_rgba(15,23,42,0.28)] px-6 py-8 sm:px-9 sm:py-10"
                    >


                        <!-- ENCABEZADO -->
                        <div class="text-center mb-8 animate-fade-up">

                            <div
                                class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-apch-50 text-apch-700 mb-4"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="w-5 h-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m0 0l3-3m-3 3l3 3"
                                    />
                                </svg>

                            </div>


                            <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                                Iniciar sesión
                            </h2>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Ingrese sus credenciales para acceder al sistema.
                            </p>

                        </div>


                        <!-- =================================
                             ERRORES DE LARAVEL
                        ================================== -->

                        @if ($errors->any())

                            <div
                                class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 px-4 py-3.5 text-sm text-red-700 animate-fade-up"
                            >

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.8"
                                    stroke="currentColor"
                                    class="w-5 h-5 flex-shrink-0 mt-0.5"
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
                            class="space-y-5"
                        >

                            @csrf


                            <!-- USUARIO -->
                            <div
                                class="animate-fade-up"
                                style="animation-delay: 0.1s"
                            >

                                <label
                                    for="username"
                                    class="block text-sm font-semibold text-slate-700 mb-2.5"
                                >
                                    Usuario
                                </label>


                                <div class="relative group">

                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none text-slate-400 group-focus-within:text-apch-600 transition-colors duration-200"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.7"
                                            stroke="currentColor"
                                            class="w-5 h-5"
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
                                        class="input-field w-full rounded-2xl border border-slate-200 bg-slate-50 pl-14 pr-5 text-base text-slate-800 placeholder-slate-400 outline-none transition-all duration-200 focus:border-apch-500 focus:bg-white focus:ring-4 focus:ring-apch-500/10 hover:border-slate-300"
                                    >

                                </div>

                            </div>


                            <!-- CONTRASEÑA -->
                            <div
                                class="animate-fade-up"
                                style="animation-delay: 0.18s"
                            >

                                <label
                                    for="password"
                                    class="block text-sm font-semibold text-slate-700 mb-2.5"
                                >
                                    Contraseña
                                </label>


                                <div class="relative group">

                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-5 pointer-events-none text-slate-400 group-focus-within:text-apch-600 transition-colors duration-200"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.7"
                                            stroke="currentColor"
                                            class="w-5 h-5"
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
                                        class="input-field w-full rounded-2xl border border-slate-200 bg-slate-50 pl-14 pr-5 text-base text-slate-800 placeholder-slate-400 outline-none transition-all duration-200 focus:border-apch-500 focus:bg-white focus:ring-4 focus:ring-apch-500/10 hover:border-slate-300"
                                    >

                                </div>

                            </div>


                            <!-- BOTÓN -->
                            <div
                                class="pt-3 animate-fade-up"
                                style="animation-delay: 0.26s"
                            >

                                <button
                                    type="submit"
                                    class="group relative w-full h-14 overflow-hidden rounded-2xl bg-apch-600 text-white text-sm font-semibold shadow-lg shadow-apch-600/20 transition-all duration-300 hover:bg-apch-700 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-apch-600/25 active:translate-y-0 focus:outline-none focus:ring-4 focus:ring-apch-500/20"
                                >

                                    <span
                                        class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/15 to-transparent transition-transform duration-700 group-hover:translate-x-full"
                                    ></span>


                                    <span class="relative flex items-center justify-center gap-2">

                                        Ingresar al sistema

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor"
                                            class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
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
                            class="mt-8 pt-6 border-t border-slate-100 text-center animate-fade-up"
                            style="animation-delay: 0.34s"
                        >

                            <p class="text-xs text-slate-400">
                                Sistema institucional · 2026-2027
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
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
