<!DOCTYPE html>

<html lang="es">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registros de formularios | APCH</title>

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
                    'fade-in': 'fadeIn 0.4s ease-out forwards',
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


<!-- ENCABEZADO -->

<header class="mx-4 mt-4 overflow-hidden rounded-[24px] border-2 border-black bg-white shadow-sm sm:mx-6 lg:mx-8">

    <div class="mx-auto flex max-w-7xl flex-col gap-5 px-6 py-5 sm:flex-row sm:items-center sm:justify-between lg:px-10">


        <!-- IDENTIDAD -->

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


        <!-- SESIÓN -->

        <div class="flex items-center gap-3">


            <div class="hidden items-center gap-2 rounded-full border border-green-200 bg-green-50 px-4 py-2.5 text-sm font-semibold text-green-700 sm:flex">

                <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>

                Sesión activa

            </div>


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
                            Administración
                        </p>

                    </div>

                    <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                        Registros de formularios
                    </h2>

                    <p class="mt-3 max-w-3xl text-base leading-7 text-slate-500 sm:text-lg">
                        Consulte y administre los registros generados por los usuarios del sistema.
                    </p>

                </div>


                <!-- TOTAL -->

                <div class="shrink-0 rounded-2xl border border-red-100 bg-apch-50 px-7 py-4 text-center">

                    <p class="text-3xl font-bold text-apch-700">
                        {{ $formularios->count() }}
                    </p>

                    <p class="mt-1 text-sm font-semibold text-slate-600">
                        {{ $formularios->count() == 1 ? 'Registro encontrado' : 'Registros encontrados' }}
                    </p>

                </div>

            </div>

        </div>

    </section>



    <!-- MENSAJE DE ÉXITO -->

    @if (session('success'))

        <div class="mb-6 animate-fade-in rounded-2xl border border-green-200 bg-green-50 p-5 shadow-sm">

            <div class="flex items-center gap-4">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-100 text-green-600">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        />

                    </svg>

                </div>

                <p class="text-sm font-bold text-green-800">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif



    <!-- FILTROS -->

    <section class="mb-7 overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-sm animate-fade-up">


        <!-- CABECERA -->

        <div class="border-b border-red-100 bg-apch-50 px-7 py-6">

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-apch-700 text-white">

                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 14.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-6.586a1 1 0 00-.293-.707L1.293 7.293A1 1 0 011 6.586V4z"
                        />

                    </svg>

                </div>


                <div>

                    <h3 class="text-lg font-bold text-slate-900">
                        Filtrar registros
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        Seleccione los criterios que desea consultar.
                    </p>

                </div>

            </div>

        </div>



        <!-- FORMULARIO -->

        <form
            method="GET"
            action="{{ route('formularios.registros') }}"
            class="p-7"
        >

            <div class="grid gap-5 lg:grid-cols-4">


                <!-- USUARIO -->

                <div>

                    <label
                        for="usuario_id"
                        class="mb-2 block text-sm font-bold text-slate-700"
                    >
                        Usuario
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />

                            </svg>

                        </div>


                        <select
                            id="usuario_id"
                            name="usuario_id"
                            class="h-14 w-full appearance-none rounded-xl border border-slate-300 bg-white pl-12 pr-10 text-base text-slate-700 outline-none transition duration-200 focus:border-apch-700 focus:ring-4 focus:ring-apch-700/10"
                        >

                            <option value="">
                                Todos los usuarios
                            </option>

                            @foreach ($usuarios as $usuario)

                                <option
                                    value="{{ $usuario->id }}"
                                    {{ request('usuario_id') == $usuario->id ? 'selected' : '' }}
                                >
                                    {{ $usuario->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />

                            </svg>

                        </div>

                    </div>

                </div>



                <!-- FORMULARIO -->

                <div>

                    <label
                        for="nombre_formulario"
                        class="mb-2 block text-sm font-bold text-slate-700"
                    >
                        Tipo de formulario
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                                />

                            </svg>

                        </div>


                        <select
                            id="nombre_formulario"
                            name="nombre_formulario"
                            class="h-14 w-full appearance-none rounded-xl border border-slate-300 bg-white pl-12 pr-10 text-base text-slate-700 outline-none transition duration-200 focus:border-apch-700 focus:ring-4 focus:ring-apch-700/10"
                        >

                            <option value="">
                                Todos los formularios
                            </option>

                            @foreach ($formulariosDisponibles as $formulario)

                                <option
                                    value="{{ $formulario }}"
                                    {{ request('nombre_formulario') === $formulario ? 'selected' : '' }}
                                >
                                    {{ $formulario }}
                                </option>

                            @endforeach

                        </select>


                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />

                            </svg>

                        </div>

                    </div>

                </div>



                <!-- ORDEN -->

                <div>

                    <label
                        for="orden"
                        class="mb-2 block text-sm font-bold text-slate-700"
                    >
                        Ordenar por fecha
                    </label>

                    <div class="relative">

                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 7V3m0 4a2 2 0 100 4m0-4a2 2 0 110 4m0 0v10m8-14V3m0 4a2 2 0 100 4m0-4a2 2 0 110 4m0 0v10"
                                />

                            </svg>

                        </div>


                        <select
                            id="orden"
                            name="orden"
                            class="h-14 w-full appearance-none rounded-xl border border-slate-300 bg-white pl-12 pr-10 text-base text-slate-700 outline-none transition duration-200 focus:border-apch-700 focus:ring-4 focus:ring-apch-700/10"
                        >

                            <option
                                value="desc"
                                {{ request('orden', 'desc') === 'desc' ? 'selected' : '' }}
                            >
                                Más recientes primero
                            </option>

                            <option
                                value="asc"
                                {{ request('orden') === 'asc' ? 'selected' : '' }}
                            >
                                Más antiguos primero
                            </option>

                        </select>


                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />

                            </svg>

                        </div>

                    </div>

                </div>



                <!-- BOTONES -->

                <div class="flex items-end gap-3">

                    <button
                        type="submit"
                        class="inline-flex h-14 flex-1 items-center justify-center gap-2 rounded-xl bg-apch-700 px-5 text-base font-bold text-white transition duration-200 hover:bg-apch-800 hover:shadow-lg"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414A1 1 0 0014 14.414V19a1 1 0 01-.553.894l-4 2A1 1 0 018 21v-6.586a1 1 0 00-.293-.707L1.293 7.293A1 1 0 011 6.586V4z"
                            />

                        </svg>

                        Filtrar

                    </button>


                    <a
                        href="{{ route('formularios.registros') }}"
                        class="inline-flex h-14 items-center justify-center rounded-xl border-2 border-slate-200 bg-white px-5 text-base font-bold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900"
                    >
                        Limpiar
                    </a>

                </div>

            </div>

        </form>

    </section>



    <!-- TABLA -->

    <section class="overflow-hidden rounded-[24px] border border-slate-200 bg-white shadow-sm animate-fade-up">


        <!-- CABECERA TABLA -->

        <div class="border-b border-slate-200 bg-white px-7 py-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-apch-50 text-apch-700">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 17v-2a4 4 0 00-4-4H3m6 6v2a4 4 0 004 4h2m-6-6H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5"
                            />

                        </svg>

                    </div>


                    <div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Historial de formularios
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Registros almacenados en el sistema.
                        </p>

                    </div>

                </div>


                <div class="rounded-xl border border-red-100 bg-apch-50 px-5 py-3 text-center">

                    <p class="text-xl font-bold text-apch-700">
                        {{ $formularios->count() }}
                    </p>

                    <p class="text-xs font-semibold text-slate-600">
                        {{ $formularios->count() == 1 ? 'registro' : 'registros' }}
                    </p>

                </div>

            </div>

        </div>



        <!-- TABLA -->

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px] border-collapse">


                <thead class="bg-slate-50">

                    <tr>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            ID
                        </th>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Usuario
                        </th>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Formulario
                        </th>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Fecha
                        </th>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Hora
                        </th>

                        <th class="border-b border-slate-200 px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Acción
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse ($formularios as $formulario)

                        <tr class="group transition duration-200 hover:bg-apch-50/50">


                            <!-- ID -->

                            <td class="px-6 py-5">

                                <span class="inline-flex rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-bold text-slate-600 group-hover:bg-white">

                                    #{{ $formulario->id }}

                                </span>

                            </td>


                            <!-- USUARIO -->

                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-apch-700 text-sm font-bold text-white">

                                        {{ strtoupper(substr($formulario->usuario->name, 0, 1)) }}

                                    </div>


                                    <div class="min-w-0">

                                        <p class="text-base font-semibold text-slate-800">
                                            {{ $formulario->usuario->name }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            <!-- FORMULARIO -->

                            <td class="px-6 py-5">

                                <span class="text-base font-semibold leading-6 text-slate-800">
                                    {{ $formulario->nombre_formulario }}
                                </span>

                            </td>


                            <!-- FECHA -->

                            <td class="whitespace-nowrap px-6 py-5">

                                <div class="flex items-center gap-2 text-base text-slate-600">

                                    <svg
                                        class="h-5 w-5 text-apch-700"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />

                                    </svg>

                                    {{ $formulario->created_at->format('d/m/Y') }}

                                </div>

                            </td>


                            <!-- HORA -->

                            <td class="whitespace-nowrap px-6 py-5">

                                <div class="flex items-center gap-2 text-base text-slate-600">

                                    <svg
                                        class="h-5 w-5 text-slate-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />

                                    </svg>

                                    {{ $formulario->created_at->format('H:i') }}

                                </div>

                            </td>


                            <!-- ACCIÓN -->

                            <td class="px-6 py-5">

                                <form
                                    method="POST"
                                    action="{{ route('formularios.eliminar', $formulario) }}"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-bold text-red-700 transition duration-200 hover:border-red-300 hover:bg-red-100"
                                    >

                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14"
                                            />

                                        </svg>

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-16 text-center"
                            >

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">

                                    <svg
                                        class="h-8 w-8"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.7"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.707.293V19a2 2 0 01-2 2z"
                                        />

                                    </svg>

                                </div>

                                <p class="mt-4 text-base font-bold text-slate-600">
                                    No existen registros para mostrar.
                                </p>

                                <p class="mt-1 text-sm text-slate-400">
                                    Intente cambiar los filtros de búsqueda.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>



    <!-- INFORMACIÓN INFERIOR -->

    <section class="mt-6 rounded-[20px] border border-slate-200 bg-white p-5 shadow-sm">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex items-start gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-apch-50 text-apch-700">

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"
                        />

                    </svg>

                </div>


                <div>

                    <p class="text-sm font-bold text-slate-800">
                        Historial institucional
                    </p>

                    <p class="mt-1 text-sm leading-6 text-slate-500">
                        Los registros corresponden a las acciones realizadas por los usuarios en los formularios del sistema.
                    </p>

                </div>

            </div>


            <div class="shrink-0 rounded-xl bg-slate-50 px-4 py-3 text-sm text-slate-500">

                Orden:

                <span class="font-bold text-slate-700">
                    {{ request('orden', 'desc') === 'asc' ? 'Más antiguos primero' : 'Más recientes primero' }}
                </span>

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
