<div class="lightbox" data-lightbox role="dialog" aria-modal="true" aria-label="Image viewer">
    <button class="lightbox__close" type="button" data-lightbox-close aria-label="Close">
        <x-icon name="close"/>
    </button>
    <button class="lightbox__nav lightbox__nav--prev" type="button" data-lightbox-prev aria-label="Previous image">
        <x-icon name="arrow-right"/>
    </button>
    <button class="lightbox__nav lightbox__nav--next" type="button" data-lightbox-next aria-label="Next image">
        <x-icon name="arrow-right"/>
    </button>

    {{-- src is set by site.js when a thumbnail is opened; leaving it empty here
         would make the browser re-request the current page as an image. --}}
    <figure style="margin:0">
        <img alt="">
        <figcaption class="lightbox__caption"></figcaption>
    </figure>
</div>
