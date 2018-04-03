<?php

namespace App\Http\Controllers\Sharefood;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Place;
use Auth;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        $placeNews = Place::orderBy('created_at', 'DESC')->offset(0)->limit(8)->get();
        $placeInteresteds = Place::orderBy('favorites_count', 'DESC')->offset(0)->limit(8)->get();

        return view('share_foods.index', compact('placeNews', 'placeInteresteds'));
    }

    public function search()
    {
        return view('share_foods.search');
    }

    public function contact()
    {
        return view('share_foods.contact');
    }

    public function sendContact(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $input = request()->only('title', 'content');
            $contact = [
                'name' => $user->lastname . " " . $user->firstname,
                'email' => $user->email,
                'user_id' => $user->id,
                'title' => $input['title'],
                'content' => $input['content'],
                'phone' => $user->phone,
                'address' => $user->address,
            ];

            Mail::to($contact['email'])->send(new SendMail($contact));

            $user->contacts()->create($input);

            return view('share_foods.contact');
        }
    }
}
