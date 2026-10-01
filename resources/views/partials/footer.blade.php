<footer class="footer">
    <div class="shell">
        <div class="footer__grid">

            <div>
                <div class="footer__brand">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('company.name') }}" width="58" height="58">
                    <span class="brand__text">
                        <span class="brand__name">Sunlight <span>Global</span></span>
                        <span class="brand__sub">Human Resources Pvt. Ltd.</span>
                    </span>
                </div>

                <p>
                    Established in {{ config('company.founded') }} and based in Kathmandu, we supply skilled and
                    semi-skilled manpower to Japan and other international markets, backed by structured
                    language training, technical preparation and ethical recruitment practice.
                </p>

                <div class="footer__licence">
                    <strong>Licensed by</strong>
                    {{ config('company.licence.department') }},<br>
                    {{ config('company.licence.ministry') }},<br>
                    {{ config('company.licence.authority') }}.
                </div>

                <div class="footer__social">
                    @foreach (config('company.social') as $social)
                        <a href="{{ $social['url'] }}" target="_blank" rel="noopener" aria-label="{{ $social['name'] }}">
                            <x-icon :name="$social['icon']"/>
                        </a>
                    @endforeach
                </div>
            </div>

            <div>
                <h4>Quick Links</h4>
                <ul class="footer__links">
                    <li><a href="{{ route('about') }}"><x-icon name="chevron-right"/> About Us</a></li>
                    <li><a href="{{ route('leadership') }}"><x-icon name="chevron-right"/> Board of Directors</a></li>
                    <li><a href="{{ route('services') }}"><x-icon name="chevron-right"/> Our Services</a></li>
                    <li><a href="{{ route('training') }}"><x-icon name="chevron-right"/> Our Training</a></li>
                    <li><a href="{{ route('why-choose-us') }}"><x-icon name="chevron-right"/> Why Choose Us</a></li>
                    <li><a href="{{ route('contact') }}"><x-icon name="chevron-right"/> Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4>Our Services</h4>
                <ul class="footer__links">
                    @foreach (array_slice(config('content.services'), 0, 6) as $service)
                        <li>
                            <a href="{{ route('services') }}#{{ $service['slug'] }}">
                                <x-icon name="chevron-right"/> {{ $service['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4>Get in Touch</h4>
                <ul class="footer__contact">
                    <li>
                        <i><x-icon name="map-pin"/></i>
                        <div>
                            <strong>Office Address</strong>
                            <span>{{ config('company.contact.address') }}</span>
                            <span>{{ config('company.contact.city') }}</span>
                        </div>
                    </li>
                    <li>
                        <i><x-icon name="phone"/></i>
                        <div>
                            <strong>Phone</strong>
                            @foreach (config('company.contact.phones') as $phone)
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}">{{ $phone }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li>
                        <i><x-icon name="mail"/></i>
                        <div>
                            <strong>Email</strong>
                            @foreach (config('company.contact.emails') as $email)
                                <a href="mailto:{{ $email }}">{{ $email }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li>
                        <i><x-icon name="clock"/></i>
                        <div>
                            <strong>Office Hours</strong>
                            <span>{{ config('company.contact.hours.days') }}</span>
                            <span>{{ config('company.contact.hours.time') }} ({{ config('company.contact.hours.zone') }})</span>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="footer__bar">
            <span>&copy; {{ date('Y') }} {{ config('company.name') }}. All rights reserved.</span>
            <div class="footer__bar-links">
                <a href="{{ route('certificates') }}">Licences</a>
                <a href="{{ route('partners') }}">Partners</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
    </div>
</footer>
