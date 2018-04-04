<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::paginate();

        return view('admin.places.index', compact('places'));
    }

    public function show(Request $request, Place $place)
    {
        $tabs = $request->only('tab');
        $tab = 'favorites';
        if (!empty($tabs)) {
            $tab = $tabs['tab'];
        }

        $status = $request->only('status');

        if (!empty($status) && (0 == $status['status'])) {
            $place->is_published = 1;
        } else {
            $place->is_published = 0;
        }

        $place->save();

        return view('admin.places.show', compact('place', 'tab'));
    }

    public function destroy(Place $place)
    {
        if (!empty($place)) {
            if ($place->delete()) {
                return redirect()->route('admin.places.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
