<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\Prefecture;
use App\User;
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
}
