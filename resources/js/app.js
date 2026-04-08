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

