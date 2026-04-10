<section id="hero-section" class="h-screen flex items-center justify-center bg-transparent pointer-events-none relative overflow-hidden">
    <div class="text-center pointer-events-auto relative z-10 w-full flex flex-col items-center">
        <h1 class="hero-title font-display text-5xl sm:text-6xl lg:text-7xl xl:text-7xl leading-[0.9] font-bold tracking-tighter text-black dark:text-white dark:opacity-90 mix-blend-difference mb-4">
            <span class="block overflow-hidden h-[1.1em]"><span class="block translate-y-full opacity-0 gs-reveal">{{ __('content.hero.title_1') }}</span></span>
            <span class="block overflow-hidden h-[1.1em]"><span class="block translate-y-full opacity-0 gs-reveal">{{ __('content.hero.title_2') }}</span></span>
        </h1>
        
        <div class="hero-subtitle overflow-hidden mt-6">
            <p class="text-base lg:text-lg uppercase tracking-[0.6em] opacity-0 translate-y-full gs-reveal text-black dark:text-white font-light">
                {{ __('content.hero.subtitle') }}
            </p>
        </div>

        <div class="mt-12 lg:mt-16 h-[1px] w-24 bg-black/20 dark:bg-white/20 gs-reveal opacity-0 scale-x-0 origin-center"></div>

        <div class="hero-metadata overflow-hidden mt-8">
            <p class="text-xs lg:text-sm font-mono tracking-[0.3em] opacity-0 translate-y-full gs-reveal text-black/60 dark:text-white/60 uppercase">
                {{ __('content.hero.metadata') }}
            </p>
        </div>
    </div>
</section>
