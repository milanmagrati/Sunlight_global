@extends('layouts.app')

@section('title', 'Why Choose Us')
@section('meta_description', 'Ethical and transparent recruitment, Japan specialisation, in-house training, careful screening, strong client relationships and fast, compliant deployment.')

@section('content')

<x-page-head
    title="Why Choose Us"
    lead="At Sunlight Global, we go beyond recruitment. We create opportunities, build trust, and deliver value to both our clients and candidates." />

{{-- ========================================================= intro ===== --}}
<section class="section">
    <div class="shell">
        <div class="split split--wide">
            <div class="reveal">
                <span class="eyebrow">Our Commitment. Your Advantage.</span>
                <h2>Recruitment You Can <span class="tone">Verify</span></h2>
                <p>
                    Foreign employment is an industry where a lot is promised and less is documented. We work
                    the other way round: written job orders, government-processed paperwork, no fees taken from
                    candidates, and a named person you can call when you need an answer.
                </p>
                <p>
                    If any of the claims on this page matter to your decision, ask us for the evidence. We will
                    show you the licence, the training records and the process.
                </p>
                <div class="btn-row" style="margin-top:26px">
                    <a class="btn btn--navy" href="{{ route('certificates') }}">See Our Licences <x-icon name="arrow-right"/></a>
                </div>
            </div>
            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right">
                    <img src="{{ asset('images/gallery/gallery-02.webp') }}"
                         alt="Sunlight Global team receiving Japanese partners at Tribhuvan International Airport"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ====================================================== advantages === --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Six Reasons</span>
            <h2>What Sets Us <span class="tone">Apart</span></h2>
            <div class="rule"><span></span><span></span></div>
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
    </div>
</section>

{{-- ========================================================= stats ===== --}}
<section class="section section--tight">
    <div class="shell">
        <x-stats :items="config('company.stats')"/>
    </div>
</section>

{{-- ========================================================= values ==== --}}
<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">How We Operate</span>
            <h2>Our <span class="tone">Values</span></h2>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--4">
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

        <div class="promise reveal" style="margin-top:40px">
            <i><x-icon name="users"/></i>
            <div>
                <h4>Our Promise</h4>
                <p>
                    We are committed to transforming lives by connecting talented individuals with meaningful
                    opportunities, while upholding dignity, fairness, and respect.
                </p>
            </div>
        </div>
    </div>
</section>

<x-cta-band />

@endsection
