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
                
                <!-- Drawer Section: Project Info -->
                <div id="drawer-project-content" class="drawer-section">
                    <div class="space-y-6 text-lg text-white/70 font-sans leading-relaxed">
                    <div class="overflow-hidden">
                        <p class="drawer-text">El espacio arquitectónico no es simplemente un vacío delimitado, sino un volumen activo y lleno de significado. Este proyecto explora la intersección entre la materialidad cruda y la luz natural, esculpiendo un refugio que desafía la percepción tradicional del habitar.</p>
                    </div>
                    <div class="overflow-hidden mb-12">
                        <p class="drawer-text">Mediante el uso estratégico de hormigón visto y grandes paños de vidrio, diluimos los límites entre el interior y el exterior. Cada línea responde a un propósito; cada sombra es un componente calculado del diseño, ofreciendo una experiencia sensorial completa y minimalista.</p>
                    </div>
                </div>

                <!-- Stats/Extra Info Demo -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 border-t border-white/10 pt-12 mt-12 mb-12">
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

                <!-- Project Gallery -->
                <div class="border-t border-white/10 pt-12 pb-8">
                    <div class="overflow-hidden mb-8">
                        <h3 class="text-2xl font-display font-bold drawer-text">Project Gallery</h3>
                    </div>
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="overflow-hidden rounded-xl bg-white/5 aspect-[4/3] group cursor-pointer" onclick="openLightbox(this.querySelector('img').src)">
                            <img src="{{ asset('build/images/buildings/placeholder/building1.jpg') }}" alt="Gallery Image 1" class="w-full h-full object-cover group-hover:opacity-60 transition-opacity duration-300 drawer-text">
                        </div>
                        <div class="overflow-hidden rounded-xl bg-white/5 aspect-[4/3] group cursor-pointer" onclick="openLightbox(this.querySelector('img').src)">
                            <img src="{{ asset('build/images/buildings/placeholder/building1.jpg') }}" alt="Gallery Image 2" class="w-full h-full object-cover group-hover:opacity-60 transition-opacity duration-300 drawer-text" style="filter: hue-rotate(45deg);">
                        </div>
                        <div class="overflow-hidden rounded-xl bg-white/5 aspect-[4/3] group cursor-pointer" onclick="openLightbox(this.querySelector('img').src)">
                            <img src="{{ asset('build/images/buildings/placeholder/building1.jpg') }}" alt="Gallery Image 3" class="w-full h-full object-cover group-hover:opacity-60 transition-opacity duration-300 drawer-text" style="filter: hue-rotate(90deg) brightness(0.8);">
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Drawer Section: About Info -->
                <div id="drawer-about-content" class="drawer-section hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                        <div class="overflow-hidden rounded-3xl aspect-[4/5] bg-white/5 relative">
                             <!-- User can change this portrait image later -->
                             <img src="{{ asset('build/images/buildings/placeholder/building1.jpg') }}" alt="Architect Portrait" class="absolute inset-0 w-full h-full object-cover drawer-text grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                        <div class="space-y-6">
                            <div class="overflow-hidden">
                                <h3 class="text-3xl lg:text-4xl font-display font-bold drawer-text text-white">Sobre El Estudio</h3>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-lg text-white/70 font-sans leading-relaxed drawer-text">Creemos firmemente en el poder transformador de la arquitectura. Cada línea que trazamos y cada material que elegimos tiene el propósito de conectar a las personas con su entorno, generando espacios introspectivos, sostenibles y sumamente habitables.</p>
                            </div>
                            <div class="overflow-hidden mt-6">
                                <p class="text-lg text-white/70 font-sans leading-relaxed drawer-text">Con más de 15 años de experiencia internacional, hemos diseñado proyectos que trascienden modas pasajeras, buscando una pureza estética que resista el polvo del tiempo. Desde grandes centros urbanos hasta retiros remotos y en silencio, nuestro compromiso es con la materia.</p>
                            </div>
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

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 z-[60] bg-black/95 items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-md">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 lg:top-10 lg:right-10 text-white/60 hover:text-white transition-colors p-3 bg-white/5 hover:bg-white/10 rounded-full">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <img id="lightbox-img" src="" alt="Fullscreen Preview" class="max-w-[95vw] max-h-[95vh] lg:max-w-[90vw] lg:max-h-[90vh] object-contain rounded-lg shadow-2xl">
</div>

<script>
    function openLightbox(src) {
        const lb = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        if(!lb || !img) return;
        
        img.src = src;
        lb.classList.remove('hidden');
        lb.classList.add('flex');
        
        // Timeout to allow display:flex to apply before transition
        setTimeout(() => {
            lb.classList.remove('opacity-0');
        }, 10);
    }

    function closeLightbox() {
        const lb = document.getElementById('lightbox');
        if(!lb) return;
        
        lb.classList.add('opacity-0');
        setTimeout(() => {
            lb.classList.add('hidden');
            lb.classList.remove('flex');
            document.getElementById('lightbox-img').src = ''; // Clear memory
        }, 300);
    }
</script>
