<section id="portfolio" class="min-h-screen pt-32 pb-24 flex flex-col justify-center px-8 lg:px-24 bg-transparent pointer-events-none relative">
    <div class="pointer-events-auto w-full max-w-7xl mx-auto gs-fade-up">
        <div class="flex justify-between items-end mb-10">
            <h2 class="text-3xl sm:text-4xl lg:text-4xl xl:text-5xl font-display font-bold tracking-tight dark:text-white">{!! __('content.portfolio.title_1') !!}<br/>{!! __('content.portfolio.title_2') !!}</h2>
            <div class="hidden lg:block w-1/3 text-right">
                <p class="opacity-60 text-base lg:text-lg">{{ __('content.portfolio.subtitle') }}</p>
            </div>
        </div>

        <!-- Bento Grid Structure -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6 auto-rows-[220px]">
            @foreach(__('content.portfolio.projects') as $project)
            <div class="bento-item group {{ $project['grid_class'] }} relative overflow-hidden rounded-3xl bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 backdrop-blur-md transition-all duration-500 hover:bg-black/10 dark:hover:bg-white/10 cursor-pointer" 
                 data-project="{{ $project['id'] }}" 
                 data-drawer-trigger="true" 
                 data-drawer-type="project" 
                 data-drawer-title="{{ $project['title'] }}" 
                 data-drawer-subtitle="{{ $project['subtitle'] }}"
                 data-drawer-desc1="{{ $project['desc_1'] }}"
                 data-drawer-desc2="{{ $project['desc_2'] }}"
                 data-drawer-location="{{ $project['location'] }}"
                 data-drawer-area="{{ $project['area'] }}"
                 data-drawer-year="{{ $project['year'] }}"
                 data-drawer-role="{{ $project['role'] }}"
                 data-drawer-img="{{ asset($project['image']) }}">
                 
                <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="absolute inset-0 w-full h-full object-cover z-0 transition-transform duration-700 group-hover:scale-110 opacity-80" onerror="this.style.display='none'">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent z-10"></div>
                <div class="absolute bottom-0 left-0 p-6 z-20 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                    <span class="text-xs font-mono uppercase tracking-widest text-[#FF4433] mb-2 block drop-shadow-md">{{ $project['number'] }}</span>
                    <h3 class="{{ $loop->first ? 'text-2xl' : ($loop->last ? 'text-lg leading-tight' : 'text-xl') }} font-bold text-white mb-2 drop-shadow-md">{{ $project['title'] }}</h3>
                    @if($loop->first)
                    <p class="text-white/90 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100 drop-shadow-md">{{ $project['subtitle'] }}</p>
                    @endif
                </div>
                @if($project['id'] == 2)
                <!-- Abstract geometry / icon could go here -->
                <div class="absolute top-6 right-6 opacity-40 group-hover:opacity-100 group-hover:rotate-45 transition-all duration-500 text-white z-20">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
