<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Usuarios | APCH</title>

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

                    'fade-up': 'fadeUp 0.6s ease-out forwards',

                    'fade-in': 'fadeIn 0.5s ease-out forwards',

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

                    }

                }

            }

        }

    }

</script>


</head>

<body class="min-h-screen bg-slate-100 text-slate-800 font-sans">

<!-- ========================================================= -->

<!-- CABECERA -->

<!-- ========================================================= -->

<header class="mx-4 mt-4 overflow-hidden rounded-[24px] border-2 border-black bg-white shadow-sm sm:mx-6 lg:mx-8">


<div class="mx-auto flex max-w-7xl items-center justify-between gap-6 px-6 py-5 lg:px-10">

    <!-- IZQUIERDA -->

    <div class="flex items-center gap-4">

        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white p-1.5 shadow-sm ring-1 ring-slate-200">

            <img
                src="{{ asset('images/logo-apch.png') }}"
                alt="Logo APCH"
                class="h-full w-full object-contain"
            >

        </div>


        <div>

            <h1 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">

                Sistema de Formularios Digitales

            </h1>

            <p class="mt-1 text-sm font-medium text-slate-500 sm:text-base">

                UNIDAD EDUCATIVA "ÁNGEL POLIBIO CHAVES"

            </p>

        </div>

    </div>


    <!-- DERECHA -->

    <div class="flex items-center gap-3">

        <!-- SISTEMA ACTIVO -->

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
                class="group flex items-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-4 py-2.5 text-sm font-bold text-slate-700 transition-all duration-300 hover:border-apch-700 hover:bg-apch-700 hover:text-white"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transition-transform duration-300 group-hover:translate-x-0.5"
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

<!-- ========================================================= -->

<!-- CONTENIDO -->

<!-- ========================================================= -->

<main class="mx-auto max-w-7xl px-6 py-10 lg:px-10">


<!-- ===================================================== -->
<!-- TÍTULO -->
<!-- ===================================================== -->

<section class="mb-8 animate-fade-up">

    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <div class="mb-2 flex items-center gap-2">

                <span class="h-2.5 w-2.5 rounded-full bg-apch-700"></span>

                <p class="text-sm font-bold uppercase tracking-[0.2em] text-apch-700">

                    Administración

                </p>

            </div>


            <h2 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">

                Gestión de usuarios

            </h2>


            <p class="mt-3 max-w-2xl text-base leading-7 text-slate-500 sm:text-lg">

                Administre las cuentas, roles y estados de acceso
                de los usuarios del sistema institucional.

            </p>

        </div>


        <!-- CREAR USUARIO -->

        <a
            href="{{ route('usuarios.create') }}"
            class="group inline-flex items-center justify-center gap-3 rounded-2xl bg-apch-700 px-6 py-4 text-base font-bold text-white shadow-lg shadow-red-900/10 transition-all duration-300 hover:-translate-y-1 hover:bg-apch-800 hover:shadow-xl"
        >

            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-white/20">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 transition-transform duration-300 group-hover:rotate-90"
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


<!-- ===================================================== -->
<!-- MENSAJE DE ÉXITO -->
<!-- ===================================================== -->

@if (session('success'))

    <div class="mb-8 animate-fade-in rounded-2xl border-2 border-green-200 bg-green-50 px-6 py-5">

        <div class="flex items-center gap-4">

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6"
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

                <p class="text-base font-bold text-green-800">

                    Operación realizada correctamente

                </p>

                <p class="mt-1 text-sm text-green-700">

                    {{ session('success') }}

                </p>

            </div>

        </div>

    </div>

@endif


<!-- ===================================================== -->
<!-- RESUMEN -->
<!-- ===================================================== -->

@php

    $totalUsuarios = $usuarios->count();

    $usuariosActivos = $usuarios->where('status', true)->count();

    $usuariosInactivos = $usuarios->where('status', false)->count();

@endphp


<section class="mb-8 grid gap-5 sm:grid-cols-3 animate-fade-up">


    <!-- TOTAL -->

    <div class="rounded-2xl border-2 border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-bold uppercase tracking-wide text-slate-500">

                    Total de usuarios

                </p>

                <p class="mt-2 text-4xl font-bold text-slate-900">

                    {{ $totalUsuarios }}

                </p>

            </div>


            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-apch-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
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

    <div class="rounded-2xl border-2 border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-bold uppercase tracking-wide text-slate-500">

                    Usuarios activos

                </p>

                <p class="mt-2 text-4xl font-bold text-slate-900">

                    {{ $usuariosActivos }}

                </p>

            </div>


            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-apch-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
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

    <div class="rounded-2xl border-2 border-slate-200 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-md">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-bold uppercase tracking-wide text-slate-500">

                    Usuarios inactivos

                </p>

                <p class="mt-2 text-4xl font-bold text-slate-900">

                    {{ $usuariosInactivos }}

                </p>

            </div>


            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-apch-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
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


<!-- ===================================================== -->
<!-- TABLA -->
<!-- ===================================================== -->

<section class="animate-fade-up overflow-hidden rounded-[24px] border-2 border-slate-200 bg-white shadow-sm">


    <!-- CABECERA TABLA -->

    <div class="border-b-2 border-slate-100 px-6 py-6 sm:px-8">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <h3 class="text-xl font-bold text-slate-900">

                    Usuarios registrados

                </h3>

                <p class="mt-1 text-sm text-slate-500">

                    Cuentas con acceso al sistema institucional.

                </p>

            </div>


            <div class="inline-flex w-fit items-center gap-2 rounded-full border border-red-200 bg-red-50 px-4 py-2 text-sm font-bold text-apch-700">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
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

    <div class="overflow-x-auto">

        <table class="w-full min-w-[800px] border-collapse">


            <thead>

                <tr class="bg-slate-50">

                    <th class="border-b border-slate-200 px-6 py-5 text-left text-sm font-bold uppercase tracking-wide text-slate-500">

                        Nombre

                    </th>

                    <th class="border-b border-slate-200 px-6 py-5 text-left text-sm font-bold uppercase tracking-wide text-slate-500">

                        Usuario

                    </th>

                    <th class="border-b border-slate-200 px-6 py-5 text-left text-sm font-bold uppercase tracking-wide text-slate-500">

                        Rol

                    </th>

                    <th class="border-b border-slate-200 px-6 py-5 text-left text-sm font-bold uppercase tracking-wide text-slate-500">

                        Estado

                    </th>

                    <th class="border-b border-slate-200 px-6 py-5 text-left text-sm font-bold uppercase tracking-wide text-slate-500">

                        Acción

                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($usuarios as $usuario)

                    <tr class="group transition-all duration-200 hover:bg-red-50/40">


                        <!-- NOMBRE -->

                        <td class="border-b border-slate-100 px-6 py-5">

                            <div class="flex items-center gap-4">

                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-red-50 text-base font-bold text-apch-700 transition-all duration-200 group-hover:bg-apch-700 group-hover:text-white">

                                    {{ strtoupper(substr($usuario->name, 0, 1)) }}

                                </div>


                                <div>

                                    <p class="text-base font-bold text-slate-800">

                                        {{ $usuario->name }}

                                    </p>

                                    <p class="mt-1 text-sm text-slate-400">

                                        Cuenta institucional

                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- USUARIO -->

                        <td class="border-b border-slate-100 px-6 py-5">

                            <span class="inline-flex rounded-lg bg-slate-100 px-3 py-2 text-sm font-semibold text-slate-600">

                                {{ $usuario->username }}

                            </span>

                        </td>


                        <!-- ROL -->

                        <td class="border-b border-slate-100 px-6 py-5">

                            @if ($usuario->role === 'admin')

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-4 py-2 text-sm font-bold text-apch-700">

                                    <span class="h-2 w-2 rounded-full bg-apch-700"></span>

                                    Administrador

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-4 py-2 text-sm font-bold text-apch-700">

                                    <span class="h-2 w-2 rounded-full bg-apch-700"></span>

                                    Secretario/a

                                </span>

                            @endif

                        </td>


                        <!-- ESTADO -->

                        <td class="border-b border-slate-100 px-6 py-5">

                            @if ($usuario->status)

                                <span class="inline-flex items-center gap-2 rounded-full bg-green-50 px-4 py-2 text-sm font-bold text-green-700">

                                    <span class="relative flex h-2.5 w-2.5">

                                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-50"></span>

                                        <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-500"></span>

                                    </span>

                                    Activo

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-2 text-sm font-bold text-slate-500">

                                    <span class="h-2.5 w-2.5 rounded-full bg-slate-400"></span>

                                    Inactivo

                                </span>

                            @endif

                        </td>


                        <!-- ACCIÓN -->

                        <td class="border-b border-slate-100 px-6 py-5">

                            @if ($usuario->status)

                                <form
                                    method="POST"
                                    action="{{ route('usuarios.desactivar', $usuario) }}"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="group/button inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-bold text-apch-700 transition-all duration-200 hover:border-apch-700 hover:bg-apch-700 hover:text-white"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 transition-transform duration-200 group-hover/button:scale-110"
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
                                        class="group/button inline-flex items-center gap-2 rounded-xl border border-green-200 bg-green-50 px-4 py-2.5 text-sm font-bold text-green-700 transition-all duration-200 hover:border-green-600 hover:bg-green-600 hover:text-white"
                                    >

                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 transition-transform duration-200 group-hover/button:scale-110"
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
                            class="px-6 py-20 text-center"
                        >

                            <div class="flex flex-col items-center justify-center">

                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-red-50 text-apch-700">

                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
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


                                <p class="mt-5 text-base font-bold text-slate-700">

                                    No existen usuarios registrados.

                                </p>

                                <p class="mt-1 text-sm text-slate-400">

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
```

</main>

<!-- ========================================================= -->

<!-- PIE DE PÁGINA -->

<!-- ========================================================= -->

<footer class="mt-8 bg-black text-white">

```
<div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-4 px-6 py-7 text-center sm:flex-row sm:text-left lg:px-10">

    <div>

        <p class="text-sm font-bold">

            Sistema de Formularios Digitales APCH

        </p>

        <p class="mt-1 text-xs text-white/60">

            Unidad Educativa "Ángel Polibio Chaves"

        </p>

    </div>


    <div>

        <p class="text-sm font-semibold">

            Desarrollado por Stalyn Alvarado

        </p>

        <p class="mt-1 text-xs text-white/60">

            tu-correo@ejemplo.com

        </p>

    </div>

</div>


</footer>

</body>

</html>
