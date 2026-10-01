@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')

<section class="section" style="text-align:center;padding-block:clamp(70px,10vw,130px)">
    <div class="shell">
        <div style="font-family:var(--display);font-weight:800;font-size:clamp(5rem,16vw,10rem);line-height:1;color:var(--navy-tint)">
            404
        </div>

        <h1 style="margin-top:-.3em">Page <span class="tone">Not Found</span></h1>

        <p style="max-width:520px;margin:0 auto 32px">
            The page you were looking for has moved or no longer exists. Use the links below,
            or get in touch and we will point you in the right direction.
        </p>

        <div class="btn-row" style="justify-content:center">
            <a class="btn btn--primary" href="{{ route('home') }}">Back to Home <x-icon name="arrow-right"/></a>
            <a class="btn btn--ghost" href="{{ route('contact') }}">Contact Us</a>
        </div>
    </div>
</section>

@endsection
