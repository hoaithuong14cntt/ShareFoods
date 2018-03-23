<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\Place;

class HomeController extends Controller
{
    public function index()
    {
        $placeNews = Place::orderBy('created_at', 'DESC')->offset(0)->limit(8)->get();
        $placeInteresteds = Place::orderBy('favorites_count', 'DESC')->offset(0)->limit(8)->get();
//thuong
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
}
