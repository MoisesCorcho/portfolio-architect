<div id="project-drawer" class="fixed inset-0 z-50 flex items-center justify-center p-4 lg:p-8 pointer-events-none">
    
    <!-- Backdrop -->
    <div id="project-drawer-backdrop" class="absolute inset-0 bg-black backdrop-blur-sm opacity-0"></div>

    <!-- Modal Content Box -->
    <div id="project-drawer-content" class="relative w-full max-w-5xl h-[85vh] lg:h-[80vh] flex flex-col bg-[#111111] dark:bg-[#0a0a0a] shadow-2xl rounded-3xl border border-white/10 text-white opacity-0 transform scale-95">
        
        <!-- Header -->
        <div class="flex-shrink-0 flex justify-between items-center p-6 lg:p-10 border-b border-white/10">
            <div class="overflow-hidden">
                <span id="drawer-subtitle" class="block text-xs font-mono uppercase tracking-widest text-[#FF4433] drawer-text">Project Info</span>
            </div>
            <button id="close-drawer" class="group p-3 rounded-full bg-white/5 hover:bg-white/10 transition-colors border border-white/5">
                <svg class="w-6 h-6 transform group-hover:rotate-90 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div class="flex-1 overflow-y-auto p-6 lg:p-10 custom-scrollbar">
            <div class="max-w-3xl mx-auto">
                <div class="overflow-hidden mb-8">
                    <h2 id="drawer-title" class="text-4xl lg:text-7xl font-display font-bold leading-tight drawer-text text-white">Minimalist Sanctuary</h2>
                </div>
                
                <div class="space-y-6 text-lg text-white/70 font-sans leading-relaxed">
                    <div class="overflow-hidden">
                        <p class="drawer-text">El espacio arquitectónico no es simplemente un vacío delimitado, sino un volumen activo y lleno de significado. Este proyecto explora la intersección entre la materialidad cruda y la luz natural, esculpiendo un refugio que desafía la percepción tradicional del habitar.</p>
                    </div>
                    <div class="overflow-hidden mb-12">
                        <p class="drawer-text">Mediante el uso estratégico de hormigón visto y grandes paños de vidrio, diluimos los límites entre el interior y el exterior. Cada línea responde a un propósito; cada sombra es un componente calculado del diseño, ofreciendo una experiencia sensorial completa y minimalista.</p>
                    </div>
                </div>

                <!-- Stats/Extra Info Demo -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 border-t border-white/10 pt-12 mt-12">
                    <div class="overflow-hidden">
                        <div class="drawer-text">
                            <span class="block text-xs font-mono text-white/50 mb-2">Location</span>
                            <span class="block font-bold">Tokyo, Japan</span>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="drawer-text">
                            <span class="block text-xs font-mono text-white/50 mb-2">Area</span>
                            <span class="block font-bold">450 m²</span>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="drawer-text">
                            <span class="block text-xs font-mono text-white/50 mb-2">Year</span>
                            <span class="block font-bold">2026</span>
                        </div>
                    </div>
                    <div class="overflow-hidden">
                        <div class="drawer-text">
                            <span class="block text-xs font-mono text-white/50 mb-2">Role</span>
                            <span class="block font-bold">Lead Architect</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Thin scrollbar for the drawer */
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.4);
}
</style>
