# Deploying to shared Laravel hosting (cPanel)

Built and tested on **PHP 8.3** with **Laravel 13**. The front end needs no Node
build step — CSS and JS are plain files in `public/`, so there is nothing to compile
on the server.

---

## 1. Set the PHP version first

In cPanel open **Select PHP Version** (or *MultiPHP Manager*) and choose **8.3** or
**8.4**. Then enable these extensions if they are not already ticked:

```
openssl  mbstring  fileinfo  curl  zip  pdo  pdo_mysql  tokenizer  xml  ctype  json  bcmath
```

Laravel will not boot without them.

---

## 2. Upload the files

Zip the project **without** `node_modules` and `.git`, upload it through File
Manager, and extract it. Then pick one of the two layouts below.

### Option A — recommended (application outside the web root)

This is the safe layout: only `public/` is reachable from the browser, so `.env`,
`storage/` and `vendor/` cannot be downloaded by anyone.

```
/home/USER/
├── sunlight-global/        ← everything except the public folder
└── public_html/            ← the contents of the project's public/ folder
```

1. Move the **contents** of `sunlight-global/public/` into `public_html/`.
2. Edit `public_html/index.php` and fix the two paths:

```php
require __DIR__.'/../sunlight-global/vendor/autoload.php';

$app = require_once __DIR__.'/../sunlight-global/bootstrap/app.php';
```

### Option B — everything inside `public_html`

Only if your host will not let you serve from a subfolder. Upload the whole
project into `public_html/` and add this `.htaccess` at `public_html/.htaccess`:

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Block direct access to application files
    RewriteRule ^(\.env|\.git|composer\.(json|lock)|artisan) - [F,L]
    RewriteRule ^(app|bootstrap|config|database|resources|routes|storage|tests|vendor)/ - [F,L]

    # Send everything else to Laravel's front controller
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

Option A is meaningfully safer. Use Option B only as a fallback.

---

## 3. Configure the environment

Copy `.env.example` to `.env` (if `.env` was not uploaded) and set:

```dotenv
APP_NAME="Sunlight Global Human Resources"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://sunlightglobal.com.np
```

`APP_DEBUG=false` matters — with it on, any error page shows your file paths and
configuration to the public.

If `APP_KEY` is empty, generate one. Via SSH:

```sh
php artisan key:generate
```

No SSH? Run this once from a temporary file in the web root, then delete the file:

```php
<?php echo 'base64:'.base64_encode(random_bytes(32));
```

and paste the result into `APP_KEY=` in `.env`.

### Database

**The front end does not need a database at all.** Sessions and cache are set to
the `file` driver, so the site runs on a host with no database configured:

```dotenv
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Leave those as they are for tomorrow's deployment. When the back end is built you
can point Laravel at MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

---

## 4. Permissions

```sh
chmod -R 775 storage bootstrap/cache
```

In File Manager: select `storage` and `bootstrap/cache`, choose *Permissions*,
set **775** and tick *recurse into subdirectories*.

---

## 5. Cache for production

Over SSH, from the application root:

```sh
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Re-run `php artisan config:cache` after **any** change to `.env` — a cached config
ignores the file until you do.

To undo the caches while debugging: `php artisan optimize:clear`.

---

## 6. After going live

- Force HTTPS in cPanel (*Domains → Force HTTPS Redirect*) and install the free
  AutoSSL certificate.
- Check `/` , `/about`, `/services`, `/training`, `/gallery` and `/contact` load.
- Check a bad URL such as `/does-not-exist` shows the styled 404 page.

---

## Updating the site later

After editing `public/css/site.css` or `public/js/site.js`, bump the version in
`.env` so browsers fetch the new file instead of a cached one:

```dotenv
ASSET_VERSION=1.1
```

then `php artisan config:cache`.

---

## What is not built yet

The front end is complete. The back end is the next phase:

- **Contact form** — `app/Http/Controllers/ContactController@store` validates the
  submission and returns a confirmation, but does not yet save or email it. The
  two lines to implement are marked with a `TODO` in that file. You will need
  SMTP credentials in `.env` (`MAIL_MAILER=smtp`, host, port, username, password).
- **Admin panel** — all editable content currently lives in `config/company.php`,
  `config/content.php` and `config/leadership.php`. Those three files are shaped
  deliberately like database rows, so each array maps onto a table when the CMS is
  added.
