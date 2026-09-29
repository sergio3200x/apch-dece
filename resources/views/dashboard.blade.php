<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Panel de control | APCH</title>

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

                        50: '#fff5f5',
                        100: '#ffe7e7',
                        200: '#ffcfcf',
                        300: '#f5a5a5',
                        400: '#e97979',
                        500: '#d95555',
                        600: '#c83d3d',
                        700: '#ad2d2d',
                        800: '#922626',
                        900: '#782020',

                    }

                },

                animation: {

                    'fade-up': 'fadeUp 0.6s ease-out forwards',

                    'fade-in': 'fadeIn 0.7s ease-out forwards',

                    'float': 'float 5s ease-in-out infinite',

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

                    }

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
        background: #f7f7f8;
    }

    .dashboard-card {

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            border-color 0.3s ease;

    }

    .dashboard-card:hover {

        transform: translateY(-6px);

    }

</style>

<div class="min-h-screen flex flex-col bg-slate-50">


<!-- =====================================================
     CABECERA
====================================================== -->

<header class="mx-2 sm:mx-3 lg:mx-4 mt-4 rounded-[12px] bg-slate-200 border-2 border-black overflow-hidden">

    <div class="max-w-7xl mx-auto px-5 sm:px-8">

        <div class="min-h-[88px] flex items-center justify-between gap-5">


            <!-- IDENTIDAD -->

            <div class="flex items-center gap-4">


                <!-- LOGO -->

                <div
                    class="w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-white border border-slate-200 p-2 flex items-center justify-center shadow-sm"
                >

                    <img
                        src="{{ asset('images/logo-apch.png') }}"
                        alt="Logo APCH"
                        class="w-full h-full object-contain"
                    >

                </div>


                <!-- INFORMACIÓN -->

                <div>

                    <p class="text-[10px] sm:text-xs uppercase tracking-[0.18em] text-apch-600 font-bold">

                        APCH · DECE

                    </p>


                    <h1 class="text-base sm:text-xl font-bold text-slate-900 tracking-tight">

                        Sistema de Formularios Digitales

                    </h1>


                    <p class="hidden sm:block text-xs text-slate-500 mt-1">

                        Unidad Educativa "Ángel Polibio Chaves"

                    </p>

                </div>

            </div>



            <!-- PERFIL -->

            <div class="flex items-center gap-3">


                <div class="hidden sm:flex items-center gap-3">


                    <div class="text-right">

                        <p class="text-sm font-bold text-slate-800">

                            {{ auth()->user()->name }}

                        </p>

                        <p class="text-xs text-slate-500">

                            Administrador

                        </p>

                    </div>


                    <div
                        class="w-11 h-11 rounded-xl bg-apch-100 text-apch-700 flex items-center justify-center font-bold border border-apch-200"
                    >

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                </div>



                <!-- CERRAR SESIÓN -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="flex items-center justify-center gap-2 w-11 h-11 sm:w-auto sm:h-11 sm:px-4 rounded-xl border border-slate-200 bg-white text-slate-600 hover:bg-apch-600 hover:text-white hover:border-apch-600 transition-all duration-300"
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
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3-3h-9m0 0l3-3m3 3l-3 3"
                            />

                        </svg>


                        <span class="hidden sm:inline text-sm font-semibold">

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

<main class="flex-1">

    <div class="max-w-7xl mx-auto px-5 sm:px-8 py-10 lg:py-14">


        <!-- =================================================
             BIENVENIDA
        ================================================== -->

        <section
            class="relative overflow-hidden rounded-[30px] bg-apch-600 text-white shadow-xl shadow-apch-900/15 animate-fade-up"
        >

            <!-- Decoración -->

            <div
                class="absolute -right-20 -top-24 w-80 h-80 rounded-full bg-white/10"
            ></div>

            <div
                class="absolute right-32 -bottom-28 w-64 h-64 rounded-full bg-apch-800/20"
            ></div>

            <div
                class="absolute left-1/2 top-0 w-px h-full bg-white/5"
            ></div>


            <div class="relative z-10 p-8 sm:p-10 lg:p-12">


                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">


                    <!-- TEXTO -->

                    <div class="max-w-3xl">


                        <div
                            class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/15 border border-white/20"
                        >

                            <span
                                class="w-2 h-2 rounded-full bg-white"
                            ></span>

                            <span class="text-xs sm:text-sm font-semibold">

                                Panel de administración

                            </span>

                        </div>


                        <h2
                            class="mt-6 text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight"
                        >

                            Bienvenido,
                            {{ auth()->user()->name }}

                        </h2>


                        <p
                            class="mt-4 text-base sm:text-lg leading-8 text-red-50 max-w-2xl"
                        >

                            Administra de manera centralizada los usuarios,
                            formularios y registros del Sistema de
                            Formularios Digitales del DECE.

                        </p>

                    </div>


                    <!-- ICONO -->

                    <div
                        class="hidden sm:flex flex-shrink-0 w-28 h-28 lg:w-36 lg:h-36 rounded-[30px] bg-white/15 border border-white/20 items-center justify-center animate-float"
                    >

                        <div
                            class="w-20 h-20 lg:w-24 lg:h-24 rounded-[24px] bg-white flex items-center justify-center shadow-lg"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-10 h-10 lg:w-12 lg:h-12 text-apch-600"
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

        <div class="mt-12 mb-7">

            <p class="text-xs uppercase tracking-[0.18em] font-bold text-apch-600">

                Administración del sistema

            </p>


            <h3 class="mt-2 text-2xl sm:text-3xl font-bold text-slate-900">

                Funciones principales

            </h3>


            <p class="mt-2 text-base text-slate-500">

                Seleccione una de las opciones disponibles.

            </p>

        </div>



        <!-- =================================================
             FUNCIONES
        ================================================== -->

        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">


            <!-- =================================================
                 USUARIOS
            ================================================== -->

            <a
                href="{{ route('usuarios.index') }}"
                class="dashboard-card group relative overflow-hidden rounded-[26px] bg-white border border-slate-200 p-7 sm:p-8 shadow-sm hover:border-apch-300 hover:shadow-xl hover:shadow-apch-900/10 animate-fade-up"
                style="animation-delay:0.10s"
            >

                <!-- Línea superior -->

                <div
                    class="absolute top-0 left-0 right-0 h-1 bg-apch-600"
                ></div>


                <div class="flex items-start justify-between">


                    <div
                        class="w-16 h-16 rounded-2xl bg-apch-100 text-apch-700 border border-apch-200 flex items-center justify-center group-hover:bg-apch-600 group-hover:text-white transition-all duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="w-8 h-8"
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


                    <span
                        class="text-slate-300 group-hover:text-apch-600 transition-colors"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />

                        </svg>

                    </span>

                </div>


                <p class="mt-7 text-xs uppercase tracking-[0.15em] font-bold text-apch-600">

                    Gestión

                </p>


                <h4 class="mt-2 text-2xl font-bold text-slate-900">

                    Gestionar usuarios

                </h4>


                <p class="mt-3 text-base leading-7 text-slate-500">

                    Crear, desactivar y reactivar las cuentas
                    de los usuarios del sistema.

                </p>


                <div
                    class="mt-7 pt-5 border-t border-slate-100 flex items-center justify-between"
                >

                    <span class="text-sm font-bold text-slate-800">

                        Administrar usuarios

                    </span>


                    <span
                        class="text-apch-600 text-xl transition-transform duration-300 group-hover:translate-x-2"
                    >

                        →

                    </span>

                </div>

            </a>



            <!-- =================================================
                 FORMULARIOS
            ================================================== -->

            <a
                href="{{ route('formularios.index') }}"
                class="dashboard-card group relative overflow-hidden rounded-[26px] bg-white border border-slate-200 p-7 sm:p-8 shadow-sm hover:border-apch-300 hover:shadow-xl hover:shadow-apch-900/10 animate-fade-up"
                style="animation-delay:0.18s"
            >

                <div
                    class="absolute top-0 left-0 right-0 h-1 bg-apch-600"
                ></div>


                <div class="flex items-start justify-between">


                    <div
                        class="w-16 h-16 rounded-2xl bg-apch-100 text-apch-700 border border-apch-200 flex items-center justify-center group-hover:bg-apch-600 group-hover:text-white transition-all duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="w-8 h-8"
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


                    <span
                        class="text-slate-300 group-hover:text-apch-600 transition-colors"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />

                        </svg>

                    </span>

                </div>


                <p class="mt-7 text-xs uppercase tracking-[0.15em] font-bold text-apch-600">

                    Documentos

                </p>


                <h4 class="mt-2 text-2xl font-bold text-slate-900">

                    Formularios DECE

                </h4>


                <p class="mt-3 text-base leading-7 text-slate-500">

                    Acceder a los formularios disponibles
                    del Departamento de Consejería Estudiantil.

                </p>


                <div
                    class="mt-7 pt-5 border-t border-slate-100 flex items-center justify-between"
                >

                    <span class="text-sm font-bold text-slate-800">

                        Ver formularios

                    </span>


                    <span
                        class="text-apch-600 text-xl transition-transform duration-300 group-hover:translate-x-2"
                    >

                        →

                    </span>

                </div>

            </a>



            <!-- =================================================
                 REGISTROS
            ================================================== -->

            <a
                href="{{ route('formularios.registros') }}"
                class="dashboard-card group relative overflow-hidden rounded-[26px] bg-white border border-slate-200 p-7 sm:p-8 shadow-sm hover:border-apch-300 hover:shadow-xl hover:shadow-apch-900/10 animate-fade-up"
                style="animation-delay:0.26s"
            >

                <div
                    class="absolute top-0 left-0 right-0 h-1 bg-apch-600"
                ></div>


                <div class="flex items-start justify-between">


                    <div
                        class="w-16 h-16 rounded-2xl bg-apch-100 text-apch-700 border border-apch-200 flex items-center justify-center group-hover:bg-apch-600 group-hover:text-white transition-all duration-300"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.7"
                            stroke="currentColor"
                            class="w-8 h-8"
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


                    <span
                        class="text-slate-300 group-hover:text-apch-600 transition-colors"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                            />

                        </svg>

                    </span>

                </div>


                <p class="mt-7 text-xs uppercase tracking-[0.15em] font-bold text-apch-600">

                    Control

                </p>


                <h4 class="mt-2 text-2xl font-bold text-slate-900">

                    Registros de formularios

                </h4>


                <p class="mt-3 text-base leading-7 text-slate-500">

                    Consultar los registros generados
                    por los usuarios del sistema.

                </p>


                <div
                    class="mt-7 pt-5 border-t border-slate-100 flex items-center justify-between"
                >

                    <span class="text-sm font-bold text-slate-800">

                        Consultar registros

                    </span>


                    <span
                        class="text-apch-600 text-xl transition-transform duration-300 group-hover:translate-x-2"
                    >

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

<footer class="bg-black text-white">

    <div class="max-w-7xl mx-auto px-5 sm:px-8 py-8">


        <div class="flex flex-col md:flex-row items-center justify-between gap-6">


            <!-- INSTITUCIÓN -->

            <div class="flex items-center gap-4 text-center md:text-left">


                <div
                    class="w-12 h-12 rounded-xl bg-white p-1.5 flex items-center justify-center"
                >

                    <img
                        src="{{ asset('images/logo-apch.png') }}"
                        alt="Logo APCH"
                        class="w-full h-full object-contain"
                    >

                </div>


                <div>

                    <p class="font-bold text-base">

                        Sistema de Formularios Digitales

                    </p>


                    <p class="text-xs text-slate-400 mt-1">

                        Unidad Educativa "Ángel Polibio Chaves" · DECE

                    </p>

                </div>

            </div>



            <!-- DESARROLLADOR -->

            <div class="text-center md:text-right">

                <p class="text-[10px] uppercase tracking-[0.18em] text-apch-400 font-bold">

                    Desarrollo

                </p>


                <p class="mt-1 text-sm font-semibold">

                    Stalyn Alvarado

                </p>


                <p class="text-xs text-slate-400 mt-1">

                    tu-correo@ejemplo.com

                </p>

            </div>

        </div>



        <!-- SEPARADOR -->

        <div class="mt-7 pt-5 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3">


            <p class="text-xs text-slate-500">

                Plataforma institucional del Departamento de Consejería Estudiantil

            </p>


            <p class="text-xs text-slate-500">

                2026–2027 · APCH

            </p>

        </div>


    </div>

</footer>


</div>
