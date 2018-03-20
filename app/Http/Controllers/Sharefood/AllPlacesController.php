<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\Place;

class AllPlacesController extends Controller
{
    public function index()
    {
        $getAlls = Place::orderBy('created_at', 'DESC')->paginate();

        return view('share_foods.all_places', compact('getAlls'));
    }

    public function show(Place $place)
    {
        return view('share_foods.show');
    }
}
