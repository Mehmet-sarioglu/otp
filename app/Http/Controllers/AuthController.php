<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(Request $request) {
//        $credentials = $request->validate([
//            'phoneNum'=> ['required', 'number'],
//        ]);
        /** @var \App\Models\User $user */
        $isuser = User::where('phoneNum', '=', $request->phoneNum)->first();
        if ($isuser === null) {
            $user = new User();
            $user->phoneNum = $request->phoneNum;
            $user->save();
        }
        $currentUser=User::where('phoneNum', '=', $request->phoneNum)->first();
        Auth::login($currentUser);
        $user = Auth::user();
        return $this->authenticated($request, $user);

    }
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
