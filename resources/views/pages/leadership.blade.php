@extends('layouts.app')

@section('title', 'Board of Directors')
@section('meta_description', 'Messages from the Managing Director and the Board of Directors of Sunlight Global Human Resources Pvt. Ltd.')

@section('content')

<x-page-head
    title="Board of Directors"
    lead="The people responsible for how this company operates and the standards it keeps."
    :crumbs="['About Us' => route('about')]" />

<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Leadership</span>
            <h2>Meet The <span class="tone">Board</span></h2>
            <p>Each of our directors has spent time inside the international labour market they now recruit for.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="grid grid--3">
            @foreach ($leaders as $i => $leader)
                <article class="leader-card reveal" data-delay="{{ $i }}">
                    <div class="leader-card__photo">
                        <img src="{{ asset($leader['photo']) }}" alt="{{ $leader['name'] }}, {{ $leader['role'] }}" loading="lazy">
                    </div>
                    <div class="leader-card__body">
                        <h3>{{ $leader['name'] }}</h3>
                        <div class="leader-card__role">{{ $leader['role'] }}</div>
                        <p>{{ \Illuminate\Support\Str::limit($leader['blocks'][0]['text'], 165) }}</p>
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
    title="Speak with our team"
    text="Our directors and coordinators are available during office hours to discuss requirements, partnerships or candidate enquiries." />

@endsection
