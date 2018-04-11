<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Prefecture;
use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::paginate();

        return view('admin.staffs.index', compact('staffs'));
    }

    public function show(Request $request, Staff $staff)
    {
        $numPlace = $staff->places()->count();
        $numUserFollows = $staff->followers()->count();

        $tabs = $request->only('tab');
        $tab = 'followers';
        if (!empty($tabs)) {
            $tab = $tabs['tab'];
        }

        $status = $request->only('status');

        if (!empty($status) && (0 == $status['status'])) {
            $staff->status = 1;
        } else {
            $staff->status = 0;
        }

        $staff->save();

        return view('admin.staffs.show', compact('staff', 'numPlace', 'numUserFollows', 'tab'));
    }

    public function destroy(Staff $staff)
    {
        if (!empty($staff)) {
            if ($staff->delete()) {
                return redirect()->route('admin.staffs.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }

    public function edit(Staff $staff)
    {
        $prefectures = Prefecture::all();

        return view('admin.staffs.edit', compact('staff', 'prefectures'));
    }

    public function update(Request $request, Staff $staff)
    {
        $rules = [
            'email' => 'email|max:255|unique:users,email,' . $staff->id,
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
            $input['password'] = $staff->password;
        }

        $update = $staff->update($input);

        if (!$update) {
            dd('co loi');
        }

        return redirect()->route('admin.staffs.show', ['staff' => $staff->id]);
    }
}
