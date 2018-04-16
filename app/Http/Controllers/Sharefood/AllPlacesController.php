<?php

namespace App\Http\Controllers\Sharefood;

use App\Category;
use App\Comment;
use App\Http\Controllers\Controller;
use App\Place;
use App\Prefecture;
use App\Rating;
use App\Save;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

            $place = Place::find($request->place_id);

            if (0 == $request->check_save) {
                if (!$check->first()) {
                    $place->saves()->attach(Auth::user()->id);
                }
            } else {
                if ($check->first()) {
                    $place->saves()->detach(Auth::user()->id);
                }
            }

            return redirect()->route('sharefood.show', ['place' => $place->id]);
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

    public function search(Request $request)
    {
        $categories = Category::all();
        $prefectures = Prefecture::all();

        $keyword = $request->keyword;

        if (isset($keyword)) {
            $places = Place::where('name', 'like', "%$keyword%")
                ->orWhere('address', 'like', "%$keyword%")->paginate();
        }

        return view('share_foods.search', compact('places', 'categories', 'prefectures'));
    }

    public function rate(Request $request)
    {
        $numRate = $request->num_rate;
        $placeId = $request->place_id;
        $input = [
            'user_id' => Auth::user()->id,
            'place_id' => $placeId,
            'rate' => $numRate,
        ];
        $check = Rating::where([
            ['user_id', '=', $input['user_id']],
            ['place_id', '=', $input['place_id']],
        ])->first();

        if (empty($check)) {
            DB::table('ratings')->insert($input);
        }

        Rating::where([
            ['user_id', '=', $input['user_id']],
            ['place_id', '=', $input['place_id']],
        ])->update(['rate' => $numRate]);

        return redirect()->route('sharefood.show', ['place' => $placeId]);
    }
}
