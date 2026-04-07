import './bootstrap';
import { Experience3D } from './experience-3d.js';

window.addEventListener('DOMContentLoaded', () => {
    // Solo arrancamos si existe el contenedor
    if (document.getElementById('three-container')) {
        new Experience3D('three-container');
    }
});
