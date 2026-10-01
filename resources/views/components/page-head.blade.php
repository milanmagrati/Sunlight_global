@props(['title', 'lead' => null, 'crumbs' => []])

<section class="page-head">
    <div class="shell">
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            @foreach ($crumbs as $label => $url)
                <x-icon name="chevron-right"/>
                @if (is_string($url))
                    <a href="{{ $url }}">{{ $label }}</a>
                @else
                    <span>{{ $url }}</span>
                @endif
            @endforeach
            <x-icon name="chevron-right"/>
            <span aria-current="page">{{ $title }}</span>
        </nav>

        <h1>{{ $title }}</h1>

        @if ($lead)
            <p>{{ $lead }}</p>
        @endif
    </div>
</section>
