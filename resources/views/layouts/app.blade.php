<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Architect Portfolio | 3D Experience</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] font-sans selection:bg-[#FF4433] selection:text-white">
    
    <!-- Contenedor 3D Fijo -->
    <div id="three-container" class="fixed inset-0 z-[-1] w-full h-full pointer-events-none"></div>

    <!-- Navegación -->
    <header class="fixed top-0 w-full z-50 p-6 lg:p-8 flex justify-between items-center pointer-events-auto">
        <a href="#" class="font-medium text-lg tracking-tighter">ARCH.STUDIO</a>
        <nav class="flex gap-6 text-sm font-medium uppercase tracking-widest opacity-70 hover:opacity-100 transition-opacity">
            <a href="#about">About</a>
            <a href="#portfolio">Portfolio</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <!-- Contenido -->
    <main class="relative z-10">
        {{ $slot }}
    </main>

    <footer class="relative z-10 p-12 text-center text-sm opacity-40">
        &copy; {{ date('Y') }} Architect Portfolio. Built with Laravel + Three.js
    </footer>

</body>
</html>
