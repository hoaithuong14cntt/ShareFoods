<?php

namespace App\Http\Controllers\Sharefood;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Place;
use App\Save;
use Auth;
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
        $comments = Comment::with('user')->where('place_id', $place->id)->orderBy('created_at', 'DESC')->get();

        $place = $place->load('foods');
        $orthers = Place::where([
            ['category_id', '=', $place->category_id],
            ['id', '<>', $place->id],
        ])->get();

        return view('share_foods.show', compact('place', 'orthers', 'comments'));
    }

    public function save(Request $request)
    {
        if (request()->has('save')) {
            $check = Save::where([
                ['user_id', '=', Auth::user()->id],
                ['place_id', '=', $request->place_id],
            ])->get();

            if (!$check->first()) {
                $place = Place::find($request->place_id);

                $place->saves()->attach(Auth::user()->id);

                return redirect()->route('sharefood.show', ['place' => $place->id]);
            } else {
                dd('Da ton tai');
            }
        }
    }

    public function comment(Request $request)
    {
        if (request()->has('cmt')) {
            $rules = [
                'content' => 'required',
            ];

            $validator = validator(request()->all(), $rules);

            if ($validator->fails()) {
                return $validator->errors()->messages();
            }

            $input = request()->only([
                'content',
                'place_id',
            ]);

            $input['user_id'] = Auth::user()->id;

            Comment::create($input);

            return redirect()->route('sharefood.show', ['place' => $input['place_id']]);
        }
    }
}
