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
}
