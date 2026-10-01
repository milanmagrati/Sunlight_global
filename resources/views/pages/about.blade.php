@extends('layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Established in 2020 in Kathmandu, Sunlight Global Human Resources Pvt. Ltd. supplies skilled and semi-skilled manpower to Japan through ethical, transparent recruitment and structured pre-departure training.')

@section('content')

<x-page-head
    title="About Us"
    lead="A brief story about the company, how we work, and the standards we hold ourselves to." />

{{-- ========================================================== story ==== --}}
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
                        <strong>Since {{ config('company.founded') }}</strong>
                        <span>Serving Nepali workers and Japanese employers</span>
                    </div>
                </div>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">Who We Are</span>
                <h2>A Brief Story About <span class="tone">The Company</span></h2>

                <div class="chip">
                    <i><x-icon name="user"/></i>
                    Licensed manpower recruitment, Kathmandu
                </div>

                <p>
                    {{ config('company.name') }} was established in {{ config('company.founded') }} with a
                    commitment to delivering professional, ethical and efficient manpower recruitment services.
                </p>
                <p>
                    Based in Kathmandu, Nepal, we specialise in supplying skilled and semi-skilled manpower to
                    Japan. Our licence is issued by the Department of Foreign Employment under the Ministry of
                    Labour, Employment and Social Security, and every placement we make is processed through
                    that channel with full labour approval.
                </p>
                <p>
                    We believe that the right opportunity can transform lives. With this philosophy, we focus on
                    preparing Nepalese candidates to meet international standards through structured training,
                    language education and proper guidance.
                </p>

                <ul class="tick tick--orange">
                    <li><i><x-icon name="check"/></i> No recruitment fee is charged to any candidate, at any stage</li>
                    <li><i><x-icon name="check"/></i> Japanese language, technical and cultural training delivered in-house</li>
                    <li><i><x-icon name="check"/></i> One named coordinator handles each employer file end to end</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================= stats ===== --}}
<section class="section section--tight section--wash">
    <div class="shell">
        <x-stats :items="config('company.stats')"/>
    </div>
</section>

{{-- ======================================================== approach === --}}
<section class="section">
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
    </div>
</section>

{{-- ============================================== vision / mission ===== --}}
<section class="section section--wash" id="vision">
    <div class="shell">
        <div class="split" style="margin-bottom:44px;align-items:center">
            <div class="reveal">
                <span class="eyebrow">What Drives Us</span>
                <h2>Our Vision,<br>Our <span class="tone">Mission</span></h2>
                <div class="rule"><span></span><span></span></div>
            </div>
            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right">
                    <img src="{{ asset('images/jppp.jpeg') }}"
                        alt="Sunlight Global candidates gathered at a classroom decorated for study in Japan"
                         loading="lazy">
                </div>
            </div>
        </div>

        <div class="vm">
            <div class="vm__card vm__card--navy reveal">
                <div class="vm__head">
                    <i><x-icon name="telescope"/></i>
                    <div>
                        <h3>Vision</h3>
                        <div class="vm__head-line"></div>
                    </div>
                </div>
                <p>
                    To become a trusted and leading manpower recruitment company, recognised for delivering a
                    skilled, disciplined and well-trained workforce to the global market, especially Japan.
                </p>
                <div class="vm__watermark"><x-icon name="eye"/></div>
            </div>

            <div class="vm__card vm__card--light reveal" data-delay="1">
                <div class="vm__head">
                    <i><x-icon name="target"/></i>
                    <div>
                        <h3>Mission</h3>
                        <div class="vm__head-line"></div>
                    </div>
                </div>
                <p>
                    To provide skilled, disciplined and well-trained manpower to the global market, especially
                    Japan, while ensuring ethical, transparent and reliable recruitment practices; empowering
                    Nepalese youth through quality skill and language training; and building strong, long-term
                    relationships with international employers.
                </p>
                <div class="vm__watermark" style="color:var(--orange)"><x-icon name="target"/></div>
            </div>
        </div>

        <div class="values-band reveal">
            <div class="values-band__title">
                <i><x-icon name="diamond"/></i>
                <h3>Values</h3>
                <span></span>
            </div>
            <ul class="values-list">
                @foreach (config('company.values') as $value)
                    <li>
                        <i><x-icon name="check"/></i>
                        <p><strong>{{ $value['title'] }}:</strong> {{ $value['text'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

{{-- =========================================================== swot ==== --}}
<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Where We Stand</span>
            <h2>S.W.O.T <span class="tone">Analysis</span></h2>
            <p>
                A strategic assessment of our organization to identify internal strengths and weaknesses, and
                external opportunities and threats that impact our growth and success.
            </p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="swot">
            @foreach (config('content.swot') as $i => $quad)
                <div class="swot__card swot__card--{{ $quad['tone'] }} reveal" data-delay="{{ $i % 2 }}">
                    <span class="swot__letter">{{ $quad['letter'] }}</span>
                    <h3>{{ $quad['title'] }}</h3>
                    <span></span>
                    <p class="swot__lead">{{ $quad['lead'] }}</p>
                    <ul class="swot__list">
                        @foreach ($quad['items'] as $point)
                            <li><i><x-icon name="check"/></i> {{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===================================================== leadership ==== --}}
<section class="section section--wash">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Leadership</span>
            <h2>Meet The <span class="tone">Board</span></h2>
            <p>The people responsible for how this company operates and the standards it keeps.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--3">
            @foreach (config('leadership') as $i => $leader)
                <article class="leader-card reveal" data-delay="{{ $i }}">
                    <div class="leader-card__photo">
                        <img src="{{ asset($leader['photo']) }}" alt="{{ $leader['name'] }}, {{ $leader['role'] }}" loading="lazy">
                    </div>
                    <div class="leader-card__body">
                        <h3>{{ $leader['name'] }}</h3>
                        <div class="leader-card__role">{{ $leader['role'] }}</div>
                        <p>{{ \Illuminate\Support\Str::limit($leader['blocks'][0]['text'], 140) }}</p>
                        <a class="btn btn--ghost btn--sm" href="{{ route('leadership.show', $leader['slug']) }}" style="margin-top:18px">
                            Read Message <x-icon name="arrow-right"/>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<x-cta-band
    title="Want to know more about how we work?"
    text="We are happy to walk you through our licence, our process and our training programme before you commit to anything." />

@endsection
