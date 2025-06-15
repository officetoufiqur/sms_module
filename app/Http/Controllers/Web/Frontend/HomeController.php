<?php

namespace App\Http\Controllers\Web\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banner = \App\Models\CMS::where('section', 'banner')->first();
        $testimonial = Testimonial::all();

        return Inertia::render('Home',[
            'banner' => $banner, 
            'testimonial' => $testimonial
        ]);
    }
}
