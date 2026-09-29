<!DOCTYPE html>

<html lang="es">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Crear usuario | APCH</title>

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

                    'pulse-soft': 'pulseSoft 2.5s ease-in-out infinite'

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

                    pulseSoft: {

                        '0%, 100%': {

                            opacity: '1'

                        },

                        '50%': {

                            opacity: '0.55'

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

    <!-- IDENTIDAD -->

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


    <!-- SESIÓN -->

    <div class="flex items-center gap-3">

        <div class="hidden items-center gap-2 rounded-full border border-green-200 bg-green-50 px-4 py-2.5 text-sm font-semibold text-green-700 sm:flex">

            <span class="relative flex h-2.5 w-2.5">

                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-60"></span>

                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-green-500"></span>

            </span>

            Sesión activa

        </div>


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

<main class="mx-auto w-full max-w-5xl px-6 py-10 lg:px-10">


<!-- ===================================================== -->
<!-- TÍTULO -->
<!-- ===================================================== -->

<section class="mb-8 animate-fade-up">

    <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">

        <div>

            <div class="mb-3 flex items-center gap-2">

                <span class="h-2.5 w-2.5 rounded-full bg-apch-700"></span>

                <p class="text-sm font-bold uppercase tracking-[0.2em] text-apch-700">

                    Administración

                </p>

            </div>


            <h2 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl">

                Crear usuario

            </h2>


            <p class="mt-3 max-w-2xl text-base leading-7 text-slate-500 sm:text-lg">

                Registre una nueva cuenta para permitir el acceso
                al sistema institucional de formularios digitales.

            </p>

        </div>


        <!-- INDICADOR -->

        <div class="hidden items-center gap-2 rounded-full border border-red-200 bg-red-50 px-4 py-2.5 text-sm font-bold text-apch-700 sm:flex">

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
                    d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM4 20a8 8 0 0116 0"
                />

            </svg>

            Nueva cuenta

        </div>

    </div>

</section>


<!-- ===================================================== -->
<!-- ERRORES -->
<!-- ===================================================== -->

@if ($errors->any())

    <div class="mb-8 animate-fade-in rounded-2xl border-2 border-red-200 bg-red-50 px-6 py-5">

        <div class="flex items-start gap-4">

            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-red-100 text-apch-700">

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
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />

                </svg>

            </div>


            <div class="min-w-0">

                <p class="text-base font-bold text-red-800">

                    No se pudo crear el usuario

                </p>

                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm leading-6 text-red-700">

                    @foreach ($errors->all() as $error)

                        <li>

                            {{ $error }}

                        </li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

@endif


<!-- ===================================================== -->
<!-- FORMULARIO -->
<!-- ===================================================== -->

<section class="animate-fade-up overflow-hidden rounded-[24px] border-2 border-slate-200 bg-white shadow-sm">


    <!-- CABECERA DEL FORMULARIO -->

    <div class="border-b-2 border-red-100 bg-red-50 px-6 py-6 sm:px-8">

        <div class="flex items-center gap-4">

            <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl bg-apch-700 text-white shadow-sm">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-7 w-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm10 5v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                    />

                </svg>

            </div>


            <div>

                <h3 class="text-xl font-bold text-slate-900">

                    Información de la cuenta

                </h3>

                <p class="mt-1 text-sm text-slate-500">

                    Complete los datos del nuevo usuario.

                </p>

            </div>

        </div>

    </div>


    <!-- FORM -->

    <form
        method="POST"
        action="{{ route('usuarios.store') }}"
        class="p-6 sm:p-8 lg:p-10"
    >

        @csrf


        <!-- NOMBRE -->

        <div class="mb-7">

            <label
                for="name"
                class="mb-2.5 block text-base font-bold text-slate-800"
            >

                Nombre completo

            </label>


            <div class="relative">

                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

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
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />

                    </svg>

                </div>


                <input
                    type="text"
                    id="name"
                    name="name"
                    class="h-14 w-full rounded-xl border-2 border-slate-200 bg-white pl-12 pr-4 text-base text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-apch-700 focus:ring-4 focus:ring-red-700/10"
                    placeholder="Ingrese el nombre completo"
                    value="{{ old('name') }}"
                    required
                >

            </div>

        </div>


        <!-- USUARIO -->

        <div class="mb-7">

            <label
                for="username"
                class="mb-2.5 block text-base font-bold text-slate-800"
            >

                Nombre de usuario

            </label>


            <div class="relative">

                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

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
                            d="M15 7a2 2 0 11-4 0 2 2 0 014 0zm6 2a2 2 0 11-4 0 2 2 0 014 0zM7 9a2 2 0 11-4 0 2 2 0 014 0zm8 4a5 5 0 00-10 0v1h10v-1zm5 5a5 5 0 00-10 0v1h10v-1z"
                        />

                    </svg>

                </div>


                <input
                    type="text"
                    id="username"
                    name="username"
                    class="h-14 w-full rounded-xl border-2 border-slate-200 bg-white pl-12 pr-4 text-base text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-apch-700 focus:ring-4 focus:ring-red-700/10"
                    placeholder="Ingrese el nombre de usuario"
                    value="{{ old('username') }}"
                    autocomplete="username"
                    required
                >

            </div>


            <p class="mt-2 text-sm text-slate-400">

                El nombre de usuario debe ser único.

            </p>

        </div>


        <!-- CONTRASEÑA -->

        <div class="mb-7">

            <label
                for="password"
                class="mb-2.5 block text-base font-bold text-slate-800"
            >

                Contraseña

            </label>


            <div class="relative">

                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

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
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-5a2 2 0 00-2-2H6a2 2 0 00-2 2v5a2 2 0 002 2zm10-9V8a4 4 0 10-8 0v4h8z"
                        />

                    </svg>

                </div>


                <input
                    type="password"
                    id="password"
                    name="password"
                    class="h-14 w-full rounded-xl border-2 border-slate-200 bg-white pl-12 pr-4 text-base text-slate-900 outline-none transition-all duration-200 placeholder:text-slate-400 focus:border-apch-700 focus:ring-4 focus:ring-red-700/10"
                    placeholder="Ingrese la contraseña"
                    autocomplete="new-password"
                    required
                >

            </div>


            <p class="mt-2 text-sm text-slate-400">

                La contraseña debe tener al menos 8 caracteres.

            </p>

        </div>


        <!-- ROL -->

        <div>

            <label
                for="role"
                class="mb-2.5 block text-base font-bold text-slate-800"
            >

                Rol

            </label>


            <div class="relative">

                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

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
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"
                        />

                    </svg>

                </div>


                <select
                    id="role"
                    name="role"
                    class="h-14 w-full appearance-none rounded-xl border-2 border-slate-200 bg-white pl-12 pr-12 text-base text-slate-900 outline-none transition-all duration-200 focus:border-apch-700 focus:ring-4 focus:ring-red-700/10"
                    required
                >

                    <option value="">

                        Seleccione un rol

                    </option>

                    <option
                        value="admin"
                        {{ old('role') === 'admin' ? 'selected' : '' }}
                    >

                        Administrador

                    </option>

                    <option
                        value="secretario"
                        {{ old('role') === 'secretario' ? 'selected' : '' }}
                    >

                        Secretario/a

                    </option>

                </select>


                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-slate-400">

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
                            d="M19 9l-7 7-7-7"
                        />

                    </svg>

                </div>

            </div>

        </div>


        <!-- ================================================= -->
        <!-- ACCIONES -->
        <!-- ================================================= -->

        <div class="mt-10 flex flex-col-reverse gap-3 border-t-2 border-slate-100 pt-7 sm:flex-row sm:items-center sm:justify-between">


            <!-- VOLVER -->

            <a
                href="{{ route('usuarios.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border-2 border-slate-200 bg-white px-6 py-3.5 text-base font-bold text-slate-600 transition-all duration-200 hover:border-slate-400 hover:bg-slate-50 hover:text-slate-900"
            >

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
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    />

                </svg>

                Volver

            </a>


            <!-- CREAR -->

            <button
                type="submit"
                class="group inline-flex items-center justify-center gap-3 rounded-xl bg-apch-700 px-7 py-3.5 text-base font-bold text-white shadow-lg shadow-red-900/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-apch-800 hover:shadow-xl"
            >

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

                Crear usuario

            </button>

        </div>

    </form>

</section>
```

</main>

<!-- ========================================================= -->

<!-- FOOTER -->

<!-- ========================================================= -->

<footer class="mt-10 bg-black text-white">

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
