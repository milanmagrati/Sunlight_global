@extends('layouts.app')

@section('title', 'Message from the '.$leader['role'])
@section('meta_description', 'A message from '.$leader['name'].', '.$leader['role'].' of Sunlight Global Human Resources Pvt. Ltd.')

@section('content')

@php
    $headTitle  = 'Message from the '.$leader['role'];
    $headLead   = $leader['name'].', '.$leader['role'].', on our purpose, our standards and where we are going.';
    $headCrumbs = ['About Us' => route('about'), 'Board of Directors' => route('leadership')];
@endphp

<x-page-head :title="$headTitle" :lead="$headLead" :crumbs="$headCrumbs" />

<section class="section">
    <div class="shell">
        <div class="split split--wide split--flip">

            <div class="split__media reveal">
                <div class="message__portrait">
                    <img src="{{ asset($leader['photo']) }}" alt="{{ $leader['name'] }}, {{ $leader['role'] }}">
                </div>
                <div class="message__signature">
                    <x-icon name="quote"/>
                    <strong>{{ $leader['name'] }}</strong>
                    <em>{{ $leader['role'] }}</em>
                    <span>{{ config('company.name') }}</span>
                </div>
            </div>

            <div class="reveal" data-delay="1">
                <span class="eyebrow">Message From</span>
                <h2>
                    @php [$first, $rest] = array_pad(explode(' ', $leader['role'], 2), 2, ''); @endphp
                    {{ $first }} <span class="tone">{{ $rest ?: $leader['name'] }}</span>
                </h2>

                <div class="message__quote">
                    <x-icon name="quote"/>
                    <p>{{ $leader['pull_quote'] }}</p>
                </div>

                @foreach ($leader['blocks'] as $block)
                    <div class="message__block">
                        <i><x-icon :name="$block['icon']"/></i>
                        <div>
                            <h3>{{ $block['title'] }}</h3>
                            <p>{{ $block['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

@isset($leader['japanese'])
    <section class="section section--tight">
        <div class="shell">
            <div class="jp-block reveal">
                <h3>{{ $leader['japanese']['title'] }}</h3>
                @foreach ($leader['japanese']['paragraphs'] as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
                <div class="sign">
                    @foreach ($leader['japanese']['sign'] as $line)
                        <span>{{ $line }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endisset

@if ($others->isNotEmpty())
    <section class="section section--wash">
        <div class="shell">
            <div class="head head--center">
                <span class="eyebrow">Also From The Board</span>
                <h2>Other <span class="tone">Messages</span></h2>
                <div class="rule"><span></span><span></span></div>
            </div>

            <div class="grid grid--2">
                @foreach ($others as $i => $other)
                    <article class="leader-card reveal" data-delay="{{ $i }}">
                        <div class="leader-card__photo">
                            <img src="{{ asset($other['photo']) }}" alt="{{ $other['name'] }}, {{ $other['role'] }}" loading="lazy">
                        </div>
                        <div class="leader-card__body">
                            <h3>{{ $other['name'] }}</h3>
                            <div class="leader-card__role">{{ $other['role'] }}</div>
                            <p>{{ \Illuminate\Support\Str::limit($other['blocks'][0]['text'], 150) }}</p>
                            <a class="btn btn--ghost btn--sm" href="{{ route('leadership.show', $other['slug']) }}" style="margin-top:18px">
                                Read Message <x-icon name="arrow-right"/>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<x-cta-band />

@endsection
