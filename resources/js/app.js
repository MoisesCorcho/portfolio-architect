import './bootstrap';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { Experience3D } from './experience-3d.js';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
    // 3D Integration
    const experience = document.getElementById('three-container') ? new Experience3D('three-container') : null;

    // UI Animations
    initHeroAnimations();
    initScrollAnimations();
    initDrawerAnimations();
});

function initHeroAnimations() {
    const tl = gsap.timeline();
    tl.to('.gs-reveal', {
        y: 0,
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

