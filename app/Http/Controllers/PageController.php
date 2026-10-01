<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function leadership()
    {
        return view('pages.leadership', [
            'leaders' => config('leadership'),
        ]);
    }

    public function leader(string $slug)
    {
        $leader = collect(config('leadership'))->firstWhere('slug', $slug);

        if (! $leader) {
            throw new NotFoundHttpException();
        }

        return view('pages.leader', [
            'leader' => $leader,
            'others' => collect(config('leadership'))->where('slug', '!=', $slug)->values(),
        ]);
    }

    public function services()
    {
        return view('pages.services');
    }

    public function training()
    {
        return view('pages.training');
    }

    public function whyChooseUs()
    {
        return view('pages.why-choose-us');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function partners()
    {
        return view('pages.partners');
    }

    public function certificates()
    {
        return view('pages.certificates');
    }
}
