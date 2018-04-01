<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('type', User::TYPES['user'])->paginate();

        return view('admin.users.index', compact('users'));
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
