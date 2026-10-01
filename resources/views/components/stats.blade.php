@props(['items' => [], 'plain' => false])

<div class="stats {{ $plain ? 'stats--plain' : '' }}">
    @foreach ($items as $item)
        <div class="stat">
            <div class="stat__value">
                <span class="reveal" data-count="{{ $item['value'] }}">0</span>{{ $item['suffix'] }}
            </div>
            <div class="stat__label">{{ $item['label'] }}</div>
        </div>
    @endforeach
</div>
