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

    public function show(Request $request, $id)
    {
        dump($request->status);
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
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
