<?php

namespace App\Http\Controllers;

use App\Models\AbiaGallery;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\Gallery;
use App\Models\Partner;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $feedbacks  = Feedback::all();

        return view('welcome', compact('feedbacks'));
    }

    public function AboutUs()
    {

        return view('about');
    }

    public function ReadyToVote()
    {
        $clients = Client::all();
        $galleries = AbiaGallery::take(12)->inRandomOrder()->get();

        return view('readytovote', compact('clients', 'galleries'));
    }


    public function ContactUs()
    {

        return view('contact');
    }


    public function BecomeVolunteer()
    {

        return view('becomevolunteer');
    }

    public function Partner ()
    {

        $volunteers = Partner::where('status', 1)->get();

        return view('partner' , compact('volunteers'));
    }

    public function Volunteers()
    {

        $volunteers = Volunteer::where('status', 1)->get();

        return view('volunteers' , compact('volunteers'));
    }


    public function Donate()
    {

        $countries = Country::all();


        return view('donate' , compact('countries'));
    }

    public function Privacy()
    {
        return view('privacy');

    }

    public function Resources()
    {
        return view('resources');

    }

    public function Terms()
    {
        return view('terms');

    }

    public function Gallery()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(12);

        return view('gallery' , compact('galleries'));
    }

    public function postMessage(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'message'   =>  $request->message,
            'phone'     =>  $request->phone,
            'subject'   =>  $request->subject,
        );

        $validator = Validator::make($data, [
            'name'      =>  'required|string|max:50',
            'email'     =>  'required|email|max:50',
            'phone'     =>  'nullable|string|max:15|min:5',
            'subject'   =>  'required|string|max:40',
            'message'   =>  'required|string',
        ], [
            'name.required'     =>  'Name field is required. Please fill in your name.',
            'email.required'    =>  'E-Mail field is required. Please enter your e-mail address.',
            'email.email'       =>  'A valid e-mail is required as this will be our primary mode of contacting you for feedback.',
            'phone.nullable'     =>  'Phone field must not exceed 15 digits.',
            'subject.required'   =>  'Subject field Cannot be empty',
            'message.required'  =>  'Your forgot to type a message. Kindly write your message to proceed'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        $message = ContactMessage::create($data);
        Session::flash('success', 'Your message has been received and will be duly treated. We will contact you as soon as possible if need be.');
        Mail::to('info@nvdcng.com')->send(new \App\Mail\ContactMessage($message));
        return redirect()->back();
    }

    public function postVolunteer(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'purpose'   =>  $request->purpose,
            'phone'     =>  $request->phone,
            'sex'   =>  $request->sex,
            'nationality'   =>  $request->nationality,
            'address'   =>  $request->address,
            'status'   =>  $request->status=0,
            'publish'   =>  $request->publish,
        );


        $validator = Validator::make($data, [
            'name'      =>  'required|string|max:50',
            'email'     =>  'required|email|max:50',
            'phone'     =>  'required|string|max:15|min:5',
            'address'   =>  'nullable|string|max:100',
            'sex'   =>  'required',
            'publish'   =>  'required|string',
            'nationality'   =>  'required|string',
            'purpose'   =>  'required|string|max:191',
            'image' => 'mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required'     =>  'Name field is required. Please fill in your name.',
            'email.required'    =>  'E-Mail field is required. Please enter your e-mail address.',
            'email.email'       =>  'A valid e-mail is required as this will be our primary mode of contacting you for feedback.',
            'phone.required'     =>  'Phone field is required.',
            'phone.phone'        =>  'Phone field must not exceed 15 digits.',
            'sex.required'     =>  'Sex field is selection.',
            'nationality.required'     =>  'Nationality selection is required.',
            'purpose.required'  =>  'Your forgot to type a message. Kindly write your message to proceed',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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



        $message = Volunteer::create($data);
        Session::flash('success', 'Your request has been received ' . $data['name'] . ' We will contact you as soon as possible if need be thank you');
        Mail::to('info@nvdcng.com')->send(new \App\Mail\Volunteer($message));
        Mail::to($request->email)->send(new \App\Mail\JoinVolunteer($data));
        return redirect()->back();
    }

    public function postPartner(Request $request) {
        $data = array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'purpose'   =>  $request->purpose,
            'phone'     =>  $request->phone,
            'nationality'   =>  $request->nationality,
            'address'   =>  $request->address,
            'status'   =>  $request->status=0,
            'publish'   =>  $request->publish,
        );


        $validator = Validator::make($data, [
            'name'      =>  'required|string|max:50',
            'email'     =>  'required|email|max:50',
            'phone'     =>  'required|string|max:15|min:5',
            'address'   =>  'nullable|string|max:100',
            'publish'   =>  'required|string',
            'nationality'   =>  'required|string',
            'purpose'   =>  'required|string|max:191',
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ], [
            'name.required'     =>  'Name field is required. Please fill in your name.',
            'email.required'    =>  'E-Mail field is required. Please enter your e-mail address.',
            'email.email'       =>  'A valid e-mail is required as this will be our primary mode of contacting you for feedback.',
            'phone.required'     =>  'Phone field is required.',
            'phone.phone'        =>  'Phone field must not exceed 15 digits.',
            'nationality.required'     =>  'Nationality selection is required.',
            'purpose.required'  =>  'Your forgot to type a message. Kindly write your message to proceed',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

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



        $message = Partner::create($data);
        Session::flash('success', 'Your request has been received ' . $data['name'] . ' We will contact you as soon as possible if need be thank you');
        Mail::to('info@nvdcng.com')->send(new \App\Mail\Partner($message));
        Mail::to($request->email)->send(new \App\Mail\JoinPartner($data));
        return redirect()->back();
    }
}
