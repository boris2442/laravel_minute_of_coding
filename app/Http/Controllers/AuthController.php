<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    //
    public function showSignUp(){ // si l'utilisateur est connecter renvoie le vers la route dashboard si non,,, renvoie le vers la page register...
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function signUp(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        return back()->with('success', 'Inscription reussi... Un email de bienvenue  a ete envoye');
    }
}
