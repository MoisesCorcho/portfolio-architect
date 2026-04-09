<?php

return [
    'navbar' => [
        'about' => 'Estudio',
        'resume' => 'Trayectoria',
        'portfolio' => 'Proyectos',
        'contact' => 'Contacto',
    ],
    'hero' => [
        'title_1' => 'PORTAFOLIO',
        'title_2' => 'ARQUITECTURA',
        'subtitle' => 'Arquitectura Residencial',
        'metadata' => 'John Doe / Proyectos Seleccionados / 2021-23',
    ],
    'about' => [
        'title' => 'DISEÑANDO HOGARES',
        'description' => 'Diseño espacios con un profundo respeto por la forma en que las personas habitan y experimentan sus hogares. Mi enfoque integra bienestar, funcionalidad y estética, buscando siempre soluciones sostenibles que conecten a las personas con su entorno cotidiano.',
        'button' => 'Leer Historia',
        'drawer_title' => 'Mi Enfoque',
        'drawer_subtitle' => 'El Estudio',
        'drawer_bio_1' => 'Antes de dedicarme a la arquitectura residencial, desarrollé un interés profundo por la relación entre las personas y los espacios que habitan. Esta perspectiva me permite diseñar viviendas que no solo cumplen una función, sino que también mejoran la calidad de vida de quienes las habitan.',
        'drawer_bio_2' => 'Hoy, aplico esa visión en cada proyecto, creando hogares pensados para el confort, la eficiencia y la armonía con el entorno. Desde casas familiares hasta residencias contemporáneas, mi objetivo es diseñar espacios duraderos, funcionales y emocionalmente significativos.',
        'drawer_image' => 'images/building/placeholder/ai-person.jpg',
    ],
    'resume' => [
        'title' => 'TRAYECTORIA',
        'subtitle' => 'PROFESIONAL',
        'experience_title' => 'Experiencia',
        'education_title' => 'Educación',
        'skills_title' => 'Habilidades Clave',
        'experience' => [
            [
                'title' => 'Asistente Administrativa y de Dibujo',
                'company' => 'Boland Woodworking',
                'years' => '2021 - 2022',
                'description' => 'Documentación de proyectos, dibujo de construcción de muebles a medida, levantamientos métricos.'
            ],
            [
                'title' => 'Asistente de Investigación',
                'company' => 'Synesthetic Research & Design Lab, Universidad Jefferson',
                'years' => '2021 - Presente',
                'description' => 'Investigación literaria; preparación de dibujos para presentaciones.'
            ],
            [
                'title' => 'Educadora, Grados K-8',
                'company' => 'Múltiples Escuelas Waldorf',
                'years' => '2009 - 2019',
                'description' => 'Profesora de artes del lenguaje, matemáticas, ciencias, historia, educación al aire libre y arte.'
            ],
            [
                'title' => 'Asistente de Programas',
                'company' => 'EarthPledge NYC & Médicos Sin Fronteras',
                'years' => '2002 - 2006',
                'description' => 'Coordinación de programas de educación pública; investigación; promoción y divulgación.'
            ],
        ],
        'education' => [
            [
                'degree' => 'Máster en Arquitectura de Interiores',
                'school' => 'Universidad Thomas Jefferson',
                'year' => '2023',
            ],
            [
                'degree' => 'Certificado de Enseñanza Waldorf',
                'school' => 'Universidad Antioch',
                'year' => '2013',
            ],
            [
                'degree' => 'Licenciatura en Estudios Ambientales',
                'school' => 'Universidad de la Ciudad de Nueva York',
                'year' => '2009',
            ],
        ],
        'skills' => [
            'Autodesk Revit', 'AutoCad', 'Sketchup', 'Rhino', 
            'Planificación Espacial', 'Investigación de Diseño', 'Renderizado 3D', 
            'Bocetaje', 'Visualización de Datos', 'Adobe Creative Suite', 
            'Visualización con IA', 'Desarrollo de Presentaciones'
        ]
    ],
    'portfolio' => [
        'title_1' => 'PROYECTOS',
        'title_2' => 'DESTACADOS',
        'subtitle' => 'Un portafolio curado con nuestros esfuerzos arquitectónicos más recientes y ambiciosos.',
        
        // El array de proyectos
        'projects' => [
            [
                'id' => 1,
                'title' => 'Minimalist Sanctuary',
                'subtitle' => 'Residencial • Tokio',
                'grid_class' => 'md:col-span-2 md:row-span-2',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '01',
                // Drawer Data
                'desc_1' => 'El espacio arquitectónico no es simplemente un vacío delimitado, sino un volumen activo y lleno de significado. Este proyecto explora la intersección entre la materialidad cruda y la luz natural, esculpiendo un refugio que desafía la percepción tradicional del habitar.',
                'desc_2' => 'Mediante el uso estratégico de hormigón visto y grandes paños de vidrio, diluimos los límites entre el interior y el exterior. Cada línea responde a un propósito; cada sombra es un componente calculado del diseño, ofreciendo una experiencia sensorial completa y minimalista.',
                'location' => 'Tokio, Japón',
                'area' => '450 m²',
                'year' => '2026',
                'role' => 'Arquitecto Principal',
            ],
            [
                'id' => 2,
                'title' => 'Urban Glass',
                'subtitle' => 'Comercial • NY',
                'grid_class' => 'md:col-span-1 md:row-span-2',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '02',
                'desc_1' => 'Una torre comercial integrada verticalmente que desafía la naturaleza estática de los rascacielos urbanos. Urban Glass es un organismo vivo diseñado para reflejar la energía dinámica de la ciudad de Nueva York mientras minimiza su huella de carbono.',
                'desc_2' => 'Su fachada paramétrica de vidrio ajusta su opacidad a lo largo del día, optimizando la iluminación y el control climático. En el interior, los espacios de trabajo de planta abierta se entrelazan con jardines biológicos suspendidos, devolviendo un pedazo de naturaleza al cielo corporativo.',
                'location' => 'Nueva York, EE.UU.',
                'area' => '12,500 m²',
                'year' => '2024',
                'role' => 'Firma Principal',
            ],
            [
                'id' => 3,
                'title' => 'Nordic Pavilion',
                'subtitle' => 'Cultural • Oslo',
                'grid_class' => 'lg:col-span-1 lg:row-span-1',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '03',
                'desc_1' => 'Encargado para la exposición internacional de artes, el Pabellón Nórdico se erige como un tributo al funcionalismo escandinavo y la artesanía en madera. Emerge del paisaje sin problemas, como si hubiera crecido de forma natural.',
                'desc_2' => 'Construido completamente con madera contralaminada (CLT) de origen local y con un innovador techo verde, el pabellón proporciona una vasta sala de exposiciones sin columnas bañada por una luz nórdica difusa y constante.',
                'location' => 'Oslo, Noruega',
                'area' => '850 m²',
                'year' => '2023',
                'role' => 'Consultor de Diseño',
            ],
            [
                'id' => 4,
                'title' => 'Concrete Loft',
                'subtitle' => 'Residencial • Berlín',
                'grid_class' => 'lg:col-span-1 lg:row-span-1',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '04',
                'desc_1' => 'Un proyecto de reutilización adaptativa que transforma un almacén brutalista de posguerra en una secuencia de lofts residenciales de alta gama. El diseño preserva el alma industrial de la estructura al tiempo que introduce calidez doméstica.',
                'desc_2' => 'Acero, vidrio y latón cepillado se insertan con precisión dentro del caparazón de hormigón en bruto. La intervención es intencionadamente mínima, permitiendo que la historia de las paredes dicte el tono emocional de los espacios habitables.',
                'location' => 'Berlín, Alemania',
                'area' => '320 m²',
                'year' => '2025',
                'role' => 'Arquitecto Principal',
            ],
        ],
    ],
    'contact' => [
        'title' => 'CONSTRUYAMOS',
        'subtitle' => 'EL FUTURO',
        'description' => '¿Listo para transformar tu visión en una realidad arquitectónica? Asumimos un número selecto de proyectos por año para garantizar el más alto nivel de detalle y dedicación.',
        'button' => 'Contactarnos',
    ],
    'drawer' => [
        'project_info' => 'Info del Proyecto',
        'gallery' => 'Galería del Proyecto',
        'location' => 'Ubicación',
        'area' => 'Área',
        'year' => 'Año',
        'role' => 'Rol',
    ]
];
