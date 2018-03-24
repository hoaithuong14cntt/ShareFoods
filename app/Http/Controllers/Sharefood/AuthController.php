<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request()->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                dd('admin');
            } else {
                // $request->session()->flash('msg', trans('auth.noaccess'));

                return redirect()->route('sharefood.index');
            }
        }
    }
}
