<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('share_foods.profile');
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
