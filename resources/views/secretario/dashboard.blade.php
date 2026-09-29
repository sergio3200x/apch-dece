<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Inicio | APCH</title>

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
                        50: '#fef2f2',
                        100: '#fee2e2',
                        200: '#fecaca',
                        300: '#fca5a5',
                        400: '#f87171',
                        500: '#ef4444',
                        600: '#dc2626',
                        700: '#b30000',
                        800: '#8f0000',
                        900: '#650000',
                    }
                },

                animation: {
                    'fade-up': 'fadeUp 0.6s ease-out forwards',
                    'fade-in': 'fadeIn 0.7s ease-out forwards',
                    'float': 'float 5s ease-in-out infinite',
                    'pulse-soft': 'pulseSoft 3s ease-in-out infinite',
                },

                keyframes: {
                    fadeUp: {
                        '0%': {
                            opacity: '0',
                            transform: 'translateY(18px)'
                        },
                        '100%': {
                            opacity: '1',
                            transform: 'translateY(0)'
                        }
                    },

                    fadeIn: {
                        '0%': {
                            opacity: '0'
                        },
                        '100%': {
                            opacity: '1'
                        }
                    },

                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0)'
                        },
                        '50%': {
                            transform: 'translateY(-5px)'
                        }
                    },

                    pulseSoft: {
                        '0%, 100%': {
                            opacity: '0.5'
                        },
                        '50%': {
                            opacity: '1'
                        }
                    }
                }
            }
        }
    }
</script>


</head>

<body class="min-h-screen bg-slate-100 text-slate-800 font-sans flex flex-col">


<!-- =========================================
     ENCABEZADO
========================================== -->

<header
    class="mx-4 sm:mx-3 lg:mx-4 mt-4 rounded-[12px] bg-slate-200 border-2 border-black overflow-hidden"
>

    <div
        class="max-w-7xl mx-auto px-5 sm:px-8 py-5 flex items-center justify-between gap-6"
    >

        <!-- IDENTIDAD -->

        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-white border border-slate-200 p-1.5 shadow-sm flex items-center justify-center transition-transform duration-300 hover:scale-105"
            >

                <img
                    src="{{ asset('images/logo-apch.png') }}"
                    alt="Logo APCH"
                    class="w-full h-full object-contain"
                >

            </div>


            <div>

                <h1
                    class="text-base sm:text-lg lg:text-xl font-bold tracking-tight text-slate-900"
                >
                    Sistema de Formularios Digitales
                </h1>

                <p
                    class="text-[11px] sm:text-xs text-slate-500 mt-1 font-medium"
                >
                    UNIDAD EDUCATIVA "ÁNGEL POLIBIO CHAVES"
                </p>

            </div>

        </div>


        <!-- USUARIO + LOGOUT -->

        <div class="flex items-center gap-3 sm:gap-5">


            <!-- ESTADO -->

            <div class="hidden md:flex items-center gap-2">

                <span class="relative flex h-2.5 w-2.5">

                    <span
                        class="absolute inline-flex h-full w-full rounded-full bg-green-500 opacity-60 animate-ping"
                    ></span>

                    <span
                        class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"
                    ></span>

                </span>

                <span class="text-xs font-medium text-slate-500">
                    Sistema activo
                </span>

            </div>


            <!-- USUARIO -->

            <div
                class="hidden sm:flex items-center gap-2 px-3 py-2 rounded-lg bg-white border border-slate-200"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="w-4 h-4 text-apch-700"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"
                    />

                </svg>

                <span class="text-xs font-semibold text-slate-700">
                    {{ auth()->user()->name }}
                </span>

            </div>


            <!-- CERRAR SESIÓN -->

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="group flex items-center gap-2 px-3 sm:px-4 py-2.5 rounded-lg border border-apch-700 bg-white text-xs font-semibold text-apch-700 transition-all duration-300 hover:bg-apch-700 hover:text-white hover:shadow-md"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-0.5"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m0 0l3-3m3 3l-3 3"
                        />

                    </svg>

                    <span class="hidden sm:inline">
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

<main class="flex-1">

    <div
        class="max-w-7xl mx-auto px-5 sm:px-8 py-8 sm:py-10"
    >


        <!-- =================================
             PANEL DE BIENVENIDA
        ================================== -->

        <section
            class="relative overflow-hidden rounded-2xl bg-apch-700 text-white shadow-lg mb-8 animate-fade-up"
        >

            <!-- Decoraciones -->

            <div
                class="absolute -right-20 -top-24 w-72 h-72 rounded-full border border-white/10"
            ></div>

            <div
                class="absolute -right-10 -bottom-28 w-64 h-64 rounded-full bg-black/10"
            ></div>

            <div
                class="absolute left-1/2 -bottom-24 w-48 h-48 rounded-full border border-white/5"
            ></div>


            <div class="relative p-6 sm:p-8 lg:p-9">

                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6"
                >

                    <div>

                        <div class="flex items-center gap-2 mb-3">

                            <span
                                class="px-3 py-1.5 rounded-full bg-white/15 border border-white/20 text-white text-[11px] font-bold uppercase tracking-wider"
                            >
                                Secretaría DECE
                            </span>

                            <span class="text-xs text-white/60">
                                Panel principal
                            </span>

                        </div>


                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl font-bold tracking-tight"
                        >
                            Bienvenido, {{ auth()->user()->name }}
                        </h2>


                        <p
                            class="mt-3 text-sm sm:text-base text-white/75 max-w-2xl leading-6"
                        >
                            Acceda a los formularios institucionales
                            del Departamento de Consejería Estudiantil
                            para su llenado e impresión.
                        </p>

                    </div>


                    <!-- ICONO -->

                    <div
                        class="hidden sm:flex w-16 h-16 lg:w-20 lg:h-20 rounded-2xl bg-white/15 border border-white/20 items-center justify-center animate-float"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-8 h-8 lg:w-10 lg:h-10 text-white"
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

        <div class="flex items-center justify-between mb-5">

            <div>

                <h3
                    class="text-xl sm:text-2xl font-bold text-slate-900"
                >
                    Formularios DECE
                </h3>

                <p
                    class="text-sm text-slate-500 mt-1"
                >
                    Acceda al catálogo de formularios institucionales.
                </p>

            </div>


            <div
                class="hidden sm:block h-px flex-1 bg-slate-200 ml-6"
            ></div>

        </div>


        <!-- =================================
             TARJETA PRINCIPAL
        ================================== -->

        <a
            href="{{ route('formularios.index') }}"
            class="group relative block overflow-hidden rounded-2xl bg-white border border-slate-200 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-apch-200 hover:shadow-lg animate-fade-up"
        >

            <!-- Barra roja -->

            <div
                class="absolute top-0 left-0 right-0 h-1 bg-apch-700"
            ></div>


            <!-- Decoración -->

            <div
                class="absolute -right-16 -top-20 w-64 h-64 rounded-full border border-apch-100 transition-transform duration-700 group-hover:scale-110"
            ></div>


            <div
                class="relative p-7 sm:p-9"
            >

                <div
                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-8"
                >

                    <!-- INFORMACIÓN -->

                    <div class="flex items-start gap-5">

                        <div
                            class="flex-shrink-0 w-14 h-14 rounded-2xl bg-apch-50 border border-apch-100 text-apch-700 flex items-center justify-center transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white group-hover:scale-105"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.7"
                                stroke="currentColor"
                                class="w-7 h-7"
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

                            <h4
                                class="text-xl sm:text-2xl font-bold text-slate-900"
                            >
                                Formularios disponibles
                            </h4>


                            <p
                                class="mt-2 text-sm sm:text-base leading-6 text-slate-500 max-w-2xl"
                            >
                                Acceda a los formularios del Departamento
                                de Consejería Estudiantil para realizar
                                su llenado e impresión.
                            </p>


                            <div
                                class="mt-5 flex items-center gap-2 text-sm font-bold text-apch-700"
                            >

                                Abrir formularios

                                <span
                                    class="transition-transform duration-300 group-hover:translate-x-1"
                                >
                                    →
                                </span>

                            </div>

                        </div>

                    </div>


                    <!-- FLECHA -->

                    <div
                        class="hidden sm:flex w-12 h-12 rounded-full border border-slate-200 items-center justify-center text-slate-400 transition-all duration-300 group-hover:bg-apch-700 group-hover:border-apch-700 group-hover:text-white"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.8"
                            stroke="currentColor"
                            class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
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

<footer
    class="bg-black text-white mt-auto"
>

    <div
        class="max-w-7xl mx-auto px-5 sm:px-8 py-7"
    >

        <div
            class="flex flex-col md:flex-row items-center justify-between gap-5"
        >

            <div class="text-center md:text-left">

                <p
                    class="text-sm font-bold text-white"
                >
                    Sistema de Formularios Digitales del DECE
                </p>

                <p
                    class="mt-1 text-xs text-white/50"
                >
                    Unidad Educativa "Ángel Polibio Chaves"
                </p>

            </div>


            <div class="text-center md:text-right">

                <p
                    class="text-xs font-semibold text-white/80"
                >
                    Desarrollado por
                </p>

                <p
                    class="mt-1 text-sm font-bold text-white"
                >
                    Stalyn Alvarado
                </p>

                <p
                    class="text-xs text-white/40"
                >
                    tu-correo@ejemplo.com
                </p>

            </div>

        </div>


        <div
            class="mt-5 pt-4 border-t border-white/10 text-center"
        >

            <p
                class="text-[11px] text-white/40"
            >
                Departamento de Consejería Estudiantil · APCH · 2026-2027
            </p>

        </div>

    </div>

</footer>


</body>

</html>


