<section id="resume" class="min-h-screen pt-40 pb-24 flex flex-col justify-center px-8 lg:px-24 bg-transparent pointer-events-none relative z-10">
    <div class="pointer-events-auto w-full max-w-7xl mx-auto gs-fade-up">
        
        <div class="flex justify-between items-end mb-12">
            <h2 class="text-3xl sm:text-4xl lg:text-4xl xl:text-5xl font-display font-bold tracking-tight dark:text-white">
                {!! __('content.resume.title') !!}<br/>{!! __('content.resume.subtitle') !!}
            </h2>
            <div class="hidden lg:block w-1/3 text-right">
                <p class="opacity-60 text-lg uppercase tracking-widest font-mono">{{ __('content.resume.experience_title') }} & {{ __('content.resume.education_title') }}</p>
            </div>
        </div>

        <!-- Bento Grid Structure for Resume -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Experience Card (Spans 2 columns on large screens) -->
            <div class="lg:col-span-2 relative overflow-hidden rounded-3xl bg-black/5 dark:bg-black/40 border border-black/10 dark:border-white/10 backdrop-blur-xl p-8 md:p-10 transition-all duration-500 hover:bg-black/10 dark:hover:bg-black/60 group">
                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3 dark:text-white">
                    <svg class="w-6 h-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    {{ __('content.resume.experience_title') }}
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach(__('content.resume.experience') as $job)
                        <div class="relative pl-6 border-l border-black/20 dark:border-white/20">
                            <!-- Timeline dot -->
                            <div class="absolute w-3 h-3 bg-black dark:bg-white rounded-full -left-[6.5px] top-1.5 opacity-90 shadow-[0_0_10px_rgba(255,255,255,0.5)]"></div>
                            
                            <span class="text-sm font-mono opacity-80 mb-2 block tracking-wider dark:text-white/80 leading-none">{{ $job['years'] }}</span>
                            <h4 class="text-lg font-bold leading-tight mb-1 dark:text-white">{{ $job['title'] }}</h4>
                            <span class="text-sm font-medium text-[#FF4433] block mb-3">{{ $job['company'] }}</span>
                            <p class="text-sm opacity-90 leading-relaxed dark:text-white/90">{{ $job['description'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Education Card -->
            <div class="lg:col-span-1 relative overflow-hidden rounded-3xl bg-black/5 dark:bg-black/40 border border-black/10 dark:border-white/10 backdrop-blur-xl p-8 md:p-10 transition-all duration-500 hover:bg-black/10 dark:hover:bg-black/60 group">
                <h3 class="text-2xl font-bold mb-8 flex items-center gap-3 dark:text-white">
                    <svg class="w-6 h-6 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    {{ __('content.resume.education_title') }}
                </h3>
                
                <div class="space-y-8">
                    @foreach(__('content.resume.education') as $edu)
                        <div class="relative">
                            <span class="text-sm font-mono opacity-80 mb-1 block dark:text-white/80 leading-none">{{ $edu['year'] }}</span>
                            <h4 class="text-base font-bold leading-tight mb-1 dark:text-white">{{ $edu['degree'] }}</h4>
                            <p class="text-sm text-[#FF4433] font-medium">{{ $edu['school'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Skills Card -->
            <div class="lg:col-span-3 relative overflow-hidden rounded-3xl bg-black/5 text-black dark:text-white dark:bg-black/50 border border-black/10 dark:border-white/10 backdrop-blur-xl p-8 md:p-10 transition-all duration-500">
                <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    {{ __('content.resume.skills_title') }}
                </h3>
                
                <div class="flex flex-wrap gap-3">
                    @foreach(__('content.resume.skills') as $skill)
                        <span class="px-4 py-2 text-sm font-medium rounded-full bg-white/20 dark:bg-white/10 border border-black/10 dark:border-white/20 shadow-sm backdrop-blur-sm hover:scale-105 transition-transform duration-300 cursor-default">
                            {{ $skill }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
