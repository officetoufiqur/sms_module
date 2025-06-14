<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    // banner section
    public function banner(){
        return Inertia::render('admin/dashboard/LandingPage/banner/Index');
    }  

    public function bannerEdit($id){
        return Inertia::render('admin/dashboard/LandingPage/banner/Edit', ['id' => $id]);
    }
    
    // about section
     public function about(){
        return Inertia::render('admin/dashboard/LandingPage/about/Index');
    }

    public function aboutEdit($id){
        return Inertia::render('admin/dashboard/LandingPage/about/Edit', ['id' => $id]);
    }

    // pricing section
    public function pricing(){
        return Inertia::render('admin/dashboard/LandingPage/pricing/Index');
    }

    public function pricingCreate(){
        return Inertia::render('admin/dashboard/LandingPage/pricing/Create');
    }
    public function pricingEdit($id){
        return Inertia::render('admin/dashboard/LandingPage/pricing/Edit', ['id' => $id]);
    }

    // faqs section
    public function faqs(){
        return Inertia::render('admin/dashboard/LandingPage/faqs/Index');
    }
    public function faqsEdit($id){
        return Inertia::render('admin/dashboard/LandingPage/faqs/Edit', ['id' => $id]);
    }
    public function faqsCreate(){
        return Inertia::render('admin/dashboard/LandingPage/faqs/Create');
    }

    // blog section
    public function blog(){
        return Inertia::render('admin/dashboard/LandingPage/blog/Index');
    }
    public function blogCreate(){
        return Inertia::render('admin/dashboard/LandingPage/blog/Create');
    }
    public function blogEdit($id){
        return Inertia::render('admin/dashboard/LandingPage/blog/Edit', ['id' => $id]);
    }

    // contact section
    public function contact(){
        return Inertia::render('admin/dashboard/LandingPage/Contact');
    }

    // client says section
    public function clientSays(){
        return Inertia::render('admin/dashboard/LandingPage/ClientSay');
    }
}
