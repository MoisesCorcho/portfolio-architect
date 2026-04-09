<?php

return [
    'navbar' => [
        'about' => 'About',
        'portfolio' => 'Portfolio',
        'contact' => 'Contact',
    ],
    'hero' => [
        'title_1' => 'PORTFOLIO',
        'title_2' => 'ARCHITECTURE',
        'subtitle' => 'Residential Architecture',
        'metadata' => 'John Doe / Selected Projects / 2021-23',
    ],
    'about' => [
        'title' => 'CRAFTING SPACES',
        'description' => 'Our designs are born from the intersection of light, material, and human experience. We don\'t just build structures; we create environments that breathe and evolve.',
        'button' => 'Read Story',
        'drawer_title' => 'Our Philosophy',
        'drawer_subtitle' => 'The Studio',
        'drawer_bio_1' => 'We firmly believe in the transformative power of architecture. Every line we draw and every material we choose has the purpose of connecting people with their surroundings, generating introspective, sustainable, and highly livable spaces.',
        'drawer_bio_2' => 'With over 15 years of international experience, we have designed projects that transcend passing trends, seeking an aesthetic purity that resists the dust of time. From large urban centers to quiet, remote retreats, our commitment is to the material.',
        'drawer_image' => 'images/building/placeholder/building1.jpg',
    ],
    'resume' => [
        'title' => 'PROFESSIONAL',
        'subtitle' => 'JOURNEY',
        'experience_title' => 'Experience',
        'education_title' => 'Education',
        'skills_title' => 'Core Skills',
        'experience' => [
            [
                'title' => 'Drafting & Admin. Assistant',
                'company' => 'Boland Woodworking',
                'years' => '2021 - 2022',
                'description' => 'Project documentation, custom furniture and casework construction drawing preparation, measured survey.'
            ],
            [
                'title' => 'Research Assistant',
                'company' => 'Synesthetic Research & Design Lab, Jefferson University',
                'years' => '2021 - Present',
                'description' => 'Literary research; presentation drawing preparation.'
            ],
            [
                'title' => 'Educator, Grades K-8',
                'company' => 'Multiple Waldorf Schools',
                'years' => '2009 - 2019',
                'description' => 'Teacher for language arts, math, science, history, outdoor education, and art.'
            ],
            [
                'title' => 'Program Assistant',
                'company' => 'EarthPledge NYC & Doctors Without Borders',
                'years' => '2002 - 2006',
                'description' => 'Public education program coordination; research; advocacy and outreach.'
            ],
        ],
        'education' => [
            [
                'degree' => 'MS Interior Architecture',
                'school' => 'Thomas Jefferson University',
                'year' => '2023',
            ],
            [
                'degree' => 'Waldorf Teaching Certificate',
                'school' => 'Antioch University',
                'year' => '2013',
            ],
            [
                'degree' => 'BA Environmental Studies',
                'school' => 'City University of New York',
                'year' => '2009',
            ],
        ],
        'skills' => [
            'Autodesk Revit', 'AutoCad', 'Sketchup', 'Rhino', 
            'Spatial Planning', 'Design Research', '3D Rendering', 
            'Sketching', 'Data Visualization', 'Adobe Creative Suite', 
            'AI Assisted Visualization', 'Presentation Development'
        ]
    ],
    'portfolio' => [
        'title_1' => 'SELECTED',
        'title_2' => 'PROJECTS',
        'subtitle' => 'Curated portfolio of our most recent and ambitious architectural endeavors.',
        
        // El array de proyectos
        'projects' => [
            [
                'id' => 1,
                'title' => 'Minimalist Sanctuary',
                'subtitle' => 'Residential • Tokyo',
                'grid_class' => 'md:col-span-2 md:row-span-2',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '01',
                // Drawer Data
                'desc_1' => 'The architectural space is not simply a delimited void, but an active volume full of meaning. This project explores the intersection between raw materiality and natural light, sculpting a refuge that challenges the traditional perception of dwelling.',
                'desc_2' => 'Through the strategic use of exposed concrete and large glass panels, we blur the boundaries between interior and exterior. Every line responds to a purpose; every shadow is a calculated design component, offering a complete and minimalist sensory experience.',
                'location' => 'Tokyo, Japan',
                'area' => '450 m²',
                'year' => '2026',
                'role' => 'Lead Architect',
            ],
            [
                'id' => 2,
                'title' => 'Urban Glass',
                'subtitle' => 'Commercial • NY',
                'grid_class' => 'md:col-span-1 md:row-span-2',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '02',
                'desc_1' => 'A vertically integrated commercial tower that challenges the static nature of urban skyscrapers. Urban Glass is a living organism designed to reflect the dynamic energy of New York City while minimizing its carbon footprint.',
                'desc_2' => 'Its parametric glass facade adjusts its opacity throughout the day, optimizing lighting and climate control. Inside, open-plan workspaces intertwine with suspended biological gardens, returning a piece of nature to the corporate sky.',
                'location' => 'New York, USA',
                'area' => '12,500 m²',
                'year' => '2024',
                'role' => 'Principal Firm',
            ],
            [
                'id' => 3,
                'title' => 'Nordic Pavilion',
                'subtitle' => 'Cultural • Oslo',
                'grid_class' => 'lg:col-span-1 lg:row-span-1',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '03',
                'desc_1' => 'Commissioned for the international arts expo, the Nordic Pavilion stands as a tribute to Scandinavian functionalism and wooden craftsmanship. It rises from the landscape seamlessly as if it was naturally grown.',
                'desc_2' => 'Built entirely with locally sourced, cross-laminated timber (CLT) and featuring an innovative green roof, the pavilion provides a vast, column-free exhibition hall bathed in diffuse, constant northern light.',
                'location' => 'Oslo, Norway',
                'area' => '850 m²',
                'year' => '2023',
                'role' => 'Design Consultant',
            ],
            [
                'id' => 4,
                'title' => 'Concrete Loft',
                'subtitle' => 'Residential • Berlin',
                'grid_class' => 'lg:col-span-1 lg:row-span-1',
                'image' => 'images/building/placeholder/building1.jpg',
                'number' => '04',
                'desc_1' => 'An adaptive reuse project transforming a brutalist post-war warehouse into a sequence of high-end residential lofts. The design preserves the industrial soul of the structure while introducing domestic warmth.',
                'desc_2' => 'Steel, glass, and brushed brass are inserted precisely within the rough concrete shell. The intervention is intentionally minimal, allowing the history of the walls to dictact the emotional tone of the living spaces.',
                'location' => 'Berlin, Germany',
                'area' => '320 m²',
                'year' => '2025',
                'role' => 'Lead Architect',
            ],
        ],
    ],
    'contact' => [
        'title' => 'LET\'S BUILD',
        'subtitle' => 'THE FUTURE',
        'description' => 'Ready to transform your vision into an architectural reality? We take on a select number of projects per year to ensure the highest level of detail and dedication.',
        'button' => 'Get in Touch',
    ],
    'drawer' => [
        'project_info' => 'Project Info',
        'gallery' => 'Project Gallery',
        'location' => 'Location',
        'area' => 'Area',
        'year' => 'Year',
        'role' => 'Role',
    ]
];
