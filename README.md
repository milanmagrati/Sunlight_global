# Sunlight Global Human Resources — Website

Front-end for **Sunlight Global Human Resources Pvt. Ltd.**, a licensed manpower
recruitment company in Kathmandu supplying skilled and semi-skilled workers to Japan.

Built on **Laravel 13 / PHP 8.3**. Content, styling and imagery are taken from the
company profile document; the brand palette (navy `#001C64`, sunlight orange
`#F15A25`) and the Montserrat / Roboto pairing follow it directly.

---

## Running it locally

```sh
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Then open <http://127.0.0.1:8000>.

There is **no front-end build step**. CSS and JS are hand-written files in
`public/`, so `npm install` is not required to run or deploy the site.

For deployment to cPanel/shared hosting see **[DEPLOYMENT.md](DEPLOYMENT.md)**.

---

## Pages

| Route | Page |
| --- | --- |
| `/` | Home — hero slider, pillars, about, approach, services, why-choose-us, training, process, MD message, gallery, partners |
| `/about` | Company profile, approach, vision & mission, values, SWOT, board |
| `/leadership` | Board of Directors |
| `/leadership/{slug}` | Individual director's message (the MD's page also carries the Japanese version) |
| `/services` | Eight services with detail, plus the six-stage service process |
| `/training` | Four training areas, why it matters, key features, training statistics |
| `/why-choose-us` | Six differentiators, statistics, values, promise |
| `/gallery` | Photo gallery with lightbox |
| `/partners` | Partner logos and partnership enquiry |
| `/certificates` | Licence and registration documents |
| `/contact` | Contact details, enquiry form, map |
| `/sitemap.xml` | Generated sitemap |

A styled 404 page is at `resources/views/errors/404.blade.php`.

---

## Where the content lives

All copy the client is likely to want changed sits in three config files, shaped
like database rows so they map cleanly onto tables when the admin panel is built:

| File | Contents |
| --- | --- |
| `config/company.php` | Name, tagline, phones, emails, address, office hours, social links, licence body, statistics, pillars, approach, values |
| `config/content.php` | Services, service process, why-choose-us, training areas, SWOT, partners, certificates, gallery captions |
| `config/leadership.php` | Director names, roles, photos and message text (including the Japanese message) |

Changing a phone number or adding a service means editing one array — no Blade
templates need touching.

---

## Structure

```
app/Http/Controllers/
    PageController.php        static pages + director lookup
    ContactController.php     enquiry form (validation only for now)

resources/views/
    layouts/app.blade.php     document shell, meta, JSON-LD
    partials/                 header (incl. mobile drawer), footer, lightbox
    components/               icon, page-head, cta-band, stats
    pages/                    one Blade file per page

public/
    css/site.css              full stylesheet, no framework
    js/site.js                slider, drawer, counters, lightbox, reveal
    images/                   photographs and logos taken from the company profile
```

Icons are inline SVG rendered by `<x-icon name="..."/>` — no icon font or CDN.

---

## Notes on the source material

Two things in the company profile PDF were left out deliberately:

- The **"Our Approach"** cards in the PDF still carried Canva template text
  ("We combine art and technology to produce visually stunning designs…",
  and a reference to *Borcelle*). That is placeholder copy from the template,
  not company content, so it has been rewritten to describe the actual
  Learn / Train / Deploy / Support process.
- A paragraph in the Managing Director's message headed *"Representative"*
  was garbled — it described the company as "the largest 20+year-old human
  resources company in India" and referenced a 2010 award, which contradicts
  the 2020 founding date stated elsewhere in the same document. It has been
  omitted rather than published; please confirm the intended wording.

The **licence number** is blank in `config/company.php` — the PDF shows the
label "License No:" with no number filled in. Add it there when the client
supplies it; it will then appear in the footer.

Statistics (5,000+ candidates, 100+ clients, 95%+ satisfaction, 1,000+ trained,
90%+ placement) are reproduced from the company profile as given.

---

## Still to build

- **Contact form persistence and email.** `ContactController@store` validates the
  submission and returns a confirmation; storing it and mailing the office is
  marked with a `TODO` in that file.
- **Admin panel** for editing the content currently held in the three config files.
- **Social media URLs** in `config/company.php` are placeholders (`#`).
