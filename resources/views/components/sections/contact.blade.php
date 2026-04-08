<section id="contact" class="min-h-screen flex items-center justify-center px-8 lg:px-24 bg-transparent pointer-events-none relative">
    <div class="w-full max-w-4xl p-8 lg:p-16 bg-black/5 dark:bg-white/5 backdrop-blur-3xl rounded-[2.5rem] border border-black/10 dark:border-white/10 pointer-events-auto shadow-2xl gs-fade-up">
        <div class="text-center mb-12">
            <h2 class="text-5xl lg:text-7xl font-display font-bold tracking-tighter dark:text-white mb-4">LET'S BUILD<br/><span class="text-[#FF4433] italic font-light">TOGETHER</span></h2>
            <p class="text-xl opacity-60">Ready to start your next visionary project?</p>
        </div>

        <form class="space-y-6 max-w-2xl mx-auto contact-form">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="w-full relative group">
                    <input type="text" id="name" name="name" 
                        class="w-full bg-transparent border-b-2 border-black/20 dark:border-white/20 py-4 px-2 outline-none focus:border-[#FF4433] dark:focus:border-[#FF4433] transition-colors peer text-lg dark:text-white" required>
                    <label for="name" class="absolute left-2 top-4 text-black/50 dark:text-white/50 transition-all peer-focus:-top-3 peer-focus:text-xs peer-focus:text-[#FF4433] peer-valid:-top-3 peer-valid:text-xs">Your Name</label>
                </div>
                <div class="w-full relative group">
                    <input type="email" id="email" name="email" 
                        class="w-full bg-transparent border-b-2 border-black/20 dark:border-white/20 py-4 px-2 outline-none focus:border-[#FF4433] dark:focus:border-[#FF4433] transition-colors peer text-lg dark:text-white" required>
                    <label for="email" class="absolute left-2 top-4 text-black/50 dark:text-white/50 transition-all peer-focus:-top-3 peer-focus:text-xs peer-focus:text-[#FF4433] peer-valid:-top-3 peer-valid:text-xs">Email Address</label>
                </div>
            </div>
            <div class="w-full relative group pt-4">
                <textarea id="message" name="message" rows="3"
                    class="w-full bg-transparent border-b-2 border-black/20 dark:border-white/20 py-4 px-2 outline-none focus:border-[#FF4433] dark:focus:border-[#FF4433] transition-colors peer text-lg dark:text-white resize-none" required></textarea>
                <label for="message" class="absolute left-2 top-8 text-black/50 dark:text-white/50 transition-all peer-focus:top-0 peer-focus:text-xs peer-focus:text-[#FF4433] peer-valid:top-0 peer-valid:text-xs">Project Details</label>
            </div>
            <div class="flex justify-center pt-8">
                <button type="submit" class="group relative px-12 py-5 bg-black dark:bg-white text-white dark:text-black rounded-full font-bold uppercase tracking-widest overflow-hidden transition-colors duration-300">
                    <span class="relative z-10 group-hover:text-white transition-colors duration-300">Commence</span>
                    <div class="absolute inset-0 h-full w-full bg-[#FF4433] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                </button>
            </div>

        </form>
    </div>
</section>
