/*!
 * Sunlight Global Human Resources - front-end behaviour
 * No framework dependency; everything degrades gracefully without JS.
 */
(function () {
    'use strict';

    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ------------------------------------------------------ sticky header */

    var header = document.querySelector('.header');

    if (header) {
        var onScrollHeader = function () {
            header.classList.toggle('is-stuck', window.scrollY > 8);
        };
        onScrollHeader();
        window.addEventListener('scroll', onScrollHeader, { passive: true });
    }

    /* ------------------------------------------------------ mobile drawer */

    var drawer   = document.querySelector('[data-drawer]');
    var backdrop = document.querySelector('[data-backdrop]');
    var openBtn  = document.querySelector('[data-drawer-open]');
    var closeBtn = document.querySelector('[data-drawer-close]');

    function setDrawer(open) {
        if (!drawer) return;
        drawer.classList.toggle('is-open', open);
        if (backdrop) backdrop.classList.toggle('is-open', open);
        document.body.style.overflow = open ? 'hidden' : '';
        if (openBtn) openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    if (openBtn)  openBtn.addEventListener('click', function () { setDrawer(true); });
    if (closeBtn) closeBtn.addEventListener('click', function () { setDrawer(false); });
    if (backdrop) backdrop.addEventListener('click', function () { setDrawer(false); });

    // Accordion groups inside the drawer.
    document.querySelectorAll('[data-drawer-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var panel = document.getElementById(btn.getAttribute('aria-controls'));
            if (!panel) return;
            var open = panel.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    });

    /* -------------------------------------------------------- hero slider */

    var slider = document.querySelector('[data-slider]');

    if (slider) {
        var slides = Array.prototype.slice.call(slider.querySelectorAll('.hero__slide'));
        var dots   = Array.prototype.slice.call(slider.querySelectorAll('.hero__dots button'));
        var index  = 0;
        var timer  = null;
        var DELAY  = 6500;

        var show = function (next) {
            index = (next + slides.length) % slides.length;
            slides.forEach(function (slide, i) {
                slide.classList.toggle('is-active', i === index);
                slide.setAttribute('aria-hidden', i === index ? 'false' : 'true');
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === index);
                dot.setAttribute('aria-selected', i === index ? 'true' : 'false');
            });
        };

        var start = function () {
            if (reduceMotion || slides.length < 2) return;
            stop();
            timer = window.setInterval(function () { show(index + 1); }, DELAY);
        };
        var stop = function () {
            if (timer) { window.clearInterval(timer); timer = null; }
        };

        dots.forEach(function (dot, i) {
            dot.addEventListener('click', function () { show(i); start(); });
        });

        var prev = slider.querySelector('[data-slide-prev]');
        var next = slider.querySelector('[data-slide-next]');
        if (prev) prev.addEventListener('click', function () { show(index - 1); start(); });
        if (next) next.addEventListener('click', function () { show(index + 1); start(); });

        slider.addEventListener('mouseenter', stop);
        slider.addEventListener('mouseleave', start);

        // Pause while the tab is in the background.
        document.addEventListener('visibilitychange', function () {
            document.hidden ? stop() : start();
        });

        // Touch swipe.
        var startX = null;
        slider.addEventListener('touchstart', function (e) {
            startX = e.changedTouches[0].clientX;
        }, { passive: true });
        slider.addEventListener('touchend', function (e) {
            if (startX === null) return;
            var delta = e.changedTouches[0].clientX - startX;
            if (Math.abs(delta) > 45) show(index + (delta < 0 ? 1 : -1));
            startX = null;
            start();
        }, { passive: true });

        show(0);
        start();
    }

    /* ------------------------------------------------- scroll reveal + KPI */

    var revealables = document.querySelectorAll('.reveal');
    var counters    = document.querySelectorAll('[data-count]');

    function runCounter(el) {
        var target   = parseFloat(el.getAttribute('data-count')) || 0;
        var duration = 1500;
        var started  = null;

        if (reduceMotion) {
            el.textContent = target.toLocaleString('en-US');
            return;
        }

        var tick = function (now) {
            if (started === null) started = now;
            var progress = Math.min((now - started) / duration, 1);
            // easeOutCubic
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.round(target * eased).toLocaleString('en-US');
            if (progress < 1) window.requestAnimationFrame(tick);
        };

        window.requestAnimationFrame(tick);
    }

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-in');
                if (entry.target.hasAttribute('data-count')) runCounter(entry.target);
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        revealables.forEach(function (el) { observer.observe(el); });
        counters.forEach(function (el) { observer.observe(el); });
    } else {
        revealables.forEach(function (el) { el.classList.add('is-in'); });
        counters.forEach(runCounter);
    }

    /* ------------------------------------------------------- back to top */

    var toTop = document.querySelector('[data-to-top]');

    if (toTop) {
        window.addEventListener('scroll', function () {
            toTop.classList.toggle('is-visible', window.scrollY > 480);
        }, { passive: true });

        toTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        });
    }

    /* ---------------------------------------------------------- lightbox */

    var lightbox = document.querySelector('[data-lightbox]');

    if (lightbox) {
        var lbImage   = lightbox.querySelector('img');
        var lbCaption = lightbox.querySelector('.lightbox__caption');
        var items     = Array.prototype.slice.call(document.querySelectorAll('[data-lightbox-item]'));
        var current   = 0;

        var render = function (i) {
            current = (i + items.length) % items.length;
            var source = items[current];
            var img    = source.querySelector('img');
            lbImage.src = img.getAttribute('data-full') || img.src;
            lbImage.alt = img.alt;
            if (lbCaption) lbCaption.textContent = source.getAttribute('data-caption') || img.alt;
        };

        var openLb = function (i) {
            render(i);
            lightbox.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        };
        var closeLb = function () {
            lightbox.classList.remove('is-open');
            document.body.style.overflow = '';
        };

        items.forEach(function (item, i) {
            item.addEventListener('click', function () { openLb(i); });
            item.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openLb(i); }
            });
        });

        lightbox.querySelector('[data-lightbox-close]').addEventListener('click', closeLb);
        lightbox.querySelector('[data-lightbox-prev]').addEventListener('click', function () { render(current - 1); });
        lightbox.querySelector('[data-lightbox-next]').addEventListener('click', function () { render(current + 1); });
        lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLb(); });

        document.addEventListener('keydown', function (e) {
            if (!lightbox.classList.contains('is-open')) return;
            if (e.key === 'Escape')     closeLb();
            if (e.key === 'ArrowLeft')  render(current - 1);
            if (e.key === 'ArrowRight') render(current + 1);
        });
    }

    /* ------------------------------------------------------------ escape */

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && drawer && drawer.classList.contains('is-open')) setDrawer(false);
    });

    // Close the drawer when the viewport grows past the mobile breakpoint.
    window.addEventListener('resize', function () {
        if (window.innerWidth > 1024 && drawer && drawer.classList.contains('is-open')) setDrawer(false);
    });
}());
