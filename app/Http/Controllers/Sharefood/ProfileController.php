<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('share_foods.profile', compact('user'));
    }

    public function changePassword()
    {
        return view('share_foods.change_password');
    }

    public function save()
    {
        return view('share_foods.save');
    }
}
