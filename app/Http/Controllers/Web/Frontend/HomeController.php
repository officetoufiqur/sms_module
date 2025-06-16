<?php

namespace App\Http\Controllers\Web\Frontend;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CMS;
use App\Models\Plan;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $banner = \App\Models\CMS::where('section', 'banner')->first();
        $testimonial = Testimonial::all();
        $about = CMS::where('section', 'about')->first();
        $plans = Plan::all();
        $plans->each(function ($plan) {
            $plan->plan_feature = json_decode($plan->plan_feature, true);
        });

        $faqs = CMS::where('section', 'faqs')->select('question', 'answer')->get();
        $blogs = Blog::all();

        // return $plans;
        return Inertia::render('Home',[
            'banner' => $banner, 
            'testimonial' => $testimonial,
            'about' => $about,
            'plans' => $plans,
            'faqs' => $faqs,
            'blogs' => $blogs
        ]);
    }
}
