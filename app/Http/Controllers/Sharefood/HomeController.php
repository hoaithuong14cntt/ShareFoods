<?php

namespace App\Http\Controllers\Sharefood;

use App\Category;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Place;
use App\Prefecture;
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
        $categories = Category::all();
        $prefectures = Prefecture::all();
        $places = Place::where('is_published', 1)->paginate();

        return view('share_foods.search', compact('places', 'categories', 'prefectures'));
    }

    public function smartSearch(Request $request)
    {
        $categories = Category::all();
        $prefectures = Prefecture::all();

        $keyword = $request->keyword;
        $prefecture_id = $request->prefecture_id;
        $category_id = $request->category_id;
        $to_price = $request->to_price;

        $places = Place::where('is_published', 1);

        if (0 != $keyword) {
            $places->where(function ($query) use ($category_id) {
                $query->where('category_id', $category_id);
            });
        }

        if (0 != $prefecture_id) {
            $places->where(function ($query) use ($prefecture_id) {
                $query->where('prefecture_id', $prefecture_id);
            });
        }

        if (0 != $to_price) {
            $places->where(function ($query) use ($to_price) {
                $query->where('to_price', '<', $to_price);
            });
        }

        if (isset($keyword)) {
            $places->where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                    ->orWhere('address', 'like', "%$keyword%");
            });
        }

        $places = $places->paginate();

        return view('share_foods.search', compact('places', 'categories', 'prefectures'));
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
