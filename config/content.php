<?php

/*
|--------------------------------------------------------------------------
| Page Content
|--------------------------------------------------------------------------
|
| Services, training areas, leadership messages and the rest of the long-form
| copy. Kept separate from config/company.php so the two can be moved into
| their own database tables independently later on.
|
*/

return [

    'services' => [
        [
            'slug'  => 'manpower-recruitment',
            'icon'  => 'search',
            'title' => 'Manpower Recruitment',
            'text'  => 'Supplying skilled, semi-skilled and unskilled manpower for a wide range of industries worldwide.',
            'detail' => 'We recruit across manufacturing, construction, caregiving, hospitality, agriculture and food processing. Every requirement begins with a written job order, so the number of workers, the skill level, the wage and the working conditions are agreed before sourcing starts.',
        ],
        [
            'slug'  => 'candidate-screening-selection',
            'icon'  => 'user-check',
            'title' => 'Candidate Screening & Selection',
            'text'  => 'A rigorous screening and selection process, so that only qualified and reliable candidates reach you.',
            'detail' => 'Applications are verified against the job order, followed by document checks, a skills assessment, a language level check and a personal interview. Employers may join interviews in person, by video call, or through our interpreters.',
        ],
        [
            'slug'  => 'training-skill-development',
            'icon'  => 'graduation',
            'title' => 'Training & Skill Development',
            'text'  => 'Language training, technical skills and cultural orientation to prepare candidates for success.',
            'detail' => 'Our in-house training centre runs Japanese language classes, job-specific technical sessions and cultural orientation. Candidates sit mock tests and interview practice before they are presented to an employer.',
        ],
        [
            'slug'  => 'visa-travel-assistance',
            'icon'  => 'plane',
            'title' => 'Visa & Travel Assistance',
            'text'  => 'Documentation, visa processing, ticketing and all travel arrangements for a smooth deployment.',
            'detail' => 'We prepare and submit the visa file, arrange the medical examination, book flights and brief every candidate on the journey, from the airport in Kathmandu through to arrival and reception in the destination country.',
        ],
        [
            'slug'  => 'documentation-compliance',
            'icon'  => 'shield-check',
            'title' => 'Documentation & Compliance',
            'text'  => 'All legal documentation and government compliance as per destination country regulations.',
            'detail' => 'Every placement is processed through the Department of Foreign Employment with full labour approval. We keep employers informed of changes to Nepali and destination-country regulations that affect their hiring.',
        ],
        [
            'slug'  => 'employer-relationship',
            'icon'  => 'handshake',
            'title' => 'Employer Relationship',
            'text'  => 'Long-term partnerships with employers built on trust, transparency and timely support.',
            'detail' => 'You work with one named coordinator throughout. We report on progress at each stage of the file, and we do not quote timelines we cannot meet.',
        ],
        [
            'slug'  => 'after-placement-support',
            'icon'  => 'headset',
            'title' => 'After Placement Support',
            'text'  => 'Continuous support for both candidates and employers after a successful deployment.',
            'detail' => 'We check in with workers after arrival and remain reachable for the employer. Where a language or cultural misunderstanding arises, our interpreters help both sides resolve it early.',
        ],
        [
            'slug'  => 'replacement-guarantee',
            'icon'  => 'refresh',
            'title' => 'Replacement Guarantee',
            'text'  => 'Replacement support in the event of unforeseen situations, to protect client satisfaction.',
            'detail' => 'If a placed candidate does not complete the agreed period for reasons within our control, we source a replacement under the terms set out in the service agreement.',
        ],
    ],

    'process' => [
        ['no' => '1', 'title' => 'Requirement Analysis',        'text' => 'We record the job order in writing: role, headcount, skills, wage and conditions.'],
        ['no' => '2', 'title' => 'Sourcing & Shortlisting',     'text' => 'Candidates are drawn from our database and district network, then matched to the brief.'],
        ['no' => '3', 'title' => 'Screening & Interview',       'text' => 'Documents, skills and language are verified, followed by interviews with the employer.'],
        ['no' => '4', 'title' => 'Documentation & Processing',  'text' => 'Medical, labour approval, visa file and government compliance are completed.'],
        ['no' => '5', 'title' => 'Deployment & Travel',         'text' => 'Ticketing, pre-departure briefing and departure are arranged and confirmed.'],
        ['no' => '6', 'title' => 'After Placement Support',     'text' => 'Follow-up with both worker and employer, with replacement support if required.'],
    ],

    'why_choose_us' => [
        ['icon' => 'shield-check', 'title' => 'Ethical & Transparent Recruitment', 'text' => 'We follow ethical recruitment practices with zero tolerance for charging any fees from candidates.'],
        ['icon' => 'star-users',   'title' => 'Japan Specialization',              'text' => 'Our strong network and deep understanding of the Japanese market ensure the right opportunities for the right candidates.'],
        ['icon' => 'graduation',   'title' => 'Quality Training & Preparation',    'text' => 'We provide Japanese language training, skill development and cultural orientation to make candidates job-ready.'],
        ['icon' => 'user-search',  'title' => 'Careful Screening & Selection',     'text' => 'Our rigorous selection process ensures only skilled, qualified and motivated candidates are recommended.'],
        ['icon' => 'handshake',    'title' => 'Strong Client Relationships',       'text' => 'We build long-term partnerships by delivering reliable, skilled manpower and excellent after-deployment support.'],
        ['icon' => 'clock',        'title' => 'Fast & Efficient Deployment',       'text' => 'Our streamlined process and experienced team ensure timely deployment without compromising quality.'],
    ],

    'training_areas' => [
        [
            'image' => 'images/training/japanese-language.webp',
            'icon'  => 'language',
            'title' => 'Japanese Language Training',
            'text'  => 'Comprehensive Japanese language training covering listening, speaking, reading and writing, so that candidates can communicate confidently in the workplace and in daily life in Japan.',
        ],
        [
            'image' => 'images/training/skill-development.webp',
            'icon'  => 'tools',
            'title' => 'Skill Development (Technical Training)',
            'text'  => 'Job-specific technical training and practical sessions that sharpen a candidate\'s skills and meet the requirements of employers in their respective industries.',
        ],
        [
            'image' => 'images/training/cultural-orientation.webp',
            'icon'  => 'users',
            'title' => 'Cultural Orientation',
            'text'  => 'We teach candidates about Japanese culture, traditions, work ethics, manners and lifestyle to ensure a smooth adjustment to their new environment.',
        ],
        [
            'image' => 'images/training/workplace-safety.webp',
            'icon'  => 'helmet',
            'title' => 'Workplace Safety Training',
            'text'  => 'Essential safety training so that candidates understand workplace safety rules and help maintain a safe and healthy working environment.',
        ],
    ],

    'training_matters' => [
        'Increases job success rate',
        'Reduces rejection and improves selection',
        'Prepares candidates for Japanese work culture',
        'Builds confidence and professionalism',
        'Ensures long-term career growth',
    ],

    'training_features' => [
        'Experienced and qualified trainers',
        'Modern training materials and facilities',
        'Mock tests and interview preparation',
        '100% pre-departure training',
        'Regular assessments and performance tracking',
    ],

    'swot' => [
        [
            'key' => 'strengths', 'title' => 'Strengths', 'letter' => 'S', 'tone' => 'orange',
            'lead'  => 'Internal advantages that support better performance.',
            'items' => [
                'Experienced and dedicated team',
                'Strong network and partnerships',
                'Quality-driven recruitment process',
                'High client and candidate satisfaction',
                'Ethical and transparent practices',
            ],
        ],
        [
            'key' => 'weaknesses', 'title' => 'Weaknesses', 'letter' => 'W', 'tone' => 'navy',
            'lead'  => 'Internal challenges that hinder efficiency or outcomes.',
            'items' => [
                'Limited brand awareness in new markets',
                'Dependency on foreign employment',
                'Resource constraints in peak demand',
                'Need for advanced digital systems',
                'Continuous need for skill upgrading',
            ],
        ],
        [
            'key' => 'opportunities', 'title' => 'Opportunities', 'letter' => 'O', 'tone' => 'navy',
            'lead'  => 'External chances to expand and improve market reach.',
            'items' => [
                'Growing demand for skilled manpower',
                'Expansion into new international markets',
                'Government support for foreign employment',
                'Technological advancement and automation',
                'Training and upskilling partnerships',
            ],
        ],
        [
            'key' => 'threats', 'title' => 'Threats', 'letter' => 'T', 'tone' => 'orange',
            'lead'  => 'External factors that may harm growth or stability.',
            'items' => [
                'Intense competition in recruitment sector',
                'Changing government policies & regulations',
                'Economic instability in global markets',
                'Candidate migration to other countries',
                'Unforeseen global events or crises',
            ],
        ],
    ],

    'partners' => [
        ['name' => 'Kaure Ocean Educational & Consultancy',   'logo' => 'images/partners/kaure-ocean.webp'],
        ['name' => 'Globe International Education Consult',   'logo' => 'images/partners/globe-international.webp'],
        ['name' => 'Anshin Education & Training Consultancy', 'logo' => 'images/partners/anshin.webp'],
        ['name' => 'Partner Institute',                       'logo' => 'images/partners/partner-j.webp'],
    ],

    'certificates' => [
        ['image' => 'images/certificates/license-01.webp',    'title' => 'Foreign Employment Licence',  'caption' => 'Department of Foreign Employment, Government of Nepal'],
        ['image' => 'images/certificates/license-02.webp',    'title' => 'Company Registration',        'caption' => 'Office of the Company Registrar, Government of Nepal'],
        ['image' => 'images/certificates/certificate-01.webp','title' => 'Certificate of Recognition',  'caption' => 'Issued to Sunlight Global Human Resources Pvt. Ltd.'],
    ],

    // The first three are reused as the training-page strip, so training-related
    // photographs are kept at the top of this list.
    'gallery' => [
        ['image' => 'images/gallery/gallery-01.webp', 'caption' => 'Japanese language class in session at our training centre'],
        ['image' => 'images/gallery/gallery-06.webp', 'caption' => 'Selection interviews in progress'],
        ['image' => 'images/gallery/gallery-04.webp', 'caption' => 'Candidate orientation at our Kathmandu office'],
        ['image' => 'images/gallery/gallery-03.webp', 'caption' => 'Interview day briefing for shortlisted candidates'],
        ['image' => 'images/gallery/gallery-02.webp', 'caption' => 'Welcoming our Japanese partners at Tribhuvan International Airport'],
        ['image' => 'images/team-group.webp',         'caption' => 'The Sunlight Global team at a company gathering'],
    ],

];
