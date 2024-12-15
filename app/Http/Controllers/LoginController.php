<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;


class LoginController extends Controller
{
    public function index()
    {

        $message = "";
        $url = route('loginvarify');
        $data = compact('message', 'url');
        return view('SIH_H/login')->with($data);
    }

    public function loginvarify(Request $request)
    {
        $request->validate(
        [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->get()->first();

        if (is_null($user)) {
            $message = "Invalid username";
            $url = route('loginvarify');
            $data = compact('message','url');
            return view('SIH_H/login')->with($data);
        }

        if (Hash::check($request->input('password'), $user->password)) {

            $userId = $user->id;
            $role = $user->role;

            $request->Session()->put('user', $user->name);
            $request->Session()->put('email', $user->email);
            $request->Session()->put('UserId', $userId);
            $request->Session()->put('UserRole', $role);

            if ($role == 'user')
            {
                return redirect(route('home'));
            }
            else
            {
                return redirect(route('home'));
            }

        } else {
            $message = "Invalid password";
            $url=route('loginvarify');
            $data = compact('message', 'url');
            return view('SIH_H/login')->with($data);
        }
    }

    public function logout(Request $request)
    {
        // customauth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // For added security

        return redirect(route('login.show'));
    }
}
