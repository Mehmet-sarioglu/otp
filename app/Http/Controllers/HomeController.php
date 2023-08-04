<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $user=Auth::user();
        return view('index',compact('user'));

    }
    public function nameEdit(Request $request){
        if ($request->userName){
            $user1=Auth::user();
            $user=User::findorfail($user1->id);
            $user->name=$request->userName;
            $user->save();
            return response()->json(['success'=>'ok']);
        }
    }
}
