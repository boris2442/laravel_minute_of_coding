<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    //
    public function showSignUp(){
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
        return back()->with('success', 'Inscription reussi... Un emmail a ete envoye');
    }
}
