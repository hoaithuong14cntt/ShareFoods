<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Prefecture;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', User::TYPES['user'])->paginate();

        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        $numSave = $user->notes()->count();
        $numFavorite = $user->favorites()->count();
        $numFollowStaff = $user->follows()->count();

        $tabs = $request->only('tab');
        $tab = 'favorites';
        if (!empty($tabs)) {
            $tab = $tabs['tab'];
        }

        $status = $request->only('status');

        if (!empty($status) && (0 == $status['status'])) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }

        $user->save();

        return view('admin.users.show', compact('user', 'numSave', 'numFavorite', 'numFollowStaff', 'tab'));
    }

    public function destroy(User $user)
    {
        if (!empty($user)) {
            if ($user->delete()) {
                return redirect()->route('admin.users.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }

    public function edit(User $user)
    {
        $prefectures = Prefecture::all();

        return view('admin.users.edit', compact('user', 'prefectures'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'email' => 'email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'password_confirm' => 'nullable|same:password|min:6',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'date_of_birth' => 'nullable|date|before:today',
            'gender' => 'in:1,2',
            'address' => '',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'max:13',
            'prefecture_id' => '',
            'memo' => '',
            'type' => 'in:1,2,3',
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
            'memo',
            'type',
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
        } else {
            $input['password'] = $user->password;
        }

        $update = $user->update($input);

        if (!$update) {
            dd('co loi');
        }

        return redirect()->route('admin.users.show', ['user' => $user->id]);
    }
}
