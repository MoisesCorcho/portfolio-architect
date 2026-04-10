<section id="hero-section" class="h-screen flex items-center justify-center bg-transparent pointer-events-none relative overflow-hidden">
    <!-- Overlay radial sutil para mejorar el contraste del texto sin ensuciar el diseño -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(0,0,0,0.1)_0%,transparent_70%)] dark:bg-[radial-gradient(circle_at_center,rgba(0,0,0,0.3)_0%,transparent_80%)] z-0 pointer-events-none"></div>

    <div class="text-center pointer-events-auto relative z-10 w-full flex flex-col items-center">
        <h1 class="hero-title font-display text-5xl sm:text-7xl lg:text-8xl xl:text-8xl leading-[0.9] font-bold tracking-tighter text-black dark:text-white dark:opacity-90 mix-blend-difference mb-4 drop-shadow-[0_2px_10px_rgba(0,0,0,0.1)]">
            <span class="block overflow-hidden h-[1.1em]"><span class="block translate-y-full opacity-0 gs-reveal">{{ __('content.hero.title_1') }}</span></span>
            <span class="block overflow-hidden h-[1.1em]"><span class="block translate-y-full opacity-0 gs-reveal">{{ __('content.hero.title_2') }}</span></span>
        </h1>
        
        <div class="hero-subtitle overflow-hidden mt-6 mix-blend-difference">
            <p class="text-lg lg:text-xl uppercase tracking-[0.6em] opacity-0 translate-y-full gs-reveal text-black dark:text-white font-light drop-shadow-[0_1px_5px_rgba(0,0,0,0.1)]">
                {{ __('content.hero.subtitle') }}
            </p>
        </div>

        <div class="mt-16 lg:mt-20 h-[1px] w-32 bg-black/20 dark:bg-white/20 gs-reveal opacity-0 scale-x-0 origin-center mix-blend-difference"></div>

        <div class="hero-metadata overflow-hidden mt-10 mix-blend-difference">
            <p class="text-sm lg:text-base font-mono tracking-[0.3em] opacity-0 translate-y-full gs-reveal text-black/60 dark:text-white/60 uppercase drop-shadow-[0_1px_3px_rgba(0,0,0,0.1)]">
                {{ __('content.hero.metadata') }}
            </p>
        </div>
    </div>
</section>
