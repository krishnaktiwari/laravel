<?php

return [
    'default' => [
        'main_domain' => request()->getScheme() . '://' . implode('.', array_slice(explode('.', str_replace('www.', '', request()->getHost())), -2)),

        'name' => 'SARVA ONE',
        'tagline' => 'Your one stop Solution for all your needs',
        'description' => 'Sarva one is a comprehensive platform that offers a wide range of services to meet all your needs. From home services to business solutions, we have you covered.',
        'assets' => 'sarvaone',
        'twitter_handle' => '@sarvaone',
        'email' => 'info@sarva.one',
        'phone' => '+91 74708 22468',
        'google_analytics_id' => 'G-LG9LBLLPLY',
        'social_links' => [
            'facebook' => 'https://www.facebook.com/sarvaoneglobal',
            'twitter' => 'https://twitter.com/sarvaoneglobal',
            'linkedin' => 'https://www.linkedin.com/company/sarvaoneglobal',
            'instagram' => 'https://www.instagram.com/sarvaoneglobal',
            'youtube' => 'https://www.youtube.com/@sarvaoneglobal',
        ],
    ],
    'domains' => [
        'vasudha.properties' =>
            [
                'name' => 'Vasudha Properties',
                'tagline' => 'Vasudha Properties - Your Trusted Real Estate Partner',
                'description' => 'Vasudha Properties is a trusted name in the real estate industry, offering a wide range of properties for sale and rent. With a focus on customer satisfaction and personalized service, we help you find the perfect property that meets your needs and budget.',
            ],
        'jobnidhi.com' =>
            [
                'name' => 'Job Nidhi',
                'tagline' => 'Job Nidhi - Your Gateway to Career Opportunities',
                'description' => 'Job Nidhi is a leading job portal that connects job seekers with top employers across various industries. With a user-friendly platform and a vast database of job listings, we help you find the right career opportunities that match your skills and aspirations.',
            ],
        'vinayakjobs.com' =>
            [
                'name' => 'Vinayak Jobs',
                'tagline' => 'Vinayak Jobs - Empowering Your Career Journey',
                'description' => 'Vinayak Jobs is a premier job portal dedicated to empowering job seekers in their career journey. With a wide range of job listings and personalized services, we connect talented individuals with leading employers to help them achieve their professional goals.',
            ],
        'sakti.biz' =>
            [
                'name' => 'Sakti Business Solutions',
                'tagline' => 'Sakti Business Solutions - Your Partner in Growth',
                'description' => 'Sakti Business Solutions is a trusted partner for businesses seeking innovative solutions to drive growth and success. With a focus on delivering tailored services, we help businesses navigate challenges and seize opportunities in the ever-evolving market landscape.',
            ],
    ]
];