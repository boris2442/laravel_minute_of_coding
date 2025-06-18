<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        $request->validate([
          'name'=>'required|string|max:255',  
          'email'=>'required|email|unique:users,email',  
          'password'=>'required|string|min:5|confirmed',  
        ]);
            $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Mail::to($user->email)->send(new WelcomeMail($user));
        return back()->with('success', 'Inscription reussi... Un email de bienvenue  a ete envoye');
    }
}
