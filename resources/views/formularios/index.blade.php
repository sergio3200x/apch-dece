<!DOCTYPE html>

<html lang="es">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Formularios DECE | APCH</title>

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
                    'fade-up': 'fadeUp 0.55s ease-out forwards',
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
                        }
                    }
                }

            }
        }
    }
</script>


</head>

<body class="min-h-screen bg-slate-100 text-slate-800 font-sans">


<!-- ENCABEZADO -->

<header class="mx-4 mt-4 overflow-hidden rounded-[24px] border-2 border-black bg-white shadow-sm sm:mx-6 lg:mx-8">

    <div class="mx-auto flex max-w-7xl flex-col gap-5 px-6 py-5 sm:flex-row sm:items-center sm:justify-between lg:px-10">


        <!-- IDENTIDAD INSTITUCIONAL -->

        <div class="flex items-center gap-4">

            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl bg-white p-1.5 shadow-sm">

                <img
                    src="{{ asset('images/logo-apch.png') }}"
                    alt="Logo APCH"
                    class="h-full w-full object-contain"
                >

            </div>


            <div>

                <p class="text-sm font-bold uppercase tracking-wide text-apch-700">
                    Unidad Educativa
                </p>

                <h1 class="mt-0.5 text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">
                    "Ángel Polibio Chaves"
                </h1>

                <p class="mt-1 text-sm font-medium text-slate-500">
                    Sistema de Formularios Digitales
                </p>

            </div>

        </div>


        <!-- ACCIONES -->

        <div class="flex items-center gap-3">


            <!-- ESTADO -->

            <div class="hidden items-center gap-2 rounded-full border border-green-200 bg-green-50 px-4 py-2.5 text-sm font-semibold text-green-700 sm:flex">

                <span class="relative flex h-2.5 w-2.5">

                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-60"></span>

                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-500"></span>

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
                    class="group flex items-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 transition duration-200 hover:border-apch-700 hover:bg-apch-700 hover:text-white"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 transition-transform duration-200 group-hover:translate-x-0.5"
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



<!-- CONTENIDO -->

<main class="mx-auto max-w-7xl px-6 py-10 lg:px-10">


    <!-- TÍTULO -->

    <section class="mb-8 animate-fade-up">

        <div class="rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm sm:p-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-3 flex items-center gap-3">

                        <div class="h-10 w-1.5 rounded-full bg-apch-700"></div>

                        <p class="text-sm font-bold uppercase tracking-[0.18em] text-apch-700">
                            Departamento de Consejería Estudiantil
                        </p>

                    </div>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Formularios DECE
                    </h2>

                    <p class="mt-3 max-w-3xl text-base leading-7 text-slate-500 sm:text-lg">
                        Seleccione el formulario que desea utilizar para iniciar su llenado e impresión.
                    </p>

                </div>


                <!-- CONTADOR -->

                <div class="shrink-0 rounded-2xl border border-red-100 bg-apch-50 px-6 py-4 text-center">

                    <p class="text-3xl font-bold text-apch-700">
                        8
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-600">
                        Formularios disponibles
                    </p>

                </div>

            </div>

        </div>

    </section>



    <!-- FORMULARIOS -->

    <section class="grid grid-cols-1 gap-6 md:grid-cols-2">


        <!-- 1. ENTREVISTA ESTUDIANTES -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 01
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Entrevista estudiantes
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario para la entrevista y atención de estudiantes.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-estudiantes') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 2. FICHA DE OBSERVACIÓN -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 02
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Ficha de observación
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Registro correspondiente al proceso de observación del estudiante.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-observacion') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 3. FICHA DE DERIVACIÓN -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 03
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Ficha de derivación
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario utilizado para realizar una derivación dentro del proceso DECE.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-derivacion') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 4. ENTREVISTA REPRESENTANTES -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 04
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Entrevista representantes
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario destinado a la entrevista con representantes del estudiante.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-representantes') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 5. ENTREVISTA DOCENTES -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 05
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Entrevista docentes
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario destinado a la entrevista y recopilación de información docente.
                    </p>

                    <a
                        href="{{ route('formularios.entrevista-docentes') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 6. CONSENTIMIENTO INFORMADO -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 06
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Consentimiento informado
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Documento institucional para el consentimiento correspondiente.
                    </p>

                    <a
                        href="{{ route('formularios.consentimiento-informado') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 7. FICHA DE ALERTA -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex h-full items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 07
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Ficha de notificación de alerta DECE
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario correspondiente a la notificación de alertas al DECE.
                    </p>

                    <a
                        href="{{ route('formularios.ficha-alerta-dece') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>



        <!-- 8. PLAN DE ATENCIÓN PSICOSOCIAL -->

        <div class="group animate-fade-up rounded-[24px] border border-slate-200 bg-white p-7 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

            <div class="flex h-full items-start gap-5">

                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-apch-50 text-apch-700 transition-all duration-300 group-hover:bg-apch-700 group-hover:text-white">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
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


                <div class="min-w-0 flex-1">

                    <span class="text-xs font-bold uppercase tracking-wider text-apch-700">
                        Formulario 08
                    </span>

                    <h3 class="mt-1 text-lg font-bold leading-7 text-slate-900">
                        Plan de atención psicosocial y seguimiento
                    </h3>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Formulario correspondiente al plan de atención y seguimiento.
                    </p>

                    <a
                        href="{{ route('formularios.plan-atencion-psicosocial') }}"
                        class="mt-5 inline-flex items-center gap-2 rounded-xl bg-apch-700 px-5 py-3 text-sm font-bold text-white transition-all duration-200 hover:bg-apch-800 hover:shadow-md"
                    >

                        Abrir formulario

                        <span class="text-lg leading-none transition-transform duration-200 group-hover:translate-x-1">
                            →
                        </span>

                    </a>

                </div>

            </div>

        </div>


    </section>

</main>



<!-- PIE DE PÁGINA -->

<footer class="mt-10 bg-black text-white">

    <div class="mx-auto flex max-w-7xl flex-col gap-5 px-6 py-7 lg:px-10">


        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">


            <div>

                <p class="text-base font-bold">
                    Sistema de Formularios Digitales
                </p>

                <p class="mt-1 text-sm text-slate-400">
                    Unidad Educativa "Ángel Polibio Chaves"
                </p>

            </div>


            <div class="text-left sm:text-right">

                <p class="text-sm font-semibold text-white">
                    Desarrollado por Stalyn Alvarado
                </p>

                <p class="mt-1 text-sm text-slate-400">
                    tu-correo@ejemplo.com
                </p>

            </div>

        </div>


        <div class="border-t border-white/10 pt-4 text-center sm:text-left">

            <p class="text-xs text-slate-500">
                Departamento de Consejería Estudiantil · Sistema institucional de formularios digitales
            </p>

        </div>

    </div>

</footer>


</body>

</html>
