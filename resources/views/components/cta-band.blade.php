@props([
    'title' => 'Looking for reliable manpower from Nepal?',
    'text'  => 'Send us your requirement and one of our coordinators will respond with a sourcing plan and an honest timeline.',
])

<section class="section section--tight">
    <div class="shell">
        <div class="cta-band reveal">
            <div class="cta-band__copy">
                <h2>{{ $title }}</h2>
                <p>{{ $text }}</p>
            </div>
            <div class="btn-row">
                <a class="btn btn--primary" href="{{ route('contact') }}">
                    Get in Touch <x-icon name="arrow-right"/>
                </a>
                <a class="btn btn--outline-light" href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.contact.phones.0')) }}">
                    <x-icon name="phone"/> {{ config('company.contact.phones.0') }}
                </a>
            </div>
        </div>
    </div>
</section>
