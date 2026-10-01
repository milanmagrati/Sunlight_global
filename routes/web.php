<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/leadership', [PageController::class, 'leadership'])->name('leadership');
Route::get('/leadership/{slug}', [PageController::class, 'leader'])->name('leadership.show');

Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/training', [PageController::class, 'training'])->name('training');
Route::get('/why-choose-us', [PageController::class, 'whyChooseUs'])->name('why-choose-us');

Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/partners', [PageController::class, 'partners'])->name('partners');
Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/sitemap.xml', function () {
    $urls = collect([
        ['home', 1.0], ['about', 0.9], ['services', 0.9], ['training', 0.8],
        ['why-choose-us', 0.8], ['leadership', 0.7], ['gallery', 0.6],
        ['partners', 0.6], ['certificates', 0.6], ['contact', 0.9],
    ])->map(fn ($page) => ['loc' => route($page[0]), 'priority' => number_format($page[1], 1)]);

    $urls = $urls->concat(
        collect(config('leadership'))->map(fn ($leader) => [
            'loc'      => route('leadership.show', $leader['slug']),
            'priority' => '0.5',
        ])
    );

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');
