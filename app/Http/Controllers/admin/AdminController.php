<?php

namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AbiaGallery;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Donate;
use App\Models\FAQ;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\GeneralDetail;
use App\Models\Program;
use App\Models\Project;
use App\Models\Role;
use App\Models\SiteSetting;
use App\Models\Team;
use App\Models\Volunteer;
use App\Permission;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }


        public function adminIndex()
    {
         $contacts = ContactMessage::all();
         $messages    = ContactMessage::count();
         $posts    = Project::count();
         $careers    = Volunteer::count();
         $services    = Donate::count();
         $clients = Client::count();
         $feedbacks = Feedback::orderBy('id', 'desc')->get();
         $feedbackscount = Feedback::count();

        return view('cms.index', compact('clients','contacts', 'messages', 'posts', 'careers', 'services','feedbacks', 'feedbackscount'));
    }

        public function site_configuration(Request $request)
    {

        $contacts = ContactMessage::all();
        $messages    = ContactMessage::count();

        return view('cms.settings', compact('contacts', 'messages'));
    }

       public function site_configuration_update(Request $request)
    {
        $data = array(
            'hotline'   => $request->hotline,
            'hotline2'   => $request->hotline2,
            'site_name' => $request->site_name,
            'site_email'    => $request->site_email,
            'site_address'  => $request->site_address,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'linkedin'    => $request->linkedin,
            'instagram' => $request->instagram,
        );

        if($request->hasFile('logo'))
        {
            $logo = $request->logo;

            $file_name  = 'Logo' . time() . '.' . $logo->getClientOriginalExtension();
            $base_dir = public_path() . '/logos';
            $db_location = 'logos/' . $file_name;
            $location   = $base_dir . '/' . $file_name;

            if(!file_exists($base_dir))
            {
                mkdir($base_dir, 666, true);
            }
            Image::make($logo)->resize(207, 57, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $data['logo']  = $db_location;
        }

        $validator = Validator::make($data, [
            'hotline'   => 'nullable|string|max:20',
            'hotline2'   => 'nullable|string|max:20',
            'site_name' => 'nullable|string|max:50',
            'site_email'    => 'nullable|string|max:100',
            'site_address'  => 'nullable|string',
            'facebook'  => 'nullable|string|max:100',
            'twitter'   => 'nullable|string|max:100',
            'linkedin'    => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',

        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $site_config = SiteSetting::find(1);

        if($site_config)
        {
            Session::flash('success', 'Site details successfully updated.');
            $site_config->update($data);
        }
        else
        {
            Session::flash('success', 'Site details successfully created.');
            SiteSetting::create($data);
        }
        return redirect()->back();
    }

    public function Homeintro()
    {
         $general = GeneralDetail::first();
         $site = SiteSetting::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();

        return view('cms.homeintro', compact(['general', 'contacts', 'messages', 'site']));
    }

    public function AdminDonations()
    {
         $general = GeneralDetail::first();
         $site = SiteSetting::first();
         $donations = Donate::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.donations', compact(['general', 'messages', 'donations', 'site', 'contacts']));
    }

    public function AdminProjects()
    {
         $general = GeneralDetail::first();
         $site = SiteSetting::first();
         $donations = Project::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.projects', compact(['general', 'messages', 'donations', 'site', 'contacts']));
    }

    public function AdminCoporate()
    {
         $general = GeneralDetail::first();
         $site = SiteSetting::first();
         $donations = Corperate::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.corporate', compact(['general', 'messages', 'donations', 'site', 'contacts']));
    }

    public function AdminIndividuals()
    {
         $general = GeneralDetail::first();
         $site = SiteSetting::first();
         $donations = Individual::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.individuals', compact(['general', 'messages', 'donations', 'site', 'contacts']));
    }


    public function AdminFundRaise()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $volunteers = FundRace::where('status', 1)->orderBy('id', 'desc')->get();
         $site = SiteSetting::first();

        return view('cms.fundraise', compact(['general', 'contacts', 'site','messages', 'volunteers']));
    }

    public function AdminFundRaisers()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $fundracers = FundRacepay::where('status', 1)->orderBy('id', 'desc')->get();
         $site = SiteSetting::first();

        return view('cms.fundraisers', compact(['general', 'contacts', 'site','messages', 'fundracers']));
    }

    public function AdminVolunteer()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $volunteers = Volunteer::where('status', 1)->orderBy('id', 'desc')->get();
         $site = SiteSetting::first();

        return view('cms.volunteers', compact(['general', 'contacts', 'site','messages', 'volunteers']));
    }

    public function AdminPendingVolunteer()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $volunteers = Volunteer::where('status', 0)->orderBy('id', 'desc')->get();
         $site = SiteSetting::first();

        return view('cms.pending_volunteers', compact(['general', 'contacts', 'site','messages', 'volunteers']));
    }

    public function AdminPendingFeedback()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $volunteers = Feedback::where('status', 0)->orderBy('id', 'desc')->get();
         $site = SiteSetting::first();

        return view('cms.pending_feedbacks', compact(['general', 'contacts', 'site','messages', 'volunteers']));
    }


    public function AdminEvents()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $site = SiteSetting::first();
        $upcoming = Program::orderBy('id', 'desc')->get();



        return view('cms.upcoming', compact(['general', 'contacts', 'messages', 'site', 'upcoming']));
    }

    public function AdminFaq()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $site = SiteSetting::first();
         $faqs = FAQ::orderBy('id', 'desc')->get();

        return view('cms.faqs', compact(['general', 'contacts', 'messages', 'site', 'faqs']));
    }

    public function AdminGallery()
    {
        $sliders = GeneralDetail::first();
        $galleries = Gallery::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();
        $feedbacks = Feedback::all();
        $site = SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.gallery', compact(['sliders', 'messages', 'feedbacks', 'galleries', 'site', 'contacts']));
    }

    public function RTV()
    {
        $galleries = AbiaGallery::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();
        $roles = Category::all();
        $posts_category = Category::all();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();

        return view('cms.rtvabia', compact(['messages', 'galleries', 'contacts', 'roles', 'posts_category']));
    }

    public function AdminClients()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $clients    = Client::all();
         $site = SiteSetting::first();

        return view('cms.clients', compact(['general', 'contacts', 'messages', 'clients', 'site']));
    }



    public function AdminTermsofUse()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages = ContactMessage::count();
         $site = SiteSetting::first();

        return view('cms.terms', compact(['general', 'site','contacts', 'messages']));
    }


    public function AdminPrivacy()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $site = SiteSetting::first();

        return view('cms.privacy', compact(['general', 'contacts', 'messages', 'site']));
    }




    public function AdminAbout()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $teams = Team::all();
         $site = SiteSetting::first();

        return view('cms.about', compact(['general', 'contacts', 'messages','site', 'teams']));
    }



    public function AdminContact()
    {
         $general = GeneralDetail::first();
         $contacts = ContactMessage::orderBy('id', 'desc')->get();
         $messages    = ContactMessage::count();
         $site = SiteSetting::first();

        return view('cms.contact', compact(['general', 'contacts', 'messages', 'site']));
    }


        public function AdminSliders()
    {
        $sliders = GeneralDetail::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $general = GeneralDetail::first();
        $messages    = ContactMessage::count();
        $site = SiteSetting::first();

        return view('cms.slider', compact(['sliders', 'general', 'contacts', 'messages', 'site']));
    }




    public function AdminFeedback()
    {
        $sliders = GeneralDetail::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();
        $feedbacks = Feedback::all();
        $site = SiteSetting::first();

        return view('cms.feedbacks', compact(['sliders', 'messages', 'feedbacks', 'contacts', 'site']));
    }



    public function deleteContactMessage($id)
    {
        $contacts = ContactMessage::find($id);

        if($contacts) {
            $contacts->delete();
            return response()->json("200");
        }
        return response()->json("404");
    }




      public function store (Request $request, $page) {

        if ($page == 'addcategory') {

            $slug = Str::slug($request->name);

            $data = array(
                'name'   => $request->name,
                'slug' => $slug,

            );

            Category::create($data);

            Session::flash('success', 'Category successfully created.');

            return redirect()->back();

        }

        if ($page == 'gallery') {

            $data = array(
                'title'   => $request->title,


            );

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'gallery/'. $name;

                Image::make($image)->resize(729, 486, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;

            }

            Gallery::create($data);

            Session::flash('success', 'Image added successfully.');

            return redirect()->back();

        }

        if ($page == 'abiagallery') {

            $data = array(
                'title'   => $request->title,
                // 'body'   => $request->body,
                'category'   => $request->category,


            );

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'abiagallery/'. $name;

                Image::make($image)->resize(729, 486, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;

            }

            AbiaGallery::create($data);

            Session::flash('success', 'Gallery added successfully.');

            return redirect()->back();

        }


        if ($page == 'upcomingevent') {

            $slug = Str::slug($request->title);
            $data = array(
                'title'   => $request->title,
                'slug' => $slug,
                'date'   => $request->date,
                'time'   => $request->time,
                'location'   => $request->location,
                'body'   => $request->body,

            );

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(729, 486, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;

            }

            Program::create($data);

            Session::flash('success', 'Program created successfully.');

            return redirect()->back();

        }


        if ($page == 'addteammember') {

            $data = array(
                'name'   => $request->name,
                'job_title' => $request->job_title,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'role' => $request->role,
                'instagram' => $request->instagram,
            );

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(270, 274, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;

            }

            Team::create($data);

            Session::flash('success', 'Team Member created successfully.');

            return redirect()->back();

        }

        if ($page == 'projects') {
            $slug = Str::slug($request->title);


            $data = array(
                'title'   => $request->title,
                'slug' => $slug,
                'date'   => $request->date,
                'body'   => $request->body,

            );


            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(729, 486, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;

            }

            Project::create($data);

            Session::flash('success', 'Project created successfully.');

            return redirect()->back();

        }



        if ($page == 'feedbacks') {

            $data = array(
                'title'   => $request->title,
                'name'   => $request->name,
                'body'   => $request->body,
            );

            if($request->hasFile('image'))
            {
                $image = $request->image;
                $file = $request->file('image');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(600, 295, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['image'] = $location;
            }

            Feedback::create($data);

            Session::flash('success', 'Feedback successfully created.');

            return redirect()->back();

        }


        if ($page == 'clients') {

            $data = array(
                'image'        => NULL,
                'url'   => $request->url,
            );

            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $file->move('img/', $name);
                $data['image'] = "img/" .$name;
                $data['thumb'] = "img/" .$name;
            }

            $create = Client::create($data);
            Session::flash('success', 'Client created successfully.');
            return redirect()->back();

        }


    }





       public function destroy ($page, $id) {

        if ($page == 'upcomingevent') {

            $delete = Program::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Program deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'gallery') {

            $delete = Gallery::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Gallery deleted successfully.');
            return redirect()->back();

        }

        if ($page == 'abigallery') {

            $delete = AbiaGallery::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Gallery deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'projects') {

            $delete = Project::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Project deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'donations') {

            $delete = Donate::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Donation deleted successfully.');
            return redirect()->back();

        }



        if ($page == 'teams') {

            $delete = Team::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Team Member deleted successfully.');
            return redirect()->back();

        }

        if ($page == 'volunteers') {

            $delete = Volunteer::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Volunteer deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'pendingvolunteers') {

            $delete = Volunteer::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', ' Pending Volunteer deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'pendingfeedbacks') {

            $delete = Feedback::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', ' Pending Feedback deleted successfully.');
            return redirect()->back();

        }


        if ($page == 'faqs') {

            $delete = FAQ::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'FAQ deleted successfully.');
            return redirect()->back();

        }

        if ($page == 'roles') {

            $delete = Role::find($id);


            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Role deleted successfully.');
            return redirect()->back();

        }

            if ($page == 'contacts') {



            $delete = ContactMessage::destroy($id);

            if ($delete == null) {

                return abort(404);

            }

            Session::flash('success', 'ContactMessage Deleted successfully!');

            return redirect()->back();

        }

        if ($page == 'categories') {



            $delete = Category::destroy($id);

            if ($delete == null) {

                return abort(404);

            }

            Session::flash('success', 'Category Deleted successfully!');

            return redirect()->back();

        }


            if ($page == 'clients') {

            $delete = Client::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Client deleted successfully.');
            return redirect()->back();

        }

        if ($page == 'feedbacks') {

            $delete = Feedback::find($id);

            @unlink($delete->image);

            if(!$delete)
            {
                abort(404);
            }

            $delete->delete();
            Session::flash('success', 'Feedback deleted successfully.');
            return redirect()->back();

        }



    }

        public function deleteslider ($slider) {

        if  ($slider == 'slider1') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            $data = array(
                'slider1' => NULL,
            );

            @unlink($update->slider1);

            $update->update($data);
            Session::flash('success', 'Deleted successfully.');
            return redirect()->back();

        }

        if  ($slider == 'slider2') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            $data = array(
                'slider2' => NULL,
            );

            @unlink($update->slider2);

            $update->update($data);
            Session::flash('success', 'Deleted successfully.');
            return redirect()->back();

        }

        if  ($slider == 'slider3') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            $data = array(
                'slider3' => NULL,
            );

            @unlink($update->slider3);

            $update->update($data);
            Session::flash('success', 'Deleted successfully.');
            return redirect()->back();

        }

        if  ($slider == 'slider4') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            $data = array(
                'slider4' => NULL,
            );

            @unlink($update->slider4);
            $update->update($data);
            Session::flash('success', 'Deleted successfully.');
            return redirect()->back();

        }

        if  ($slider == 'slider5') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            $data = array(
                'slider5' => NULL,
            );

            @unlink($update->slide5);
            $update->update($data);
            Session::flash('success', 'Deleted successfully.');
            return redirect()->back();

        }

    }


        public function update(Request $request, $page,  $id) {


        if  ($page == 'homeintro') {

            $data = array(
                'home_intro' => $request->home_intro,
            );

            $update = GeneralDetail::findorfail($id);

            if($request->hasFile('introimage'))
            {
                $image = $request->introimage;
                $file = $request->file('introimage');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(600, 424, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['introimage'] = $location;

                @unlink($update->introimage);

            }


            $update->update($data);

            Session::flash('success', 'Home intro  successfully updated.');

            return redirect()->back();

        }




        if  ($page == 'about') {

            $data = array(
                'about_content' => $request->aboutcontent,
            );

            $update = GeneralDetail::findorfail($id);

            if($request->hasFile('aboutimage'))
            {
                $image = $request->aboutimage;
                $file = $request->file('aboutimage');
                $name = $file->getClientOriginalName();

                $location = 'img/'. $name;

                Image::make($image)->resize(600, 424, function ($constraint) {
                    $constraint->aspectRatio();})->save($location);

                $data['about_image'] = $location;

                @unlink($update->about_image);

            }

            $update->update($data);

            Session::flash('success', 'About  successfully updated.');

            return redirect()->back();

        }


        if  ($page == 'whychooseus') {

            $data = array(
                'whychooseus_writeup' => $request->whychooseus_writeup,
            );

            $update = GeneralDetail::findorfail($id);


            $update->update($data);

            Session::flash('success', 'Why ChooseUs successfully updated.');

            return redirect()->back();

        }

        if  ($page == 'privacypolicy') {

            $data = array(
                'privacy_policy' => $request->privacy_policy,
            );

            $update = GeneralDetail::findorfail($id);


            $update->update($data);

            Session::flash('success', 'Privacy Policy successfully updated.');

            return redirect()->back();

        }

        if  ($page == 'termsofuse') {

            $data = array(
                'terms_of_use' => $request->terms_of_use,
            );

            $update = GeneralDetail::findorfail($id);


            $update->update($data);

            Session::flash('success', 'Terms of Use successfully updated.');

            return redirect()->back();

        }


    }


       public function sliders (Request $request, $slider)  {

        if  ($slider == 'slider1') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            if($request->hasFile('slider1'))
            {
                @unlink($update->slider1);

                $file = $request->file('slider1');

                $image = $request->slider1;

                $name = $file->getClientOriginalName();
                $file->move('revolution/assets/', $name);
                $location = 'revolution/assets/' . $name;
                $data['slider1'] = $location;

            } else {
                $data = array(
                    'header1' => $request->header1,
                    'sub_header1' => $request->sub_header1,
                );
            }

            $update->update($data);
            Session::flash('success', 'Slider content updated.');
            return redirect()->back();

        }

        if  ($slider == 'slider2') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            if($request->hasFile('slider2'))
            {
                @unlink($update->slider2);
                $file = $request->file('slider2');

                $image = $request->slider2;

                $name = $file->getClientOriginalName();
                $file->move('revolution/assets/', $name);
                $location = 'revolution/assets/' . $name;
                $data['slider2'] = $location;
            } else {
                $data = array(
                    'header2' => $request->header2,
                    'sub_header2' => $request->sub_header2,
                );
            }

            $update->update($data);
            Session::flash('success', 'Slider content updated.');
            return redirect()->back();

        }

        if  ($slider == 'slider3') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            if($request->hasFile('slider3'))
            {
                @unlink($update->slider3);
                $file = $request->file('slider3');

                $image = $request->slider3;

                $name = $file->getClientOriginalName();
                $file->move('revolution/assets/', $name);
                $location = 'revolution/assets/' . $name;
                $data['slider3'] = $location;
            } else {
                $data = array(
                    'header3' => $request->header3,
                    'sub_header3' => $request->sub_header3,
                );
            }

            $update->update($data);
            Session::flash('success', 'Slider content updated.');
            return redirect()->back();

        }

        if  ($slider == 'slider4') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            if($request->hasFile('slider4')) {
                @unlink($update->slider4);
                $file = $request->file('slider4');

                $image = $request->slider4;

                $name = $file->getClientOriginalName();
                $file->move('revolution/assets/', $name);
                $location = 'revolution/assets/' . $name;
                $data['slider4'] = $location;
            } else {
                $data = array(
                    'header4' => $request->header4,
                    'sub_header4' => $request->sub_header4,
                );
            }

            $update->update($data);
            Session::flash('success', 'Slider content updated.');
            return redirect()->back();

        }

        if  ($slider == 'slider5') {

            $update = GeneralDetail::find(1);

            if(!$update)
            {
                abort(404);
            }

            if($request->hasFile('slider5')) {
                @unlink($update->slider5);
                $file = $request->file('slider5');

                $image = $request->slider5;

                $name = $file->getClientOriginalName();
                $file->move('img/', $name);
                $location = 'img/' . $name;
                $data['slider5'] = $location;
            } else {
                $data = array(
                    'header5' => $request->header5,
                    'sub_header5' => $request->sub_header5,
                );
            }

            $update->update($data);
            Session::flash('success', 'Slider content updated.');
            return redirect()->back();

        }

    }




    public function Updatecreed(Request $request)
    {
        $data = array(
            'who_we_are'   => $request->who_we_are,
            'what_we_do' => $request->what_we_do,

        );



        $site_config = GeneralDetail::find(1);

        if($site_config)
        {
            Session::flash('success', 'successfully updated.');
            $site_config->update($data);
        }
        else
        {
            Session::flash('success', ' successfully created.');
            GeneralDetail::create($data);
        }
        return redirect()->back();
    }




    public function teamupdate(Request $request, $id) {

        $data = array(
            'name'   => $request->name,
            'job_title' => $request->job_title,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'role' => $request->role,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        );

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $file = $request->file('image');
            $name = $file->getClientOriginalName();

            $location = 'img/'. $name;

            Image::make($image)->resize(270, 274, function ($constraint) {
                $constraint->aspectRatio();})->save($location);

            $data['image'] = $location;

        }

        $update = Team::findorfail($request->id);

        @unlink($update->image);

        $update->update($data);

        Session::flash('success', 'Team Member successfully updated.');

        return redirect()->back();

    }


    public function pendingvolunteerShow ($id) {
        $post = Volunteer::findorfail($id);
        return $post;
    }

    public function teamshow ($id) {
        $post = Team::findorfail($id);
        return $post;
    }

    public function pendingfeedbacksShow ($id) {
        $post = Feedback::findorfail($id);
        return $post;
    }

    public function projectShow ($id) {
        $post = Project::findorfail($id);
        return $post;
    }

    public function Faqshow ($id) {
        $post = FAQ::findorfail($id);
        return $post;
    }



    public function UpcomingEventshow ($id) {
        $post = Program::findorfail($id);
        return $post;
    }

    public function Pendingvolunteerupdate(Request $request, $id) {

        $data = array(
            'status'   => $request->status,

        );


        $update = Volunteer::findorfail($request->id);

        $update->update($data);

        Session::flash('success', 'Volunteer successfully updated.');

        return redirect()->back();

    }

    public function ProjectUpdate(Request $request, $id) {
        $slug = Str::slug($request->title);


        $data = array(
            'title'   => $request->title,
            'slug' => $slug,
            'date'   => $request->date,
            'body'   => $request->body,

        );

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $file = $request->file('image');
            $name = $file->getClientOriginalName();

            $location = 'img/'. $name;

            Image::make($image)->resize(1169, 538, function ($constraint) {
                $constraint->aspectRatio();})->save($location);

            $data['image'] = $location;

        }


        $update = Project::findorfail($request->id);

        $update->update($data);

        Session::flash('success', 'Project successfully updated.');

        return redirect()->back();

    }

    public function Pendingfeedbacksupdate(Request $request, $id) {

        $data = array(
            'status'   => $request->status,

        );


        $update = Feedback::findorfail($request->id);


        $update->update($data);

        Session::flash('success', 'Feedback successfully updated.');

        return redirect()->back();

    }



    public function UpcomingEventUpdate(Request $request, $id) {
        $slug = Str::slug($request->title);

        $data = array(
            'title'   => $request->title,
            'body' => $request->body,
            'date' => $request->date,
            'time' => $request->time,
            'slug' => $slug,
            'location' => $request->location,
        );

        if($request->hasFile('image'))
        {
            $image = $request->image;
            $file = $request->file('image');
            $name = $file->getClientOriginalName();

            $location = 'img/'. $name;

            Image::make($image)->resize(1169, 538, function ($constraint) {
                $constraint->aspectRatio();})->save($location);

            $data['image'] = $location;

        }

        $update = Program::findorfail($request->id);

        @unlink($update->image);

        $update->update($data);

        Session::flash('success', 'Program successfully updated.');

        return redirect()->back();

    }




    public function allUsers() {

        $roles  = Role::all();
        $admins = Admin::all();
        $site = SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();


        return view('cms.users', [
            'roles'     =>  $roles,
            'admins'    =>  $admins,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts


        ]);
    }

    public function createAccount(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   =>  $request->role_id,
        );

        $validator = Validator::make($request->all(), [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191|unique:users',
            'password'  =>  'required|string|min:6|confirmed',
            'role_id'   =>  'required|numeric'
        ], [
            'role_id.required'  =>  'You need to assign a role to this user!'
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Account could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        Admin::create($data);
        Session::flash('success', 'Admin account successfully created for: ' . $data['name']);

        return redirect()->back();
    }

    public function editAccount(Request $request, $id) {
        $admin = Admin::find($id);
        $roles = Role::all();
        $site = SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();

        return view('cms.users_edit', [
            'admin' =>  $admin,
            'roles' =>  $roles,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts
        ]);
    }

    public function updateAccount(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'role_id'   =>  $request->role_id,
        );

        $validator = Validator::make($request->all(), [
            'name'      =>  'required|string|max:191',
            'email'     =>  'required|string|email|max:191',
            'role_id'   =>  'required|numeric'
        ], [
            'role_id.required'  =>  'You need to assign a role to this user!'
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Account could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        $admin = Admin::find($request->id);
        $admin->update($data);
        Session::flash('success', 'Admin account successfully updated.');
        return redirect()->route('cms.users.index');
    }
    public function deleteAccount ($id) {
        Admin::destroy($id);
        Session::flash('success', 'Admin Deleted successfully!');
        return redirect()->back();
    }

    public function roleDestroy ($id) {
        Role::destroy($id);
        Session::flash('success', 'Role Deleted successfully!');
        return redirect()->back();
    }


    public function roles(Request $request) {


        $roles = Role::all();
        $site = SiteSetting::first();
        $contacts = ContactMessage::orderBy('id', 'desc')->get();
        $messages    = ContactMessage::count();
        if($request->query('role')) {
            $id = $request->query('role');
            $role = Role::find($id);
            if(count($role) <= 0) {
                Session::flash('error', 'Role not found!');
                return redirect()->back();
            }
            $permissions = Permission::where('role_id', $role->id)->first();
            $site = SiteSetting::first();
            $contacts = ContactMessage::orderBy('id', 'desc')->get();
            $messages    = ContactMessage::count();


            return view('cms.roles', [
                'roles'         =>  $roles,
                'permission'    =>  $permissions,
                'site'      =>  $site,
                'messages'      =>  $messages,
                'contacts'      =>  $contacts
            ]);
        }

            return view('cms.roles', [
            'roles' =>  $roles,
            'site'      =>  $site,
            'messages'      =>  $messages,
            'contacts'      =>  $contacts


        ]);
    }



    public function createRole(Request $request) {
        $data = array(
            'title'         =>  $request->title,
            'description'   =>  $request->description

        );

        $validator = Validator::make($request->all(), [
            'title'         =>  'required|string|max:191',
            'description'   =>  'nullable|string',
        ]);

        if($validator->fails()) {
            Session::flash('fail', 'Role could not be created!');
            return redirect()->back()->withErrors($validator);
        }

        $role = Role::create($data);
        $permissions = array(
            'role_id'              =>  $role->id,
            'home_component'          =>  "no",
            'demo_request'        =>  "no",
            'service'           =>  "no",
            'product'       =>  "no",
            'settings'        =>  "no",
            'pages'     =>  "no",
            'careers'           =>  "no",
            'user_module'            =>  "no",

        );
        Permission::create($permissions);
        Session::flash('success', 'New role successfully created. You can now configure permission for role: ' . $data['title']);
        return redirect()->back();
    }







}
