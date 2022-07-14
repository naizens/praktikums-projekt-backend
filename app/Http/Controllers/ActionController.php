<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller {

    public function index(){
        return view("login");
    }

    public function submit(\Illuminate\Http\Request $request){
        $user = Person::where(
            "userName", $request->input("username")

        )->get();
        if($user->count() > 0){
            $person = $user->first();
            if($person->checkPassword($request->input("password"))){
                $session = bin2hex(random_bytes(8));
                $request->session()->put("userSession", $session);
                $person->session = $session;
                $person->save();
                return redirect("/kalender");
            }
        }
    }
    public function logout(\Illuminate\Http\Request $request){
        $user = Auth::user();
        $user->session = null;
        $user->save();
        $request->session()->forget('userSession');
        return redirect("/login");
    }


}
