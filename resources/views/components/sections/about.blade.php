<section id="about" class="min-h-screen flex items-center justify-end px-8 lg:px-24 bg-transparent pointer-events-none relative">
    <div class="max-w-2xl p-8 lg:p-12 bg-white/10 dark:bg-black/10 backdrop-blur-xl rounded-3xl border border-white/20 pointer-events-auto transform-gpu gs-fade-up">
        <h2 class="text-4xl lg:text-5xl font-display font-bold mb-8 tracking-tight dark:text-white">{{ __('content.about.title') }}</h2>
        <p class="about-text text-xl lg:text-2xl leading-relaxed opacity-80 mb-10 dark:text-[#EDEDEC] font-light">
            {{ __('content.about.description') }}
        </p>
        <button type="button" class="inline-block px-10 py-4 bg-black text-white dark:bg-white dark:text-black rounded-full font-medium hover:scale-105 transition-transform duration-300 shadow-xl" 
            data-drawer-trigger="true" 
            data-drawer-type="about" 
            data-drawer-title="{{ __('content.about.drawer_title') }}" 
            data-drawer-subtitle="{{ __('content.about.drawer_subtitle') }}"
            data-drawer-bio1="{{ __('content.about.drawer_bio_1') }}"
            data-drawer-bio2="{{ __('content.about.drawer_bio_2') }}"
            data-drawer-img="{{ asset(__('content.about.drawer_image')) }}">
            {{ __('content.about.button') }}
        </button>
    </div>
</section>
