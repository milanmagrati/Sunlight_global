@extends('layouts.app')

@section('title', 'Licences & Certificates')
@section('meta_description', 'Foreign employment licence, company registration and certificates held by Sunlight Global Human Resources Pvt. Ltd.')

@section('content')

<x-page-head
    title="Licences & Certificates"
    lead="Our registration and licensing documents, available for any employer or candidate who wants to verify them."
    :crumbs="['About Us' => route('about')]" />

<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Verification</span>
            <h2>Registered &amp; <span class="tone">Licensed</span></h2>
            <p>
                {{ config('company.name') }} operates under a foreign employment licence issued by the
                {{ config('company.licence.department') }}, {{ config('company.licence.ministry') }},
                {{ config('company.licence.authority') }}.
            </p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--3">
            @foreach (config('content.certificates') as $i => $doc)
                <figure class="card reveal" data-delay="{{ $i }}" style="margin:0;text-align:center;cursor:pointer"
                        data-lightbox-item data-caption="{{ $doc['title'] }} — {{ $doc['caption'] }}"
                        tabindex="0" role="button" aria-label="Open document: {{ $doc['title'] }}">
                    <div style="background:var(--wash);border-radius:10px;padding:16px;margin-bottom:18px">
                        <img src="{{ asset($doc['image']) }}" alt="{{ $doc['title'] }}"
                             style="width:100%;aspect-ratio:3/4;object-fit:contain" loading="lazy">
                    </div>
                    <figcaption>
                        <h3 style="font-size:1.02rem">{{ $doc['title'] }}</h3>
                        <div class="card__line" style="margin-inline:auto"></div>
                        <p>{{ $doc['caption'] }}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- ====================================================== compliance === --}}
<section class="section section--wash">
    <div class="shell">
        <div class="split split--wide">
            <div class="reveal">
                <span class="eyebrow">Compliance</span>
                <h2>Every Placement Goes <span class="tone">Through The System</span></h2>
                <p>
                    We do not process workers outside the official channel. Each deployment carries a labour
                    approval from the Department of Foreign Employment, a signed employment contract, and the
                    insurance and welfare fund contributions required under Nepali law.
                </p>
                <ul class="tick tick--orange">
                    <li><i><x-icon name="check"/></i> Foreign employment licence held and current</li>
                    <li><i><x-icon name="check"/></i> Labour approval obtained for every worker</li>
                    <li><i><x-icon name="check"/></i> Written employment contracts, explained before signing</li>
                    <li><i><x-icon name="check"/></i> Welfare fund and insurance contributions paid</li>
                    <li><i><x-icon name="check"/></i> No fee charged to any candidate at any stage</li>
                </ul>
            </div>

            <div class="split__media reveal" data-delay="1">
                <div class="frame frame--right frame--navy">
                    <img src="{{ asset('images/gallery/gallery-01.webp') }}"
                         alt="A Japanese language class at the Sunlight Global training centre"
                         loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<x-cta-band
    title="Need to verify our credentials?"
    text="Ask us for the licence number and registration details, and check them directly with the Department of Foreign Employment." />

@include('partials.lightbox')

@endsection
