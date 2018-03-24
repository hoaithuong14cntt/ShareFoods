<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;

class AllPlacesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $getAlls = Place::paginate();

        if (isset($search) && 'interested' == $search) {
            $getAlls = Place::orderBy('favorites_count', 'DESC')->paginate();
        }

        if (isset($search) && 'news' == $search) {
            $getAlls = Place::orderBy('created_at', 'DESC')->paginate();
        }

        return view('share_foods.all_places', compact('getAlls'));
    }

    public function show(Place $place)
    {
        return view('share_foods.show', compact('place'));
    }
}
