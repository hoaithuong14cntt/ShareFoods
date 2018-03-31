<?php

namespace App\Http\Controllers\Sharefood;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function register()
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required|in:1,2',
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
            'gender',
        ]);

        $input['password'] = bcrypt(request('password'));

        $input['created_at'] = Carbon::now();
        $input['updated_at'] = Carbon::now();

        DB::table('users')->insert($input);

        return redirect()->route('sharefood.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->flash('msg', trans('messages.logout_success'));

        return redirect()->route('sharefood.index');
    }
}
