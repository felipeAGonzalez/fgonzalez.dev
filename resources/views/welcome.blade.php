<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Felipe A. Gonzalez</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#07111f] text-white antialiased">

    <main class="relative min-h-screen overflow-hidden">

        {{-- Fondo --}}
        <div class="absolute inset-0 bg-gradient-to-r from-[#06101e] via-[#07182b] to-[#0c1623]"></div>

        {{-- Header --}}
        <header class="relative z-20 mx-auto flex max-w-[1400px] items-center justify-between px-8 py-7">

            {{-- Logo / nombre --}}
            <div class="flex items-center gap-6">
                <div class="text-3xl font-extrabold tracking-tight">
                    FG
                </div>

                <div class="text-xl font-medium text-slate-200">
                    Felipe A. Gonzalez
                </div>
            </div>

            {{-- Navegación --}}
            <nav class="hidden items-center gap-10 lg:flex">
                <a href="#inicio"
                   class="border-b-2 border-blue-500 pb-3 text-blue-400">
                    Inicio
                </a>

                <a href="#proyectos"
                   class="pb-3 text-slate-200 transition hover:text-blue-400">
                    Proyectos
                </a>

                <a href="#sobre-mi"
                   class="pb-3 text-slate-200 transition hover:text-blue-400">
                    Sobre mí
                </a>

                <a href="#blog"
                   class="pb-3 text-slate-200 transition hover:text-blue-400">
                    Blog
                </a>

                <a href="#contacto"
                   class="pb-3 text-slate-200 transition hover:text-blue-400">
                    Contacto
                </a>
            </nav>

            {{-- Redes --}}
            <div class="hidden items-center gap-6 text-xl text-slate-200 lg:flex">

                <a href="#" aria-label="GitHub" class="transition hover:text-blue-400">
                    GH
                </a>

                <a href="#" aria-label="LinkedIn" class="transition hover:text-blue-400">
                    in
                </a>

                <a href="mailto:"
                   aria-label="Correo"
                   class="transition hover:text-blue-400">
                    ✉
                </a>

            </div>

        </header>

        {{-- Hero --}}
        <section id="inicio"
                 class="relative z-10 mx-auto flex min-h-[650px] max-w-[1400px] items-center px-8">

            <div class="max-w-2xl">

                {{-- Etiqueta --}}
                <div class="mb-7 flex items-center gap-4">
                    <span class="h-[3px] w-10 bg-cyan-400"></span>

                    <span class="text-sm tracking-[0.25em] text-slate-300">
                        DESARROLLADOR DE SOFTWARE
                    </span>
                </div>

                {{-- Título --}}
                <h1 class="text-5xl font-bold leading-[1.05] tracking-tight md:text-7xl">
                    Hola, soy

                    <span class="block bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">
                        Felipe A. Gonzalez
                    </span>
                </h1>

                {{-- Descripción --}}
                <p class="mt-7 max-w-xl text-lg leading-8 text-slate-300">
                    Desarrollador de software apasionado por crear soluciones
                    que resuelvan problemas reales. Aquí comparto mis proyectos,
                    experiencias y lo que estoy aprendiendo en el camino.
                </p>

                {{-- Botones --}}
                <div class="mt-9 flex flex-wrap gap-5">

                    <a href="#proyectos"
                       class="rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 px-9 py-4 font-medium shadow-lg shadow-blue-500/20 transition hover:scale-105">
                        Ver proyectos →
                    </a>

                    <a href="#sobre-mi"
                       class="rounded-full border border-slate-600 px-9 py-4 font-medium text-slate-200 transition hover:border-blue-400 hover:text-blue-400">
                        Sobre mí
                    </a>

                </div>

            </div>

        </section>

    </main>

</body>
</html>