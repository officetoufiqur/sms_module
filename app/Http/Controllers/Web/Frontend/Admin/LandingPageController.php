<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CMS;

class LandingPageController extends Controller
{
    // banner section
    public function banner()
    {
        $banner = CMS::where('section', 'banner')->first();
        return Inertia::render('admin/dashboard/LandingPage/banner/Index', ['banner' => $banner]);
    }

    public function bannerEdit($id)
    {
        $banner = CMS::findOrFail($id);
        return Inertia::render('admin/dashboard/LandingPage/banner/Edit', ['banner' => $banner]);
    }

    public function bannerUpdate(Request $request, $id)
    {
        $banner = CMS::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner->title = $request->input('title');
        $banner->sub_title = $request->input('sub_title');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/banner', $filename, 'public');
            // Delete old image if it exists
            if ($banner->image && file_exists(public_path($banner->image))) {
                unlink(public_path($banner->image));
            }
            // Store the new image path
            $banner->image = '/storage/' . $filePath;
        }

        $banner->save();

        return redirect()->route('admin.banner')->with('message', 'Banner updated successfully.');
    }


    // about section
    public function about()
    {
        $about = CMS::where('section', 'about')->first();
        return Inertia::render('admin/dashboard/LandingPage/about/Index', compact('about'));
    }

    public function aboutEdit()
    {
        $about = CMS::where('section', 'about')->first();
        return Inertia::render('admin/dashboard/LandingPage/about/Edit', compact('about'));
    }

    public function aboutUpdate(Request $request)
    {
        $about = CMS::where('section', 'about')->first();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about->title = $request->input('title');
        $about->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/about', $filename, 'public');
            // Delete old image if it exists
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }
            // Store the new image path
            $about->image = '/storage/' . $filePath;
        }

        $about->save();

        return redirect()->route('admin.about')->with('message', 'About section updated successfully.');
    }

    // pricing section
    public function pricing()
    {
        return Inertia::render('admin/dashboard/LandingPage/pricing/Index');
    }

    public function pricingCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/pricing/Create');
    }
    public function pricingEdit($id)
    {
        return Inertia::render('admin/dashboard/LandingPage/pricing/Edit', ['id' => $id]);
    }

    // faqs section
    public function faqs()
    {
        return Inertia::render('admin/dashboard/LandingPage/faqs/Index');
    }
    public function faqsEdit($id)
    {
        return Inertia::render('admin/dashboard/LandingPage/faqs/Edit', ['id' => $id]);
    }
    public function faqsCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/faqs/Create');
    }

    // blog section
    public function blog()
    {
        return Inertia::render('admin/dashboard/LandingPage/blog/Index');
    }
    public function blogCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/blog/Create');
    }
    public function blogEdit($id)
    {
        return Inertia::render('admin/dashboard/LandingPage/blog/Edit', ['id' => $id]);
    }

    // contact section
    public function contact()
    {
        return Inertia::render('admin/dashboard/LandingPage/Contact');
    }

    // client says section
    public function clientSays()
    {
        return Inertia::render('admin/dashboard/LandingPage/ClientSay');
    }
}
