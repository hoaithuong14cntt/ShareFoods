<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function destroy($user)
    {
        $user = User::find($user);

        if (!empty($user)) {
            if ($user->delete()) {
                return redirect()->route('admin.users.index');
            }
        } else {
            return 'co loi xay ra';
        }
    }
}
