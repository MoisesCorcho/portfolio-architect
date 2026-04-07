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
        this.camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 10000);
        this.renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        
        this.model = null;
        this.mixer = null; // Para posibles animaciones del GLB
        this.clock = new THREE.Clock();

        this.init();
    }

    init() {
        // Config Renderer
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        this.renderer.setClearColor(0x000000, 0); // Transparente
        this.container.appendChild(this.renderer.domElement);

        // Iluminación
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.8);
        this.scene.add(ambientLight);

        const sunLight = new THREE.DirectionalLight(0xffffff, 1.2);
        sunLight.position.set(50, 50, 50);
        this.scene.add(sunLight);

        // Cámara Inicial
        this.camera.position.set(80, 50, 150);
        this.camera.lookAt(0, 0, 0);

        this.loadModel();
        this.setupEvents();
        this.render();
    }

    loadModel() {
        const loader = new GLTFLoader();
        const dracoLoader = new DRACOLoader();
        dracoLoader.setDecoderPath('https://www.gstatic.com/draco/versioned/decoders/1.5.6/'); // CDN por comodidad
        loader.setDRACOLoader(dracoLoader);

        // Ajustá la ruta según donde guardes el .glb (ej: public/models/modern_home.glb)
        loader.load('/models/modern_home.glb', (gltf) => {
            this.model = gltf.scene;
            
            // --- CRÍTICO: AUTO-ESCALADO ---
            const box = new THREE.Box3().setFromObject(this.model);
            const size = new THREE.Vector3();
            box.getSize(size);
            const center = new THREE.Vector3();
            box.getCenter(center);

            // Queremos que mida aprox 100 unidades de largo
            const maxDim = Math.max(size.x, size.y, size.z);
            const scaleFactor = 100 / maxDim;
            this.model.scale.set(scaleFactor, scaleFactor, scaleFactor);

            // Centrar el modelo en (0,0,0)
            this.model.position.sub(center.multiplyScalar(scaleFactor));
            
            this.scene.add(this.model);
            
            // Una vez cargado, configuramos el scroll
            this.setupScrollAnimations();
        }, undefined, (error) => {
            console.error('Error cargando el modelo:', error);
        });
    }

    setupScrollAnimations() {
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: "body",
                start: "top top",
                end: "bottom bottom",
                scrub: 1, // Suavizado del movimiento
            }
        });

        // Definimos posiciones de cámara según IDs de secciones
        // Estos valores son ejemplos, vas a tener que ajustarlos según tu modelo
        tl.to(this.camera.position, {
            x: -120, y: 40, z: 80, // Hacia "About"
            onUpdate: () => this.camera.lookAt(0, 0, 0),
            scrollTrigger: { trigger: "#about", start: "top bottom", end: "top top", scrub: true }
        })
        .to(this.camera.position, {
            x: 0, y: 150, z: 50, // Hacia "Portfolio" (vista desde arriba)
            onUpdate: () => this.camera.lookAt(0, 0, 0),
            scrollTrigger: { trigger: "#portfolio", start: "top bottom", end: "top top", scrub: true }
        })
        .to(this.camera.position, {
            x: 100, y: 20, z: -100, // Hacia "Contact"
            onUpdate: () => this.camera.lookAt(0, 0, 0),
            scrollTrigger: { trigger: "#contact", start: "top bottom", end: "top top", scrub: true }
        });
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
