<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#001c64">

    <title>@yield('title', config('company.short_name')) &mdash; {{ config('company.short_name') }} Human Resources</title>
    <meta name="description" content="@yield('meta_description', 'Sunlight Global Human Resources Pvt. Ltd. is a licensed manpower recruitment company in Kathmandu, Nepal, supplying skilled and semi-skilled workers to Japan with ethical, transparent recruitment.')">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    {{-- Open Graph / social sharing --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('company.name') }}">
    <meta property="og:title" content="@yield('title', config('company.short_name'))">
    <meta property="og:description" content="@yield('meta_description', config('company.tagline'))">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Roboto:wght@300;400;500;700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ config('app.asset_version', '1.0') }}">

    @stack('head')

    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type'    => 'EmploymentAgency',
        'name'     => config('company.name'),
        'url'      => url('/'),
        'logo'     => asset('images/logo.png'),
        'slogan'   => config('company.tagline'),
        'foundingDate' => (string) config('company.founded'),
        'address'  => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => config('company.contact.address'),
            'addressLocality' => 'Kathmandu',
            'addressCountry'  => 'NP',
        ],
        'telephone' => config('company.contact.phones.0'),
        'email'     => config('company.contact.emails.0'),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
</head>
<body>

<a class="skip-link" href="#main">Skip to content</a>

@include('partials.header')

<main id="main">
    @yield('content')
</main>

@include('partials.footer')

{{-- Floating actions --}}
<div class="float-stack">
    <a class="float-btn float-btn--wa"
       href="https://wa.me/{{ config('company.contact.whatsapp') }}"
       target="_blank" rel="noopener"
       aria-label="Chat with us on WhatsApp">
        <x-icon name="whatsapp"/>
    </a>
    <button class="float-btn float-btn--top" type="button" data-to-top aria-label="Back to top">
        <x-icon name="arrow-up"/>
    </button>
</div>

<script src="{{ asset('js/site.js') }}?v={{ config('app.asset_version', '1.0') }}" defer></script>

@stack('scripts')

</body>
</html>
