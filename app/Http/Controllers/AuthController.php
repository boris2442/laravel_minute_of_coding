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
    public function showSignUp()
    { // si l'utilisateur est connecter renvoie le vers la route dashboard si non,,, renvoie le vers la page register...
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }
    public function showFormLogin()
    { // si l'utilisateur est connecter renvoie le vers la route dashboard si non,,, renvoie le vers la page register...
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);
        if (Auth::attempt($request->only("email", "password"))) {
            return redirect()->intended('dashboard');
        }
        return back()->with("errors" , "Les informations fournis ne correspondent pas!");
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:5|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Mail::to($user->email)->send(new WelcomeMail($user));
        return back()->with('success', 'Inscription reussi... Un email de bienvenue  a ete envoye');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // return redirect('/login');

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // la fonction pour la deconnexion

   
}
