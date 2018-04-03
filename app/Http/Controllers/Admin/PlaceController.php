<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::paginate();

        return view('admin.places.index', compact('places'));
    }

    public function destroy($id)
    {
        $place = Place::find($id);

        if (!empty($place)) {
            if ($place->delete()) {
                return redirect()->route('admin.places.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
