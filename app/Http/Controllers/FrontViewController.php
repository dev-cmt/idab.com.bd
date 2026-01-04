<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Models\Admin\Gallery;
use App\Models\Admin\Event;
use App\Models\Master\MemberType;
use App\Models\Master\CommitteeType;
use App\Models\Admin\BlogPost;
use App\Models\Admin\Newsletter;
use App\Models\User;
use DB;

class FrontViewController extends Controller
{
    public function welcome()
    {
        $user = User::where('status', 1)->whereNotIn('id', [1, 2])->get();
        $add_hoc = $user->where('committee_type_id', 1);
        $executive = $user->where('committee_type_id', 2);
        $event = Event::where('status', 1)->get();
        $contact = Contact::where('status', 1)->get();
        $blog_post = BlogPost::where('status', 1)->where('is_home', true)->get();

        return view('welcome', compact('user', 'add_hoc', 'executive', 'event', 'contact', 'blog_post'));
    }
    /**________________________________________________________________________________________
     * About Menu Pages
     * ________________________________________________________________________________________
     */
    public function about()
    {
        return view('frontend.pages.about-us');
    }
    
    public function message()
    {
        return view('frontend.pages.message');
    }
    public function memorandum()
    {
        return view('frontend.pages.memorandum');
    }
    /**________________________________________________________________________________________
     * Committee Menu Pages
     * ________________________________________________________________________________________
     */
    public function committee($id)
    {
        $data = User::where('committee_type_id', $id)->where('status', 1)->get();
        $committeesType = CommitteeType::where('id', $id)->first();

        return view('frontend.pages.committee-member',compact('data', 'committeesType'));
    }
    /**________________________________________________________________________________________
     * Members Menu Pages
     * ________________________________________________________________________________________
     */

    public function member($id)
    {
        $data = User::where('member_type_id', $id)->where('status', 1)->orderByRaw('ISNULL(`index`), `index` ASC')->get();
    
        $membersType = MemberType::where('id', $id)->first()->name;
    
        return view('frontend.pages.member', compact('data', 'membersType'));
    }
    /**________________________________________________________________________________________
     * Why-be-member Menu Pages
     * ________________________________________________________________________________________
     */
    public function whyBeMember()
    {
        return view('frontend.pages.why-be-member');
    }
    /**________________________________________________________________________________________
     * Requirements Menu Pages
     * ________________________________________________________________________________________
     */
    public function requirements()
    {
        return view('frontend.pages.requirements');
    }
    public function requirementDetails()
    {
        return view('frontend.pages.requirements_details');
    }
    public function requirementStudent()
    {
        return view('frontend.pages.requirements_student');
    }
    /**________________________________________________________________________________________
     * Gallery Menu Pages
     * ________________________________________________________________________________________
     */
    public function galleryImage()
    {
        $posts=Gallery::where('public','=','1')->with('user')->get();
        return view('frontend.pages.gallery_album',compact('posts'));
    }
    public function galleryShow($id)
    {
        $posts=Gallery::findOrFail($id);
        return view('frontend.pages.gallery_image')->with('posts',$posts);
    }
    /**________________________________________________________________________________________
     * Events Menu Pages
     * ________________________________________________________________________________________
     */
    public function events()
    {
        $events =Event::where('status', 1)->paginate(12);
        return view('frontend.pages.events',compact('events'));
    }
    public function eventSearch(Request $request)
    {
        $query = Event::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }

        $events = $query->where('status', 1)->paginate(12);

        return view('frontend.pages.events', compact('events'));
    }

    public function eventShow($id)
    {
        $events =Event::latest()->orderByDesc('id')->take(10)->orderBy('id')->get();
        $data =Event::findOrFail($id);
        return view('frontend.pages.events_details',compact('events','data'));
    }
    /**________________________________________________________________________________________
     * Corporate Partners Menu Pages
     * ________________________________________________________________________________________
     */
    public function corporatePartners()
    {
        return view('frontend.pages.corporate-partners');
    }
    /**________________________________________________________________________________________
     * Blogs Menu Pages
     * ________________________________________________________________________________________
     */
    public function blogs()
    {
        $data = BlogPost::orderBy('publish_date', 'DESC')->paginate(10);
        return view('frontend.pages.blogs', compact('data'));
    }
    public function blogDetails($id)
    {
        $data = BlogPost::findOrFail($id);
        return view('frontend.pages.blog-details', compact('data'));
    }
    public function newsletter()
    {
        $data = Newsletter::orderBy('created_at', 'DESC')->paginate(12);
        return view('frontend.pages.newsletters', compact('data'));
    }
    /**________________________________________________________________________________________
     * Contact Menu Pages
     * ________________________________________________________________________________________
     */
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    /**________________________________________________________________________________________
     * Other Menu Pages
     * ________________________________________________________________________________________
     */
    public function termsCondition()
    {
        return view('frontend.pages.terms-condition');
    }
    public function privacyPolicy()
    {
        return view('frontend.pages.privacy-policy');
    }
    /**________________________________________________________________________________________
     * Comming Soon Page
     * ________________________________________________________________________________________
     */
    public function comming_soon()
    {
        return view('comming_soon');
    }
}
