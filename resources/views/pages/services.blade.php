@extends('layouts.app')

@section('title', 'Our Services')
@section('meta_description', 'End-to-end manpower recruitment: sourcing, screening, training, visa and travel, documentation and compliance, employer relations, after-placement support and replacement guarantee.')

@section('content')

<x-page-head
    title="Our Services"
    lead="We provide end-to-end recruitment solutions designed to connect the right talent with the right opportunities around the world." />

{{-- ========================================================= intro ===== --}}
<section class="section">
    <div class="shell">
        <div class="split split--wide">
            <div class="reveal">
                <span class="eyebrow">What We Do</span>
                <h2>Complete Recruitment, <span class="tone">Start to Finish</span></h2>
                <p>
                    An employer approaching us does not need to coordinate between a recruiter, a training
                    centre, a document agent and a travel agent. Everything from the first requirement to the
                    follow-up call after arrival is handled by one team, under one agreement.
                </p>
                <ul class="tick">
                    <li><i><x-icon name="check"/></i> Written job orders before any sourcing begins</li>
                    <li><i><x-icon name="check"/></i> Processing through the Department of Foreign Employment</li>
                    <li><i><x-icon name="check"/></i> Interpreters available for interviews and follow-up</li>
                    <li><i><x-icon name="check"/></i> Replacement support under the service agreement</li>
                </ul>
            </div>
            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right">
                    <img src="{{ asset('images/gallery/gallery-06.webp') }}"
                         alt="Selection interviews in progress at the Sunlight Global office"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ====================================================== service list = --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Service Portfolio</span>
            <h2>Eight Ways We <span class="tone">Support You</span></h2>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--2">
            @foreach (config('content.services') as $i => $service)
                <article class="card card--numbered reveal" id="{{ $service['slug'] }}" data-delay="{{ $i % 2 }}">
                    <span class="card__no">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="card__icon"><x-icon :name="$service['icon']"/></div>
                    <h3>{{ $service['title'] }}</h3>
                    <div class="card__line"></div>
                    <p><strong style="color:var(--ink)">{{ $service['text'] }}</strong></p>
                    <p>{{ $service['detail'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- ======================================================== process ==== --}}
<section class="section section--navy">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Step by Step</span>
            <h2>Our Service <span class="tone">Process</span></h2>
            <p>Every file follows the same six stages, so both employer and candidate always know where things stand.</p>
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

{{-- ===================================================== commitment ==== --}}
<section class="section">
    <div class="shell">
        <div class="promise reveal">
            <i><x-icon name="handshake"/></i>
            <div>
                <h4>Our Commitment</h4>
                <p>
                    We are committed to ethical recruitment, transparency, and delivering the best talent
                    solutions that drive success for our clients and better opportunities for candidates.
                </p>
            </div>
        </div>
    </div>
</section>

<x-cta-band
    title="Send us your requirement"
    text="Tell us the role, the headcount and the skill level. We will come back with a realistic sourcing plan and timeline." />

@endsection
