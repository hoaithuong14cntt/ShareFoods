<?php

namespace App\Http\Controllers\Sharefood;

use App\Contact;
// use App\Mail\SendMail;
use App\Http\Controllers\Controller;
use App\Place;
use Auth;

// use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

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
            $contact = request()->only('title', 'content');
            $contact = [
                'user_id' => $user->id,
                'title' => $contact['title'],
                'content' => $contact['content'],
            ];

            Contact::created($contact);
            // Mail::to($contact['email'])->send(new SendMail($contact));
            return view('share_foods.contact');
        }
    }
}
