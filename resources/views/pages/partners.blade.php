@extends('layouts.app')

@section('title', 'Our Partners')
@section('meta_description', 'Education, training and consultancy partners working with Sunlight Global Human Resources Pvt. Ltd.')

@section('content')

<x-page-head
    title="Our Partners"
    lead="The institutions and consultancies we work alongside to source, train and place candidates."
    :crumbs="['Media' => null]" />

<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Working Together</span>
            <h2>Trusted <span class="tone">Partners</span></h2>
            <p>
                We work with education consultancies and training institutes across Nepal, and with employers
                and receiving organisations in Japan. These relationships are what let us move quickly without
                cutting corners.
            </p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--4">
            @foreach (config('content.partners') as $i => $partner)
                <div class="card reveal" data-delay="{{ $i }}" style="text-align:center">
                    <div style="height:110px;display:grid;place-items:center;margin-bottom:18px">
                        <img src="{{ asset($partner['logo']) }}" alt="{{ $partner['name'] }}"
                             style="max-height:100%;width:auto" loading="lazy">
                    </div>
                    <h3 style="font-size:1rem">{{ $partner['name'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ==================================================== become partner = --}}
<section class="section section--wash">
    <div class="shell">
        <div class="split split--wide">
            <div class="reveal">
                <span class="eyebrow">Partnership</span>
                <h2>Work With <span class="tone">Us</span></h2>
                <p>
                    We are open to partnerships with training institutes, education consultancies and
                    employers who share our position on ethical recruitment.
                </p>
                <ul class="tick">
                    <li><i><x-icon name="check"/></i> Employers and receiving organisations in Japan</li>
                    <li><i><x-icon name="check"/></i> Japanese language schools and training institutes</li>
                    <li><i><x-icon name="check"/></i> Education and career consultancies across Nepal</li>
                    <li><i><x-icon name="check"/></i> Technical and vocational training providers</li>
                </ul>
                <div class="btn-row" style="margin-top:28px">
                    <a class="btn btn--primary" href="{{ route('contact') }}">Discuss a Partnership <x-icon name="arrow-right"/></a>
                </div>
            </div>

            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right frame--navy">
                    <img src="{{ asset('images/gallery/gallery-02.webp') }}"
                         alt="Sunlight Global welcoming Japanese partners at Tribhuvan International Airport"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<x-cta-band
    title="Interested in partnering with us?"
    text="Send us a short note about your organisation and what you are looking for, and we will arrange a call." />

@endsection
