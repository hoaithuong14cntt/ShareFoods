<?php

namespace App\Http\Controllers\Sharefood;

use App\Category;
use App\Food;
use App\Http\Controllers\Controller;
use App\Place;
use App\Prefecture;
use App\Staff;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Webpatser\Uuid\Uuid;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $prefectures = Prefecture::all();

        return view('share_foods.profile', compact('user', 'prefectures'));
    }

    public function changePassword(User $user)
    {
        return view('share_foods.change_password', compact('user'));
    }

    public function save(User $user)
    {
        $places = $user->notes;

        return view('share_foods.save', compact('user', 'places'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'email' => 'email|max:255|unique:users,email,' . $user->id,
            'password' => 'min:6',
            'password_confirm' => 'same:password|min:6',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'date_of_birth' => 'date|before:today',
            'gender' => 'in:1,2',
            'address' => '',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'max:13',
            'prefecture_id' => '',
        ];

        $validator = validator(request()->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors()->messages();
        }

        $input = request()->only([
            'email',
            'password',
            'firstname',
            'lastname',
            'date_of_birth',
            'gender',
            'address',
            'avatar',
            'phone',
            'prefecture_id',
        ]);
        if (request()->has('avatar')) {
            $nameAvatarOld = $user->getOriginal()['avatar'];
            Storage::delete($nameAvatarOld);
            $avatar = request()->file('avatar');
            $imageName = Uuid::generate()->string . '.' . strtolower($avatar->getClientOriginalExtension());
            $fileUploaded = Storage::put($imageName, file_get_contents($avatar), 'public');

            if ($fileUploaded) {
                $input['avatar'] = $imageName;
            }
        }

        if (isset($input['password'])) {
            $input['password'] = bcrypt(trim($input['password']));
        }

        $th = $user->update($input);

        if (!$th) {
            dd('co loi');
        }

        return redirect()->route('sharefood.profile.index', ['user' => $user->id]);
    }

    public function placeOfStaff()
    {
        $staff = Staff::find(Auth::user()->id);
        $places = $staff->places()->orderBy('created_at', 'DESC')->paginate();

        return view('share_foods.place_of_staff', compact('places'));
    }

    public function createPlace()
    {
        $categories = Category::all();
        $prefectures = Prefecture::all();

        return view('share_foods.add_place', compact('categories', 'prefectures'));
    }

    public function storePlace(Request $request)
    {
        $rules = [
            'image' => 'required',
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'prefecture_id' => 'required|exists:prefectures,id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'from_price' => 'required',
            'to_price' => 'required',
            'discount' => 'required|numeric',
            'phone' => 'required|max:13',
            'description' => '',
            'content' => '',
            'address' => 'required',
        ];

        $validator = validator($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors()->messages();
        }

        $input = $request->only([
            'image',
            'name',
            'category_id',
            'prefecture_id',
            'lat',
            'lng',
            'start_time',
            'end_time',
            'from_price',
            'to_price',
            'discount',
            'phone',
            'description',
            'content',
            'address',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = 'places/' . Uuid::generate()->string . '.' . strtolower($image->getClientOriginalExtension());
            $fileUploaded = Storage::put($imageName, file_get_contents($image), 'public');

            if ($fileUploaded) {
                $input['image'] = $imageName;
            }
        }

        $input['user_id'] = Auth::user()->id;
        $input['is_published'] = Place::STATUS['unpublished'];

        $place = Place::create($input);

        if (!$place) {
            dd("co loi");
        }

        return redirect()->route('sharefood.profile.placeOfStaff');
    }

    public function deletePlaceOfStaff(Place $place)
    {
        if (!empty($place)) {
            if ($place->delete()) {
                return redirect()->route('sharefood.profile.placeOfStaff');
            }
        } else {
            return 'co loi xay ra';
        }
    }

    public function createFood(Place $place)
    {
        $place_id = $place->id;

        return view('share_foods.add_food', compact('place_id'));
    }

    public function storeFood(Request $request)
    {
        $rules = [
            'image' => 'required',
            'name' => 'required',
            'place_id' => 'required|exists:places,id',
            'description' => '',
            'content' => '',
            'price' => 'required|numeric',
        ];

        $validator = validator($request->all(), $rules);

        if ($validator->fails()) {
            return $validator->errors()->messages();
        }

        $input = $request->only([
            'image',
            'name',
            'place_id',
            'description',
            'content',
            'price',
        ]);

        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = 'places/foods/' . Uuid::generate()->string . '.' . strtolower($image->getClientOriginalExtension());
            $fileUploaded = Storage::put($imageName, file_get_contents($image), 'public');

            if ($fileUploaded) {
                $input['image'] = $imageName;
            }
        }

        $food = Food::create($input);

        if (!$food) {
            dd("co loi");
        }

        return redirect()->route('sharefood.profile.placeOfStaff');
    }
}
