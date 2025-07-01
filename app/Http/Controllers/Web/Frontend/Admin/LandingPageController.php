<?php

namespace App\Http\Controllers\Web\Frontend\Admin;

use App\Models\CMS;
use App\Models\Blog;
use App\Models\Plan;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $plans = Plan::all();
        return Inertia::render('admin/dashboard/LandingPage/pricing/Index', compact('plans'));
    }

    public function pricingCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/pricing/Create');
    }

    public function pricingStore(Request $request)
    {
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'amount' => 'required|integer',
            'sms_limit' => 'required|integer',
            'plan_feature' => 'required|array',
            'plan_feature.*' => 'required|string',
        ]);
        // return $validated; 

        $plan = new Plan();
        $plan->plan_name = $request->input('plan_name');
        $plan->amount = $request->input('amount');
        $plan->sms_limit = $request->input('sms_limit');
        $plan->plan_feature = json_encode($request->input('plan_feature'));
        $plan->save();

        return redirect()->route('admin.pricing')->with('message', 'Pricing plan created successfully.');
    }

    public function pricingEdit($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->plan_feature = json_decode($plan->plan_feature, true);
        return Inertia::render('admin/dashboard/LandingPage/pricing/Edit', ['plan' => $plan]);
    }

    public function pricingUpdate(Request $request, $id)
    {
        $plan = Plan::findOrFail($id);
        // Validate the request data
        $validated = $request->validate([
            'plan_name' => 'required|string|max:255',
            'amount' => 'required|integer',
            'sms_limit' => 'required|integer',
            'plan_feature' => 'nullable|array',
            'plan_feature.*' => 'nullable|string',
        ]);

        // return $validated; 

        $plan->plan_name = $request->input('plan_name');
        $plan->amount = $request->input('amount');
        $plan->sms_limit = $request->input('sms_limit');
        $plan->plan_feature = json_encode($request->input('plan_feature') ?? []);
        $plan->save();

        return redirect()->route('admin.pricing')->with('message', 'Pricing plan updated successfully.');
    }

    public function pricingDestroy($id)
    {
        $plan = Plan::findOrFail($id);
        $plan->delete();
        return redirect()->route('admin.pricing')->with('message', 'Pricing plan deleted successfully.');
    }

    // faqs section
    public function faqs()
    {
        $faqs = CMS::where('section', 'faqs')->get();
        return Inertia::render('admin/dashboard/LandingPage/faqs/Index', compact('faqs'));
    }
    public function faqsEdit($id)
    {
        $faq = CMS::findOrFail($id);
        return Inertia::render('admin/dashboard/LandingPage/faqs/Edit', compact('faq'));
    }
    public function faqsCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/faqs/Create');
    }

    public function faqsStore(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = new CMS();
        $faq->section = 'faqs';
        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect()->route('admin.faqs')->with('message', 'FAQ created successfully.');
    }

    public function faqsUpdate(Request $request, $id)
    {
        $faq = CMS::findOrFail($id);

        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect()->route('admin.faqs')->with('message', 'FAQ updated successfully.');
    }
    public function faqsDelete($id)
    {
        $faq = CMS::findOrFail($id);
        $faq->delete();
        return redirect()->route('admin.faqs')->with('message', 'FAQ deleted successfully.');
    }

    // blog section
    public function blog()
    {
        $blogs = Blog::all();
        return Inertia::render('admin/dashboard/LandingPage/blog/Index', compact('blogs'));
    }
    public function blogCreate()
    {
        return Inertia::render('admin/dashboard/LandingPage/blog/Create');
    }

    public function blogStore(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = new Blog();
        $blog->name = Auth::user()->name;
        $blog->title = $request->input('title');
        $blog->sub_title = $request->input('sub_title');
        $blog->description = $request->input('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/blog', $filename, 'public');
            $blog->image = '/storage/' . $filePath;
        }
        $blog->save();
        return redirect()->route('admin.blog')->with('message', 'Blog created successfully.');
    }

    public function blogEdit($id)
    {
        $blog = Blog::findOrFail($id);
        return Inertia::render('admin/dashboard/LandingPage/blog/Edit', compact('blog'));
    }

    public function blogUpdate(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog->title = $request->input('title');
        $blog->sub_title = $request->input('sub_title');
        $blog->description = $request->input('description');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $filePath = $file->storeAs('uploads/blog', $filename, 'public');
            // Delete old image if it exists
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            // Store the new image path
            $blog->image = '/storage/' . $filePath;
        }

        $blog->save();

        return redirect()->route('admin.blog')->with('message', 'Blog updated successfully.');
    }
    public function blogDelete($id)
    {
        $blog = Blog::findOrFail($id);
        // Delete the image if it exists
        if ($blog->image && file_exists(public_path($blog->image))) {
            unlink(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->route('admin.blog')->with('message', 'Blog deleted successfully.');
    }

    // contact section
    public function contact()
    {
        $contacts = Contact::all();
        return Inertia::render('admin/dashboard/LandingPage/Contact', compact('contacts'));
    }

     public function contactDelete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contact')->with('message', 'contact deleted successfully.');
    }
    
    // client says section
    public function clientSays()
    {
        return Inertia::render('admin/dashboard/LandingPage/ClientSay');
    }

     public function document()
    {
        return Inertia::render('document/Document');
    }
}
