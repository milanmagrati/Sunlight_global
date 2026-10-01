@extends('layouts.app')

@section('title', 'Manpower Recruitment for Japan')
@section('meta_description', 'Sunlight Global Human Resources Pvt. Ltd. — a licensed Nepali manpower recruitment company supplying skilled and semi-skilled workers to Japan, with in-house Japanese language and technical training.')

@section('content')

{{-- ===================================================== hero slider === --}}
<section class="hero" data-slider>
    <div class="hero__slides">

        <div class="hero__slide is-active" role="group" aria-roledescription="slide" aria-label="1 of 3">
            <div class="hero__bg">
                <img src="{{ asset('images/hero/tokyo-skyline.webp') }}" alt="" fetchpriority="high">
            </div>
            <div class="hero__inner">
                <div class="shell">
                    <div class="hero__copy">
                        <span class="hero__badge">
                            <i><x-icon name="shield-check"/></i>
                            Government Licensed &middot; Est. {{ config('company.founded') }}
                        </span>
                        <h1>Connecting Nepali Talent With <em>Japanese Employers</em></h1>
                        <p class="hero__lead">
                            We supply skilled and semi-skilled manpower to Japan, prepared through structured
                            language training, technical practice and cultural orientation before departure.
                        </p>
                        <ul class="hero__points">
                            <li><x-icon name="check"/> Zero cost to candidates</li>
                            <li><x-icon name="check"/> In-house training centre</li>
                            <li><x-icon name="check"/> Full government compliance</li>
                        </ul>
                        <div class="btn-row">
                            <a class="btn btn--primary" href="{{ route('contact') }}">Send Your Requirement <x-icon name="arrow-right"/></a>
                            <a class="btn btn--outline-light" href="{{ route('services') }}">Our Services</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero__slide" role="group" aria-roledescription="slide" aria-label="2 of 3" aria-hidden="true">
            <div class="hero__bg">
                <img src="{{ asset('images/hero/japan-pagoda.webp') }}" alt="" loading="lazy">
            </div>
            <div class="hero__inner">
                <div class="shell">
                    <div class="hero__copy">
                        <span class="hero__badge">
                            <i><x-icon name="graduation"/></i>
                            Training &amp; Preparation
                        </span>
                        <h1>Candidates Who Arrive <em>Ready to Work</em></h1>
                        <p class="hero__lead">
                            Japanese language, job-specific technical skills, workplace safety and cultural
                            orientation — every candidate completes pre-departure training before deployment.
                        </p>
                        <ul class="hero__points">
                            <li><x-icon name="check"/> Listening, speaking, reading &amp; writing</li>
                            <li><x-icon name="check"/> Mock tests &amp; interview practice</li>
                            <li><x-icon name="check"/> Workplace safety training</li>
                        </ul>
                        <div class="btn-row">
                            <a class="btn btn--primary" href="{{ route('training') }}">Explore Our Training <x-icon name="arrow-right"/></a>
                            <a class="btn btn--outline-light" href="{{ route('gallery') }}">View Gallery</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero__slide" role="group" aria-roledescription="slide" aria-label="3 of 3" aria-hidden="true">
            <div class="hero__bg">
                <img src="{{ asset('images/hero/nepal-stupa.webp') }}" alt="" loading="lazy">
            </div>
            <div class="hero__inner">
                <div class="shell">
                    <div class="hero__copy">
                        <span class="hero__badge">
                            <i><x-icon name="handshake"/></i>
                            Ethical Recruitment
                        </span>
                        <h1>Recruitment Built On <em>Trust &amp; Transparency</em></h1>
                        <p class="hero__lead">
                            We charge candidates nothing, process every placement through the Department of
                            Foreign Employment, and stay accountable to both worker and employer after arrival.
                        </p>
                        <ul class="hero__points">
                            <li><x-icon name="check"/> Written job orders</li>
                            <li><x-icon name="check"/> Replacement guarantee</li>
                            <li><x-icon name="check"/> After-placement support</li>
                        </ul>
                        <div class="btn-row">
                            <a class="btn btn--primary" href="{{ route('why-choose-us') }}">Why Choose Us <x-icon name="arrow-right"/></a>
                            <a class="btn btn--outline-light" href="{{ route('about') }}">About the Company</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <button class="hero__arrow hero__arrow--prev" type="button" data-slide-prev aria-label="Previous slide">
        <x-icon name="arrow-right"/>
    </button>
    <button class="hero__arrow hero__arrow--next" type="button" data-slide-next aria-label="Next slide">
        <x-icon name="arrow-right"/>
    </button>

    <div class="hero__dots" role="tablist" aria-label="Slides">
        <button type="button" class="is-active" role="tab" aria-selected="true"  aria-label="Slide 1"></button>
        <button type="button" role="tab" aria-selected="false" aria-label="Slide 2"></button>
        <button type="button" role="tab" aria-selected="false" aria-label="Slide 3"></button>
    </div>
</section>

{{-- ======================================================== pillars ==== --}}
<section class="pillars">
    <div class="shell">
        <div class="pillars__grid">
            @foreach (config('company.pillars') as $i => $pillar)
                <div class="pillar reveal" data-delay="{{ $i }}">
                    <i><x-icon :name="$pillar['icon']"/></i>
                    <h3>{{ $pillar['title'] }}</h3>
                    <p>{{ $pillar['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ========================================================== about ==== --}}
<section class="section">
    <div class="shell">
        <div class="split split--wide">
            <div class="split__media reveal">
                <div class="frame frame--navy">
                    <img src="{{ asset('images/japan.jpeg') }}"
                        alt="Sunlight Global representative meeting a Japanese partner at their office"
                         loading="lazy">
                </div>
                <div class="badge-float">
                    <i><x-icon name="calendar"/></i>
                    <div>
                        <strong>{{ date('Y') - config('company.founded') }}+</strong>
                        <span>Years connecting Nepal and Japan</span>
                    </div>
                </div>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">About Us</span>
                <h2>A Brief Story About <span class="tone">The Company</span></h2>

                <div class="chip">
                    <i><x-icon name="user"/></i>
                    Established in {{ config('company.founded') }}, Kathmandu
                </div>

                <p>
                    {{ config('company.name') }} was established in {{ config('company.founded') }} with a
                    commitment to delivering professional, ethical and efficient manpower recruitment services.
                </p>
                <p>
                    Based in Kathmandu, Nepal, we specialise in supplying skilled and semi-skilled manpower to Japan.
                    We believe that the right opportunity can transform lives, and with that philosophy we focus on
                    preparing Nepalese candidates to meet international standards through structured training,
                    language education and proper guidance.
                </p>

                <ul class="tick">
                    <li><i><x-icon name="check"/></i> Licensed by the Department of Foreign Employment, Government of Nepal</li>
                    <li><i><x-icon name="check"/></i> In-house Japanese language and technical training centre</li>
                    <li><i><x-icon name="check"/></i> Zero recruitment fees charged to candidates</li>
                </ul>

                <div class="btn-row" style="margin-top:28px">
                    <a class="btn btn--navy" href="{{ route('about') }}">Read More About Us <x-icon name="arrow-right"/></a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======================================================= approach ==== --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">How We Work</span>
            <h2>Our <span class="tone">Approach</span></h2>
            <p>Four stages that take a requirement from a written job order through to a worker settled in their new role.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="approach">
            @foreach (config('company.approach') as $i => $step)
                <div class="approach__card reveal" data-delay="{{ $i }}">
                    <i><x-icon :name="$step['icon']"/></i>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['text'] }}</p>
                    <b>{{ $step['no'] }}</b>
                </div>
            @endforeach
        </div>

        <div class="grid grid--4" style="margin-top:34px">
            @foreach (config('company.core_values') as $i => $value)
                <div class="feature reveal" data-delay="{{ $i }}">
                    <i><x-icon :name="$value['icon']"/></i>
                    <div>
                        <h3>{{ $value['title'] }}</h3>
                        <div class="feature__line"></div>
                        <p>{{ $value['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ======================================================= services ==== --}}
<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">What We Do</span>
            <h2>Our <span class="tone">Services</span></h2>
            <p>End-to-end recruitment solutions designed to connect the right talent with the right opportunity.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--4">
            @foreach (config('content.services') as $i => $service)
                <a class="card reveal" data-delay="{{ $i % 4 }}" href="{{ route('services') }}#{{ $service['slug'] }}">
                    <div class="card__icon"><x-icon :name="$service['icon']"/></div>
                    <h3>{{ $service['title'] }}</h3>
                    <div class="card__line"></div>
                    <p>{{ $service['text'] }}</p>
                    <span class="card__more">Learn more <x-icon name="arrow-right"/></span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================================================== why choose ==== --}}
<section class="section section--wash">
    <div class="shell">
        <div class="split" style="margin-bottom:52px">
            <div class="reveal">
                <span class="eyebrow">Our Commitment. Your Advantage.</span>
                <h2>Why <span class="tone">Choose Us?</span></h2>
                <p>
                    At Sunlight Global we go beyond recruitment. We create opportunities, build trust and
                    deliver value to both our clients and our candidates.
                </p>
                <div class="rule"><span></span><span></span></div>
            </div>
            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right">
                    <img src="{{ asset('images/gallery/gallery-02.webp') }}"
                         alt="Sunlight Global team receiving Japanese partners at Tribhuvan International Airport"
                         loading="lazy">
                </div>
            </div>
        </div>

        <div class="grid grid--3">
            @foreach (config('content.why_choose_us') as $i => $item)
                <div class="feature reveal" data-delay="{{ $i % 3 }}">
                    <i><x-icon :name="$item['icon']"/></i>
                    <div>
                        <h3>{{ $item['title'] }}</h3>
                        <div class="feature__line"></div>
                        <p>{{ $item['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top:44px">
            <x-stats :items="config('company.stats')"/>
        </div>
    </div>
</section>

{{-- ======================================================== training === --}}
<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Our Training</span>
            <h2>Preparation That Makes The <span class="tone">Difference</span></h2>
            <p>Quality training builds confidence, sharpens skills and prepares our candidates to succeed abroad.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--4">
            @foreach (config('content.training_areas') as $i => $area)
                <article class="train-card reveal" data-delay="{{ $i }}">
                    <div class="train-card__head">
                        <i><x-icon :name="$area['icon']"/></i>
                        <h3>{{ $area['title'] }}</h3>
                    </div>
                    <div class="train-card__media">
                        <img src="{{ asset($area['image']) }}" alt="{{ $area['title'] }} session" loading="lazy">
                    </div>
                    <div class="train-card__body">
                        <p>{{ $area['text'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="btn-row" style="justify-content:center;margin-top:38px">
            <a class="btn btn--navy" href="{{ route('training') }}">See The Full Training Programme <x-icon name="arrow-right"/></a>
        </div>
    </div>
</section>

{{-- ======================================================== process ==== --}}
<section class="section section--navy">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Step by Step</span>
            <h2>Our Service <span class="tone">Process</span></h2>
            <p>From the first requirement to after-placement support, every file follows the same six stages.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="process">
            @foreach (config('content.process') as $i => $step)
                <div class="step reveal" data-delay="{{ $i % 6 }}">
                    <i>{{ $step['no'] }}</i>
                    <h4>{{ $step['title'] }}</h4>
                    <p>{{ $step['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====================================================== leadership === --}}
@php $md = collect(config('leadership'))->firstWhere('featured', true); @endphp

<section class="section">
    <div class="shell">
        <div class="split split--wide">
            <div class="split__media reveal">
                <div class="message__portrait">
                    <img src="{{ asset($md['photo']) }}" alt="{{ $md['name'] }}, {{ $md['role'] }}" loading="lazy">
                </div>
                <div class="message__signature">
                    <x-icon name="quote"/>
                    <strong>{{ $md['name'] }}</strong>
                    <em>{{ $md['role'] }}</em>
                    <span>{{ config('company.name') }}</span>
                </div>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">Message From</span>
                <h2>Managing <span class="tone">Director</span></h2>

                <div class="message__quote">
                    <x-icon name="quote"/>
                    <p>{{ $md['pull_quote'] }}</p>
                </div>

                <p>{{ $md['blocks'][0]['text'] }}</p>
                <p>{{ \Illuminate\Support\Str::limit($md['blocks'][2]['text'], 260) }}</p>

                <div class="btn-row" style="margin-top:24px">
                    <a class="btn btn--navy" href="{{ route('leadership.show', $md['slug']) }}">Read Full Message <x-icon name="arrow-right"/></a>
                    <a class="btn btn--ghost" href="{{ route('leadership') }}">Board of Directors</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ======================================================== gallery ==== --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Gallery</span>
            <h2>Moments From <span class="tone">Our Work</span></h2>
            <p>Training sessions, employer visits, interview days and departures from our Kathmandu office.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="gallery">
            @foreach (config('content.gallery') as $i => $shot)
                <figure class="gallery__item reveal" data-delay="{{ $i % 4 }}"
                        data-lightbox-item data-caption="{{ $shot['caption'] }}" tabindex="0" role="button">
                    <img src="{{ asset($shot['image']) }}" alt="{{ $shot['caption'] }}" loading="lazy">
                    <i><x-icon name="zoom"/></i>
                    <figcaption>{{ $shot['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>

        <div class="btn-row" style="justify-content:center;margin-top:36px">
            <a class="btn btn--navy" href="{{ route('gallery') }}">View Full Gallery <x-icon name="arrow-right"/></a>
        </div>
    </div>
</section>

{{-- ======================================================= partners ==== --}}
<section class="section section--wash" style="padding-top:0">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Trusted By</span>
            <h2>Our <span class="tone">Partners</span></h2>
        </div>
    </div>

    <div class="marquee">
        <div class="marquee__track">
            @foreach (array_merge(config('content.partners'), config('content.partners'), config('content.partners')) as $partner)
                <div class="logo-tile">
                    <img src="{{ asset($partner['logo']) }}" alt="{{ $partner['name'] }}" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>

<x-cta-band/>

@include('partials.lightbox')

@endsection
