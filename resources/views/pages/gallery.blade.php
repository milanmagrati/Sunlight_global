@extends('layouts.app')

@section('title', 'Photo Gallery')
@section('meta_description', 'Photographs from the Sunlight Global training centre, employer visits, interview days and departures.')

@section('content')

<x-page-head
    title="Photo Gallery"
    lead="Training sessions, employer visits, interview days and departures — moments from our work in Kathmandu and beyond."
    :crumbs="['Media' => null]" />

<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Gallery</span>
            <h2>Meet The Minds Behind <span class="tone">The Work</span></h2>
            <p>Our team’s synergy is what turns a job order into a career.</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="gallery">
            @foreach (config('content.gallery') as $i => $shot)
                <figure class="gallery__item reveal" data-delay="{{ $i % 4 }}"
                        data-lightbox-item data-caption="{{ $shot['caption'] }}" tabindex="0" role="button"
                        aria-label="Open image: {{ $shot['caption'] }}">
                    <img src="{{ asset($shot['image']) }}" alt="{{ $shot['caption'] }}" loading="lazy">
                    <i><x-icon name="zoom"/></i>
                    <figcaption>{{ $shot['caption'] }}</figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

<x-cta-band
    title="Come and see the centre for yourself"
    text="Employers and partners are welcome to visit our Kathmandu office and sit in on a training session." />

@include('partials.lightbox')

@endsection
