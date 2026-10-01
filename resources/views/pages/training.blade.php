@extends('layouts.app')

@section('title', 'Our Training')
@section('meta_description', 'Japanese language training, technical skill development, cultural orientation and workplace safety training delivered in-house before every deployment.')

@section('content')

<x-page-head
    title="Our Training"
    lead="We believe that quality training builds confidence, enhances skills, and prepares our candidates to succeed in their careers abroad." />

{{-- ========================================================= intro ===== --}}
<section class="section">
    <div class="shell">
        <div class="split split--wide">
            <div class="split__media reveal">
                <div class="frame">
                    <img src="{{ asset('images/gallery/gallery-01.webp') }}"
                         alt="Japanese language class in session at the Sunlight Global training centre"
                         loading="lazy">
                </div>
                <div class="badge-float">
                    <i><x-icon name="graduation"/></i>
                    <div>
                        <strong>100%</strong>
                        <span>Pre-departure training before every deployment</span>
                    </div>
                </div>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">Training Centre</span>
                <h2>Preparation Is Where <span class="tone">Placement Begins</span></h2>
                <p>
                    A candidate who cannot follow instructions on their first day is a problem for everybody —
                    the worker, the employer and us. So training is not an add-on to our recruitment service,
                    it is part of it.
                </p>
                <p>
                    Every candidate we present has been through language classes, job-specific practice,
                    cultural orientation and safety training at our own centre in Kathmandu, with regular
                    assessment along the way.
                </p>

                <div class="chip">
                    <i><x-icon name="language"/></i>
                    Japanese language &middot; Technical &middot; Culture &middot; Safety
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================================================== training areas = --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">What We Teach</span>
            <h2>Our Training <span class="tone">Areas</span></h2>
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
    </div>
</section>

{{-- ================================================ matters + features = --}}
<section class="section">
    <div class="shell">
        <div class="split">
            <div class="reveal">
                <span class="eyebrow">The Difference It Makes</span>
                <h2>Why Our Training <span class="tone">Matters</span></h2>
                <ul class="tick">
                    @foreach (config('content.training_matters') as $point)
                        <li><i><x-icon name="check"/></i> {{ $point }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">What You Get</span>
                <h2>Key <span class="tone">Features</span></h2>
                <ul class="tick tick--orange">
                    @foreach (config('content.training_features') as $point)
                        <li><i><x-icon name="check"/></i> {{ $point }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================= stats ===== --}}
<section class="section section--tight">
    <div class="shell">
        <x-stats :items="config('company.training_stats')"/>
    </div>
</section>

{{-- ======================================================== gallery ==== --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Inside The Centre</span>
            <h2>Language Class, Practical Training &amp; <span class="tone">Orientation</span></h2>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="gallery">
            @foreach (array_slice(config('content.gallery'), 0, 3) as $i => $shot)
                <figure class="gallery__item reveal" data-delay="{{ $i }}"
                        data-lightbox-item data-caption="{{ $shot['caption'] }}" tabindex="0" role="button">
                    <img src="{{ asset($shot['image']) }}" alt="{{ $shot['caption'] }}" loading="lazy">
                    <i><x-icon name="zoom"/></i>
                    <figcaption>{{ $shot['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================================================== commitment ===== --}}
<section class="section">
    <div class="shell">
        <div class="promise reveal">
            <i><x-icon name="graduation"/></i>
            <div>
                <h4>Our Commitment</h4>
                <p>
                    We are committed to providing the best training and preparation to ensure our candidates
                    are skilled, confident, and ready to build a brighter future abroad.
                </p>
            </div>
        </div>
    </div>
</section>

<x-cta-band
    title="Interested in our training programme?"
    text="Whether you are a candidate preparing for Japan or an employer wanting to review our curriculum, get in touch." />

@include('partials.lightbox')

@endsection
