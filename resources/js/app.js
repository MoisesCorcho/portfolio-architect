import './bootstrap';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { Experience3D } from './experience-3d.js';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
    // 3D Integration: Solo cargamos si NO es mobile (Desktop First Experience)
    const isMobile = window.innerWidth < 768;
    const experience = (document.getElementById('three-container') && !isMobile) 
        ? new Experience3D('three-container') 
        : null;

    if (isMobile) {
        console.log("📱 Mobile detectado: Saltando motor 3D para optimizar performance.");
    }

    // UI Animations
    initHeroAnimations();
    initScrollAnimations();
    initDrawerAnimations();
});

function initHeroAnimations() {
    const tl = gsap.timeline();
    tl.to('.gs-reveal', {
        y: 0,
        scaleX: 1,
        opacity: 1,
        duration: 1.2,
        stagger: 0.2,
        ease: 'power3.out',
        delay: 0.5
    });
}

function initScrollAnimations() {
    // Fade Up Elements
    gsap.utils.toArray('.gs-fade-up').forEach((el) => {
        gsap.fromTo(el,
            { y: 50, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 1.2,
                ease: 'power3.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                }
            }
        );
    });
}

function initDrawerAnimations() {
    const triggers = document.querySelectorAll('[data-drawer-trigger="true"]');
    const drawer = document.getElementById('project-drawer');
    const closeBtn = document.getElementById('close-drawer');
    const drawerTitle = document.getElementById('drawer-title');
    const drawerSubtitle = document.getElementById('drawer-subtitle');
    const drawerTexts = document.querySelectorAll('.drawer-text');
    
    // Elements to scale down
    const contentWrappers = document.querySelectorAll('main, header, footer');

    if (!drawer) return;

    let isOpen = false;

    triggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Populate data
            const title = trigger.getAttribute('data-drawer-title');
            const subtitle = trigger.getAttribute('data-drawer-subtitle');
            const type = trigger.getAttribute('data-drawer-type') || 'project';
            
            if (title && drawerTitle) drawerTitle.textContent = title;
            if (subtitle && drawerSubtitle) drawerSubtitle.textContent = subtitle;

            if (type === 'project') {
                const desc1 = trigger.getAttribute('data-drawer-desc1');
                const desc2 = trigger.getAttribute('data-drawer-desc2');
                const loc = trigger.getAttribute('data-drawer-location');
                const area = trigger.getAttribute('data-drawer-area');
                const year = trigger.getAttribute('data-drawer-year');
                const role = trigger.getAttribute('data-drawer-role');
                const img = trigger.getAttribute('data-drawer-img');

                const elDesc1 = document.getElementById('drawer-project-desc1');
                const elDesc2 = document.getElementById('drawer-project-desc2');
                const elLoc = document.getElementById('drawer-project-location');
                const elArea = document.getElementById('drawer-project-area');
                const elYear = document.getElementById('drawer-project-year');
                const elRole = document.getElementById('drawer-project-role');

                if (elDesc1) elDesc1.textContent = desc1 || '';
                if (elDesc2) elDesc2.textContent = desc2 || '';
                if (elLoc) elLoc.textContent = loc || '';
                if (elArea) elArea.textContent = area || '';
                if (elYear) elYear.textContent = year || '';
                if (elRole) elRole.textContent = role || '';
                
                if (img) {
                    document.querySelectorAll('.drawer-project-gallery-img').forEach(el => el.src = img);
                }
            }

            openDrawer(type);
        });
    });

    if (closeBtn) {
        closeBtn.addEventListener('click', closeDrawer);
    }

    function openDrawer(type = 'project') {
        if (isOpen) return;

        // Toggle sections based on type
        document.querySelectorAll('.drawer-section').forEach(section => section.classList.add('hidden'));
        const targetSection = document.getElementById(`drawer-${type}-content`);
        if (targetSection) targetSection.classList.remove('hidden');
        isOpen = true;

        // Dispatch open event for Three.js
        window.dispatchEvent(new CustomEvent('app:drawerOpened'));

        document.body.style.overflow = 'hidden';

        const tl = gsap.timeline();
        
        // 1. Shrink main content
        tl.to(contentWrappers, {
            scale: 0.95,
            opacity: 0.2,
            duration: 0.8,
            ease: 'expo.inOut'
        });

        // 2. Enable events & Show drawer
        drawer.style.pointerEvents = 'auto';
        
        const backdrop = document.getElementById('project-drawer-backdrop');
        const modalContent = document.getElementById('project-drawer-content');
        
        if (backdrop && modalContent) {
            tl.to(backdrop, { opacity: 1, duration: 0.4, ease: 'power2.out' }, '<');
            tl.to(modalContent, { opacity: 1, scale: 1, duration: 0.6, ease: 'expo.out' }, '<+=0.1');
        }

        // 3. Stagger text
        tl.fromTo(drawerTexts, 
            { y: 30, opacity: 0 },
            { y: 0, opacity: 1, duration: 0.6, stagger: 0.1, ease: 'power3.out' },
            '<+=0.3'
        );
    }

    function closeDrawer() {
        if (!isOpen) return;
        isOpen = false;

        // Dispatch close event for Three.js
        window.dispatchEvent(new CustomEvent('app:drawerClosed'));

        const tl = gsap.timeline({
            onComplete: () => {
                drawer.style.pointerEvents = 'none';
                document.body.style.overflow = '';
            }
        });

        // 1. Hide text
        tl.to(drawerTexts, {
            y: 30,
            opacity: 0,
            duration: 0.3,
            stagger: 0.05,
            ease: 'power2.in'
        });

        // 2. Hide drawer
        const backdrop = document.getElementById('project-drawer-backdrop');
        const modalContent = document.getElementById('project-drawer-content');
        
        if (backdrop && modalContent) {
            tl.to(modalContent, { opacity: 0, scale: 0.95, duration: 0.4, ease: 'expo.in' }, '<+=0.1');
            tl.to(backdrop, { opacity: 0, duration: 0.4, ease: 'power2.in' }, '<+=0.2');
        }

        // 3. Restore main content
        tl.to(contentWrappers, {
            scale: 1,
            opacity: 1,
            duration: 0.8,
            ease: 'expo.out'
        }, '<+=0.4');
    }
}

