import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { DRACOLoader } from 'three/examples/jsm/loaders/DRACOLoader.js';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export class Experience3D {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 5000);
        this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        
        this.init();
    }

    init() {
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        this.renderer.setClearColor(0x000000, 0);
        this.container.appendChild(this.renderer.domElement);

        // Iluminación básica
        const ambientLight = new THREE.AmbientLight(0xffffff, 1.2);
        this.scene.add(ambientLight);

        const sunLight = new THREE.DirectionalLight(0xffffff, 1);
        sunLight.position.set(5, 10, 5);
        this.scene.add(sunLight);

        // Posición Inicial de cámara (Afuera)
        this.camera.position.set(100, 50, 150);
        this.camera.lookAt(0, 0, 0);

        this.loadModel();
        this.setupEvents();
        this.render();
    }

    loadModel() {
        const loader = new GLTFLoader();
        const dracoLoader = new DRACOLoader();
        dracoLoader.setDecoderPath('https://www.gstatic.com/draco/versioned/decoders/1.5.6/');
        loader.setDRACOLoader(dracoLoader);

        loader.load('/models/modern_home.glb', (gltf) => {
            const model = gltf.scene;
            this.scene.add(model);
            
            // Auto-escalado a 100 unidades (IMPORTANTE)
            const box = new THREE.Box3().setFromObject(model);
            const size = box.getSize(new THREE.Vector3());
            const center = box.getCenter(new THREE.Vector3());
            const scale = 100 / Math.max(size.x, size.y, size.z);
            
            model.scale.set(scale, scale, scale);
            model.position.sub(center.multiplyScalar(scale));
            
            this.setupScrollAnimations();
        });
    }

    setupScrollAnimations() {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: "body",
                start: "top top",
                end: "bottom bottom",
                scrub: 1,
            }
        });

        // 1. A unos valores "por defecto" para probar que el scroll anda
        tl.to(this.camera.position, { x: -80, y: 30, z: 100, onUpdate: () => this.camera.lookAt(0, 0, 0) }, "about")
          .to(this.camera.position, { x: 50, y: 150, z: 20, onUpdate: () => this.camera.lookAt(0, 0, 0) }, "portfolio")
          .to(this.camera.position, { x: 120, y: 20, z: -80, onUpdate: () => this.camera.lookAt(0, 0, 0) }, "contact");
    }

    setupEvents() {
        window.addEventListener('resize', () => {
            this.camera.aspect = window.innerWidth / window.innerHeight;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(window.innerWidth, window.innerHeight);
        });
    }

    render() {
        requestAnimationFrame(() => this.render());
        this.renderer.render(this.scene, this.camera);
    }
}
