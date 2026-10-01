<?php

/*
|--------------------------------------------------------------------------
| Company Profile
|--------------------------------------------------------------------------
|
| Every piece of copy that the client is likely to want changed lives here
| rather than being buried in a Blade template. When the admin panel is
| built these arrays are what the database tables should mirror.
|
*/

return [

    'name'       => 'Sunlight Global Human Resources Pvt. Ltd.',
    'short_name' => 'Sunlight Global',
    'tagline'    => 'Connecting Talent, Creating Futures',
    'promise'    => 'Your Success, Our Commitment.',
    'founded'    => 2020,

    'contact' => [
        'phones' => ['01-4977365'],
        'emails' => ['info@sunlightglobal.com.np', 'hr@sunlightglobal.com.np'],
        'website' => 'www.sunlightglobal.com.np',
        'address' => 'Samakhusi, Ranibari Road',
        'city'    => 'Kathmandu, Nepal',
        'hours'   => ['days' => 'Sunday – Friday', 'time' => '9:00 AM – 5:30 PM', 'zone' => 'Nepal Time'],
        // Digits only, international format - used by the floating WhatsApp button.
        'whatsapp' => '97714977365',
    ],

    'social' => [
        ['name' => 'Facebook', 'icon' => 'facebook', 'url' => '#'],
        ['name' => 'Instagram', 'icon' => 'instagram', 'url' => '#'],
        ['name' => 'LinkedIn', 'icon' => 'linkedin', 'url' => '#'],
        ['name' => 'TikTok', 'icon' => 'tiktok', 'url' => '#'],
    ],

    'licence' => [
        'authority'  => 'Government of Nepal',
        'ministry'   => 'Ministry of Labour, Employment and Social Security',
        'department' => 'Department of Foreign Employment',
        'number'     => '', // client to supply
    ],

    'stats' => [
        ['value' => 5000, 'suffix' => '+',  'label' => 'Candidates Employed'],
        ['value' => 100,  'suffix' => '+',  'label' => 'Trusted Clients Worldwide'],
        ['value' => 5,    'suffix' => '+',  'label' => 'Countries Served'],
        ['value' => 95,   'suffix' => '%+', 'label' => 'Client Satisfaction'],
    ],

    'training_stats' => [
        ['value' => 1000, 'suffix' => '+',  'label' => 'Candidates Trained Successfully'],
        ['value' => 90,   'suffix' => '%+', 'label' => 'Success Rate in Job Placement'],
        ['value' => 100,  'suffix' => '%',  'label' => 'Pre-Departure Training'],
        ['value' => 5,    'suffix' => '+',  'label' => 'Countries Placement'],
    ],

    'pillars' => [
        ['icon' => 'users',    'title' => 'Right People',      'text' => 'Connecting skilled individuals with the right opportunities.'],
        ['icon' => 'shield',   'title' => 'Trust & Ethics',    'text' => 'Upholding integrity and transparency in every step we take.'],
        ['icon' => 'bank',     'title' => 'Global Standards',  'text' => 'Delivering quality manpower that meets international standards.'],
        ['icon' => 'growth',   'title' => 'Better Futures',    'text' => 'Empowering people to build successful careers abroad.'],
    ],

    'approach' => [
        ['no' => '01', 'icon' => 'book',   'title' => 'Learn',   'text' => 'We study each employer’s requirement in detail — the role, the industry, the skill level — so that every search begins from a clear and realistic brief.'],
        ['no' => '02', 'icon' => 'board',  'title' => 'Train',   'text' => 'Shortlisted candidates go through Japanese language classes, job-specific technical practice and cultural orientation before they are put forward.'],
        ['no' => '03', 'icon' => 'globe',  'title' => 'Deploy',  'text' => 'Documentation, government compliance, visa processing and ticketing are handled in-house so departures happen on schedule.'],
        ['no' => '04', 'icon' => 'headset','title' => 'Support', 'text' => 'We stay in contact after arrival — following up with both employer and worker, and providing replacement support when circumstances require it.'],
    ],

    'values' => [
        ['title' => 'Integrity',        'text' => 'We maintain honesty and transparency in all operations.'],
        ['title' => 'Professionalism',  'text' => 'We ensure high-quality service at every stage.'],
        ['title' => 'Respect',          'text' => 'We value every candidate and client equally.'],
        ['title' => 'Commitment',       'text' => 'We are dedicated to long-term success.'],
        ['title' => 'Ethical Practice', 'text' => 'We follow fair and responsible recruitment.'],
    ],

    'core_values' => [
        ['icon' => 'users',  'title' => 'People First',   'text' => 'We value and empower every individual.'],
        ['icon' => 'shield', 'title' => 'Integrity',      'text' => 'We operate with honesty, transparency and respect.'],
        ['icon' => 'globe',  'title' => 'Excellence',     'text' => 'We are committed to delivering quality in every step.'],
        ['icon' => 'growth', 'title' => 'Opportunities',  'text' => 'We create opportunities that build better futures.'],
    ],

];
