<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('id', Auth::user()->id)->first();
            if (sizeof($user->employee) > 0) {
                return redirect()->route('user.dashboard')->with('success',  'Berhasil login!');
            }
            return redirect()->route('admin.dashboard')->with('success', 'Berhasil login!');
        }
        return redirect()->back()->with('error', 'Oops, harap check email atau password kamu!');
    }
}
