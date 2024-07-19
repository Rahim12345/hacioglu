<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Pair;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $pairs = Pair::orderBy('id', 'desc')->get();
        $works = Portfolio::orderBy('id', 'desc')->get();
        $reviews = Review::orderBy('id', 'desc')->get();
        $services = Service::orderBy('id', 'desc')->get();
        return view('index', [
            'pairs' => $pairs,
            'works' => $works,
            'reviews' => $reviews,
            'services' => $services,
        ]);
    }

    public function services($slug)
    {
        $serve = Service::where('slug_az', $slug)
            ->orWhere('slug_en', $slug)
            ->OrWhere('slug_ru', $slug)
            ->firstOrFail();
        $services = Service::orderBy('id', 'desc')
            ->where('id','!=', $serve->id)
            ->get();

        return view('services', [
            'serve' => $serve,
            'services' => $services,
        ]);
    }
}
