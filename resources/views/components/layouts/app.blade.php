<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-hidden">
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
    <header class="fixed top-0 w-full z-[70] p-6 lg:p-8 flex justify-between items-center pointer-events-none mix-blend-difference text-white">
        <a href="#hero-section" class="font-medium text-lg tracking-tighter hover:text-[#FF4433] transition-colors duration-300 pointer-events-auto">ARCH.STUDIO</a>
        
        <!-- Desktop Nav -->
        <nav class="hidden lg:flex gap-6 items-center text-sm font-medium uppercase tracking-widest pointer-events-auto">
            <a href="#about" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">{{ __('content.navbar.about') }}</a>
            <a href="#resume" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">{{ __('content.navbar.resume') }}</a>
            <a href="#portfolio" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">{{ __('content.navbar.portfolio') }}</a>
            <a href="#contact" class="opacity-60 hover:opacity-100 hover:scale-105 transition-all duration-300">{{ __('content.navbar.contact') }}</a>
            
            <div class="ml-2 pl-6 border-l border-white/20">
                @if(app()->getLocale() == 'en')
                    <a href="{{ route('lang.switch', 'es') }}" class="opacity-60 hover:opacity-100 transition-all duration-300 font-bold">ES</a>
                @else
                    <a href="{{ route('lang.switch', 'en') }}" class="opacity-60 hover:opacity-100 transition-all duration-300 font-bold">EN</a>
                @endif
            </div>
        </nav>

        <!-- Mobile Toggle -->
        <button id="menu-toggle" class="lg:hidden flex flex-col gap-1.5 pointer-events-auto group focus:outline-none" aria-label="Toggle Menu">
            <span class="w-8 h-0.5 bg-white transition-all duration-300 group-[.open]:rotate-45 group-[.open]:translate-y-2"></span>
            <span class="w-8 h-0.5 bg-white transition-all duration-300 group-[.open]:opacity-0"></span>
            <span class="w-8 h-0.5 bg-white transition-all duration-300 group-[.open]:-rotate-45 group-[.open]:-translate-y-2"></span>
        </button>
    </header>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-0 bg-black z-[60] flex flex-col items-center justify-center gap-8 translate-x-full pointer-events-none transition-transform duration-500 lg:hidden ease-expo">
        <nav class="flex flex-col items-center gap-8 text-2xl font-display font-bold uppercase tracking-[0.2em] text-white">
            <a href="#about" class="mobile-link hover:text-[#FF4433] transition-colors">{{ __('content.navbar.about') }}</a>
            <a href="#resume" class="mobile-link hover:text-[#FF4433] transition-colors">{{ __('content.navbar.resume') }}</a>
            <a href="#portfolio" class="mobile-link hover:text-[#FF4433] transition-colors">{{ __('content.navbar.portfolio') }}</a>
            <a href="#contact" class="mobile-link hover:text-[#FF4433] transition-colors">{{ __('content.navbar.contact') }}</a>
        </nav>
        
        <div class="mt-8 pt-8 border-t border-white/10 flex gap-6 text-sm font-bold tracking-widest text-white/40">
            <a href="{{ route('lang.switch', 'en') }}" class="{{ app()->getLocale() == 'en' ? 'text-white' : '' }}">EN</a>
            <a href="{{ route('lang.switch', 'es') }}" class="{{ app()->getLocale() == 'es' ? 'text-white' : '' }}">ES</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('mobile-menu');
            const links = document.querySelectorAll('.mobile-link');

            const toggleMenu = () => {
                const isOpen = toggle.classList.toggle('open');
                menu.classList.toggle('translate-x-full', !isOpen);
                menu.classList.toggle('translate-x-0', isOpen);
                
                // Toggle pointer events
                menu.classList.toggle('pointer-events-none', !isOpen);
                menu.classList.toggle('pointer-events-auto', isOpen);
                
                document.body.style.overflow = isOpen ? 'hidden' : '';
            };

            toggle.addEventListener('click', toggleMenu);
            links.forEach(link => link.addEventListener('click', toggleMenu));
        });
    </script>

    <!-- Contenido -->
    <main class="relative z-10">
        {{ $slot }}
    </main>

    <footer class="relative z-10 p-12 text-center text-sm opacity-40">
        &copy; {{ date('Y') }} Architect Portfolio. Built with Laravel + Three.js
    </footer>

    @stack('modals')
</body>
</html>
