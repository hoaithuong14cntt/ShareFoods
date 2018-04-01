<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Place;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $countNewUsers = User::where('status', User::STATUS['inactive'])->count();

        $countNewPlaces = Place::where('is_published', Place::STATUS['unpublished'])->count();

        return view('admin.index', compact('countNewUsers', 'countNewPlaces'));
    }
}
