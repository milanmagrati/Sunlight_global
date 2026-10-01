@extends('layouts.app')

@section('title', 'Contact Us')
@section('meta_description', 'Contact Sunlight Global Human Resources Pvt. Ltd. at Samakhusi, Ranibari Road, Kathmandu. Phone 01-4977365, info@sunlightglobal.com.np.')

@section('content')

<x-page-head
    title="Contact Us"
    lead="We are here to help you find the right talent or the right opportunity. Get in touch with our team today." />

{{-- ==================================================== contact cards == --}}
<section class="section">
    <div class="shell">
        <div class="grid grid--4">
            <div class="contact-card reveal">
                <i><x-icon name="phone"/></i>
                <div>
                    <h4>Phone</h4>
                    @foreach (config('company.contact.phones') as $phone)
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>
                    @endforeach
                </div>
            </div>

            <div class="contact-card reveal" data-delay="1">
                <i><x-icon name="mail"/></i>
                <div>
                    <h4>Email</h4>
                    @foreach (config('company.contact.emails') as $email)
                        <a href="mailto:{{ $email }}">{{ $email }}</a>
                    @endforeach
                </div>
            </div>

            <div class="contact-card reveal" data-delay="2">
                <i><x-icon name="map-pin"/></i>
                <div>
                    <h4>Address</h4>
                    <p>{{ config('company.contact.address') }}</p>
                    <p>{{ config('company.contact.city') }}</p>
                </div>
            </div>

            <div class="contact-card reveal" data-delay="3">
                <i><x-icon name="clock"/></i>
                <div>
                    <h4>Office Hours</h4>
                    <p>{{ config('company.contact.hours.days') }}</p>
                    <p>{{ config('company.contact.hours.time') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ========================================================== form ===== --}}
<section class="section section--wash" style="padding-top:0" id="enquiry">
    <div class="shell">
        <div class="split split--wide" style="align-items:flex-start">

            <div class="reveal">
                <span class="eyebrow">We’re Here to Help</span>
                <h2>Send Us A <span class="tone">Message</span></h2>
                <p>
                    Our friendly team is ready to answer your questions and provide the best solutions for you.
                    Whether you are an employer with a requirement or a candidate looking for an opportunity in
                    Japan, tell us what you need.
                </p>

                <div class="frame" style="margin-top:30px">
                    <img src="{{ asset('images/support-agent.webp') }}"
                         alt="A member of the Sunlight Global support team at the Kathmandu office"
                         loading="lazy">
                </div>

                <ul class="tick" style="margin-top:32px">
                    <li><i><x-icon name="check"/></i> Employers: send the role, headcount and skill level</li>
                    <li><i><x-icon name="check"/></i> Candidates: tell us your training and language level</li>
                    <li><i><x-icon name="check"/></i> We reply within one working day</li>
                </ul>
            </div>

            <div class="reveal" data-delay="1">
                <div class="form-card">
                    @if (session('status'))
                        <div class="alert alert--success" role="status">
                            <x-icon name="shield-check"/>
                            <span>{{ session('status') }}</span>
                        </div>
                    @endif

                    <h3>Enquiry Form</h3>
                    <p style="margin-bottom:26px">Fields marked <span style="color:var(--orange)">*</span> are required.</p>

                    <form method="POST" action="{{ route('contact.store') }}#enquiry" novalidate>
                        @csrf

                        <div class="field-row">
                            <div class="field">
                                <label for="name">Full Name <span>*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                       class="@error('name') is-invalid @enderror"
                                       autocomplete="name" required>
                                @error('name') <span class="error">{{ $message }}</span> @enderror
                            </div>

                            <div class="field">
                                <label for="phone">Phone <span>*</span></label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                       class="@error('phone') is-invalid @enderror"
                                       autocomplete="tel" required>
                                @error('phone') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="field">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="@error('email') is-invalid @enderror"
                                   autocomplete="email" required>
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label for="subject">I am contacting you as <span>*</span></label>
                            <select id="subject" name="subject" class="@error('subject') is-invalid @enderror" required>
                                <option value="">Please select…</option>
                                @foreach ([
                                    'Employer — manpower requirement',
                                    'Candidate — job opportunity',
                                    'Candidate — training enquiry',
                                    'Partnership proposal',
                                    'General enquiry',
                                ] as $option)
                                    <option value="{{ $option }}" @selected(old('subject') === $option)>{{ $option }}</option>
                                @endforeach
                            </select>
                            @error('subject') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label for="message">Your Message <span>*</span></label>
                            <textarea id="message" name="message"
                                      class="@error('message') is-invalid @enderror"
                                      placeholder="Tell us about your requirement or your background…"
                                      required>{{ old('message') }}</textarea>
                            @error('message') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <button class="btn btn--primary" type="submit" style="width:100%">
                            Send Message <x-icon name="arrow-right"/>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- =========================================================== map ===== --}}
<section class="section">
    <div class="shell">
        <div class="head head--center">
            <span class="eyebrow">Visit Us</span>
            <h2>Our Office <span class="tone">Location</span></h2>
            <p>{{ config('company.contact.address') }}, {{ config('company.contact.city') }}</p>
            <div class="rule"><span></span><span></span></div>
        </div>

        <div class="map-embed reveal">
            <iframe
                src="https://www.google.com/maps?q={{ urlencode('Samakhusi Ranibari Road, Kathmandu, Nepal') }}&output=embed"
                title="Map showing the Sunlight Global Human Resources office in Kathmandu"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen></iframe>
        </div>
    </div>
</section>

<x-cta-band
    title="Prefer to talk it through?"
    text="Call us during office hours and one of our coordinators will take you through the process step by step." />

@endsection
