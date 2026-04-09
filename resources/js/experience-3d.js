import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { DRACOLoader } from 'three/examples/jsm/loaders/DRACOLoader.js';
import { FlyControls } from 'three/examples/jsm/controls/FlyControls.js';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export class Experience3D {
    constructor(containerId) {
        this.container = document.getElementById(containerId);
        if (!this.container) return;

        this.scene = new THREE.Scene();
        this.camera = new THREE.PerspectiveCamera(20, window.innerWidth / window.innerHeight, 0.1, 5000);
        
        // Camera Container for ScrollTrigger
        this.cameraContainer = new THREE.Group();
        this.cameraContainer.add(this.camera);
        this.scene.add(this.cameraContainer);
        
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

        // Posición Inicial de cámara en el contenedor
        this.cameraContainer.position.set(100, 50, 150);
        this.camera.position.set(0, 0, 0); // La cámara empieza en el centro de su contenedor
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
            
            // Auto-activar Dev Mode si estamos en la ruta /3d-dev
            if (window.location.pathname.includes('3d-dev') || this.container.dataset.devMode) {
                this.activateDevMode();
            } else {
                this.setupScrollAnimations();
            }
        });
    }

    activateDevMode() {
        if(this.isEditMode) return;
        this.isEditMode = true;
        
        // 1. Pausamos todas las animaciones de ScrollTrigger
        ScrollTrigger.getAll().forEach(t => t.disable());
        
        // 2. Sacamos la cámara de su contenedor para volar en el mundo real (Coordenadas Absolutas)
        this.scene.attach(this.camera);

        // 3. Activamos FlyControls (Libertad total, sin pivot asfixiante)
        this.controls = new FlyControls(this.camera, this.renderer.domElement);
        this.controls.movementSpeed = 30.0;
        this.controls.rollSpeed = 0.5;
        this.controls.dragToLook = true; // Tienes que hacer click y arrastrar para mirar
        
        // Reloj para actualizar FlyControls adecuadamente
        const clock = new THREE.Clock();

        // 3.5. Controles de Lente (Zoom/FOV)
        window.addEventListener('keydown', (e) => {
            if(!this.isEditMode) return;
            if (e.code === 'KeyZ') { // Zoom In (Reducir FOV)
                this.camera.fov = Math.max(10, this.camera.fov - 2);
                this.camera.updateProjectionMatrix();
            }
            if (e.code === 'KeyX') { // Zoom Out (Aumentar FOV / Gran Angular)
                this.camera.fov = Math.min(140, this.camera.fov + 2);
                this.camera.updateProjectionMatrix();
            }
        });

        // 4. Creamos una UI temporal en pantalla
        const devUI = document.createElement('div');
        devUI.style.cssText = 'position:fixed;top:20px;left:20px;background:rgba(0,0,0,0.85);color:#0f0;padding:15px;border-radius:8px;font-family:monospace;font-size:14px;z-index:9999;box-shadow: 0 4px 10px rgba(0,0,0,0.5);pointer-events:none;backdrop-filter:blur(10px);';
        document.body.appendChild(devUI);

        // 5. Override del render loop para actualizar controles y UI
        const updateDevUI = () => {
            if(this.isEditMode) {
                requestAnimationFrame(updateDevUI);
                const delta = clock.getDelta();
                this.controls.update(delta);

                // Reconstruimos el "Target" dibujando un punto imaginario 20 unidades frente a la cámara
                // Esto permite que el GSAP sepa a dónde mirar sin que te asfixie el Orbit
                const virtualTarget = new THREE.Vector3();
                this.camera.getWorldDirection(virtualTarget);
                virtualTarget.multiplyScalar(20);
                virtualTarget.add(this.camera.position);

                devUI.innerHTML = `
                    <b style="color:white;">🛠️ MODO DRON REAL ACTIVADO</b><br>
                    <small style="color:#aaa;">Libertad total sin punto de asfixia (pivot)</small><br><br>
                    🕹️ <b>Vuelo 3D:</b> W, A, S, D | R (Sube) | F (Baja)<br>
                    👀 <b>Girar Cabeza:</b> <u>Click Izquierdo Sostenido</u> + Arrastrar<br>
                    🔍 <b>Lente (Zoom):</b> Tecla Z (Acercar) | Tecla X (Alejar)<br>
                    <hr style="border-color:#333;"><br>
                    <span style="color:#0ff;"><b>Copia esto en "cameraContainer.position":</b></span><br>
                    x: ${this.camera.position.x.toFixed(1)}, y: ${this.camera.position.y.toFixed(1)}, z: ${this.camera.position.z.toFixed(1)}<br><br>
                    <span style="color:#f0f;"><b>Copia esto en "cameraTarget":</b></span><br>
                    x: ${virtualTarget.x.toFixed(1)}, y: ${virtualTarget.y.toFixed(1)}, z: ${virtualTarget.z.toFixed(1)}<br><br>
                    <span style="color:#ff0;"><b>Campo de Visión (FOV):</b> ${this.camera.fov.toFixed(1)}</span>
                `;
            }
        };
        updateDevUI();
        console.log("🛠️ Dev Mode Auto-Activado por ruta /3d-dev");
    }

    setupScrollAnimations() {
        // En lugar de mirar siempre al 0,0,0, creamos un vector objetivo que también vamos a animar.
        this.cameraTarget = new THREE.Vector3(0, 0, 0);
        const updateCamera = () => {
            this.camera.lookAt(this.cameraTarget);
            this.camera.updateProjectionMatrix();
        };

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: "body",
                start: "top top",
                end: "bottom bottom",
                scrub: 1,
            }
        });

        // 1. HERO a ABOUT (Exterior, acercándonos)
        tl.to(this.cameraContainer.position, {
            x: -80, y: 30, z: 100, 
            duration: 1,
            onUpdate: updateCamera 
        })
        .to(this.cameraTarget, { x: 0, y: 0, z: 0, duration: 1 }, "<")
        .to(this.camera, { fov: 20, duration: 1, onUpdate: updateCamera }, "<")

        // 2. ABOUT a RESUME (staircase and exterior door.)
        .to(this.cameraContainer.position, { 
            x: -23.5, y: 5.5, z: 39.4, 
            duration: 1,
            onUpdate: updateCamera 
        })
        .to(this.cameraTarget, { x: -23.4, y: 5.1, z: 19.4, duration: 1 }, "<") // Mirando a la escalera
        .to(this.camera, { fov: 20, duration: 1, onUpdate: updateCamera }, "<")

        // 3. RESUME a PORTFOLIO (1/2: Frente a la puerta)
        .to(this.cameraContainer.position, { 
            x: -1.9, y: -7.4, z: 26.8, 
            duration: 0.5,
            onUpdate: updateCamera 
        })
        .to(this.cameraTarget, { x: -4.5, y: -7.7, z: 20.2, duration: 0.5 }, "<") // Mirando a la puerta
        .to(this.camera, { fov: 20, duration: 0.5, onUpdate: updateCamera }, "<")

        // 4. RESUME a PORTFOLIO (2/2: Adentro de la casa)
        .to(this.cameraContainer.position, { 
            x: -20.2, y: -8.2, z: -16.3, 
            duration: 0.5,
            onUpdate: updateCamera 
        })
        .to(this.cameraTarget, { x: -0.3, y: -6.5, z: -16.1, duration: 0.5 }, "<") // Mirando al ventanal/escalera
        .to(this.camera, { fov: 48, duration: 0.5, onUpdate: updateCamera }, "<") // Abrimos el lente (Gran angular)

        // 5. PORTFOLIO a CONTACT (Vista desde la derecha, UI a la izquierda)
        .to(this.cameraContainer.position, { 
            x: 80, y: 30, z: 100, 
            duration: 1,
            onUpdate: updateCamera 
        })
        .to(this.cameraTarget, { x: 0, y: 0, z: 0, duration: 1 }, "<")
        .to(this.camera, { fov: 20, duration: 1, onUpdate: updateCamera }, "<"); // Mismo FOV que en About

        // Fin de las interacciones
    }

    setupEvents() {
        window.addEventListener('resize', () => {
            this.camera.aspect = window.innerWidth / window.innerHeight;
            this.camera.updateProjectionMatrix();
            this.renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Portfolio Bento Grid micro-interactions (Z-Offset)
        const bentoItems = document.querySelectorAll('.bento-item');
        bentoItems.forEach(item => {
            item.addEventListener('mouseenter', () => {
                gsap.to(this.camera.position, {
                    z: -5,
                    duration: 0.8,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
            item.addEventListener('mouseleave', () => {
                gsap.to(this.camera.position, {
                    z: 0,
                    duration: 0.8,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
        });

        // Contact Form micro-interactions (X-Offset)
        const inputs = document.querySelectorAll('.contact-form input, .contact-form textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                gsap.to(this.camera.position, {
                    x: 2,
                    duration: 1,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
            input.addEventListener('blur', () => {
                gsap.to(this.camera.position, {
                    x: 0,
                    duration: 1,
                    ease: "power2.out",
                    overwrite: "auto"
                });
            });
        });


    }

    render() {
        requestAnimationFrame(() => this.render());
        this.renderer.render(this.scene, this.camera);
    }
}
