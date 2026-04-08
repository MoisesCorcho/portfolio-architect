<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Architect Portfolio | 3D Experience</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Syne:wght@400;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] font-sans selection:bg-[#FF4433] selection:text-white overflow-x-hidden antialiased">
    
    <!-- Contenedor 3D Fijo al fondo -->
    <div id="three-container" class="fixed inset-0 z-[-1] w-full h-full pointer-events-none"></div>

    <!-- Navegación -->
    <header class="fixed top-0 w-full z-50 p-6 lg:p-8 flex justify-between items-center pointer-events-auto mix-blend-difference text-white">
        <a href="#hero-section" class="font-medium text-lg tracking-tighter hover:text-[#FF4433] transition-colors duration-300">ARCH.STUDIO</a>
        <nav class="flex gap-6 text-sm font-medium uppercase tracking-widest">
            <a href="#about" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">About</a>
            <a href="#portfolio" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">Portfolio</a>
            <a href="#contact" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">Contact</a>
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
