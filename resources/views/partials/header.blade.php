@php
    // Single source of truth for both the desktop bar and the mobile drawer.
    $menu = [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'About Us', 'route' => 'about', 'children' => [
            ['label' => 'Company Profile',            'route' => 'about'],
            ['label' => 'Message from the MD',        'route' => 'leadership.show', 'param' => 'managing-director'],
            ['label' => 'Board of Directors',         'route' => 'leadership'],
            ['label' => 'Licences & Certificates',    'route' => 'certificates'],
        ]],
        ['label' => 'Services', 'route' => 'services', 'children' => [
            ['label' => 'All Services',                  'route' => 'services'],
            ['label' => 'Manpower Recruitment',          'route' => 'services', 'hash' => 'manpower-recruitment'],
            ['label' => 'Candidate Screening',           'route' => 'services', 'hash' => 'candidate-screening-selection'],
            ['label' => 'Training & Skill Development',  'route' => 'services', 'hash' => 'training-skill-development'],
            ['label' => 'Visa & Travel Assistance',      'route' => 'services', 'hash' => 'visa-travel-assistance'],
            ['label' => 'Documentation & Compliance',    'route' => 'services', 'hash' => 'documentation-compliance'],
            ['label' => 'After Placement Support',       'route' => 'services', 'hash' => 'after-placement-support'],
        ]],
        ['label' => 'Training', 'route' => 'training'],
        ['label' => 'Why Choose Us', 'route' => 'why-choose-us'],
        ['label' => 'Media', 'route' => 'gallery', 'children' => [
            ['label' => 'Photo Gallery', 'route' => 'gallery'],
            ['label' => 'Our Partners',  'route' => 'partners'],
        ]],
        ['label' => 'Contact', 'route' => 'contact'],
    ];

    $link = function (array $item) {
        $url = isset($item['param'])
            ? route($item['route'], $item['param'])
            : route($item['route']);

        return $url.(isset($item['hash']) ? '#'.$item['hash'] : '');
    };

    $isActive = fn (array $item) => request()->routeIs($item['route'])
        || (($item['route'] === 'leadership') && request()->routeIs('leadership.show'));
@endphp

<div class="topbar">
    <div class="shell">
        <ul class="topbar__list">
            <li>
                <x-icon name="phone"/>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.contact.phones.0')) }}">{{ config('company.contact.phones.0') }}</a>
            </li>
            <li>
                <x-icon name="mail"/>
                <a href="mailto:{{ config('company.contact.emails.0') }}">{{ config('company.contact.emails.0') }}</a>
            </li>
            <li>
                <x-icon name="clock"/>
                <span>{{ config('company.contact.hours.days') }}, {{ config('company.contact.hours.time') }}</span>
            </li>
        </ul>

        <div class="topbar__social">
            <span class="sr-only">Follow us</span>
            @foreach (config('company.social') as $social)
                <a href="{{ $social['url'] }}" target="_blank" rel="noopener" aria-label="{{ $social['name'] }}">
                    <x-icon :name="$social['icon']"/>
                </a>
            @endforeach
        </div>
    </div>
</div>

<header class="header">
    <div class="shell">
        <a class="brand" href="{{ route('home') }}" aria-label="{{ config('company.name') }} home">
            <img src="{{ asset('images/logo.png') }}" alt="{{ config('company.name') }} logo" width="54" height="54">
            <span class="brand__text">
                <span class="brand__name">Sunlight <span>Global</span></span>
                <span class="brand__sub">Human Resources Pvt. Ltd.</span>
            </span>
        </a>

        <nav class="nav" aria-label="Primary">
            @foreach ($menu as $item)
                <div class="nav__item">
                    <a class="nav__link {{ $isActive($item) ? 'is-active' : '' }}" href="{{ $link($item) }}">
                        {{ $item['label'] }}
                        @isset($item['children'])
                            <x-icon name="chevron-down"/>
                        @endisset
                    </a>

                    @isset($item['children'])
                        <div class="nav__panel">
                            @foreach ($item['children'] as $child)
                                <a href="{{ $link($child) }}">{{ $child['label'] }}</a>
                            @endforeach
                        </div>
                    @endisset
                </div>
            @endforeach
        </nav>

        <div class="header__cta">
            <a class="btn btn--primary btn--sm" href="{{ route('contact') }}">
                Apply Now <x-icon name="arrow-right"/>
            </a>
            <button class="nav-toggle" type="button" data-drawer-open aria-expanded="false" aria-label="Open menu">
                <x-icon name="menu"/>
            </button>
        </div>
    </div>
</header>

{{-- Mobile navigation --}}
<div class="backdrop" data-backdrop></div>

<aside class="drawer" data-drawer aria-label="Mobile navigation">
    <div class="drawer__head">
        <a class="brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" width="44" height="44">
            <span class="brand__text">
                <span class="brand__name" style="font-size:1.1rem">Sunlight <span>Global</span></span>
                <span class="brand__sub">Human Resources Pvt. Ltd.</span>
            </span>
        </a>
        <button class="drawer__close" type="button" data-drawer-close aria-label="Close menu">
            <x-icon name="close"/>
        </button>
    </div>

    <div class="drawer__body">
        @foreach ($menu as $i => $item)
            @isset($item['children'])
                <button class="drawer__link" type="button"
                        data-drawer-toggle aria-expanded="false" aria-controls="dsub-{{ $i }}">
                    {{ $item['label'] }}
                    <x-icon name="chevron-down"/>
                </button>
                <div class="drawer__sub" id="dsub-{{ $i }}">
                    @foreach ($item['children'] as $child)
                        <a href="{{ $link($child) }}">{{ $child['label'] }}</a>
                    @endforeach
                </div>
            @else
                <a class="drawer__link" href="{{ $link($item) }}">
                    {{ $item['label'] }}
                    <x-icon name="chevron-right"/>
                </a>
            @endisset
        @endforeach

        <div class="drawer__foot">
            <a class="btn btn--primary" href="{{ route('contact') }}">Apply Now <x-icon name="arrow-right"/></a>
            <a class="btn btn--ghost" href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.contact.phones.0')) }}">
                <x-icon name="phone"/> {{ config('company.contact.phones.0') }}
            </a>
        </div>
    </div>
</aside>
