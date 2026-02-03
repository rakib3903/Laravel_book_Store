<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function goHome(){
        $books = Book::where('email', auth()->user()->email)->get();
        return view('home', ['books' => $books]);
    }

    public function registerForm(){
        return view('auth.register');
    }
    public function loginForm(){
        return view('auth.login');
    }

    public function logout(){
        auth()->logout();

        return redirect("/login");
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            "email" => "required|email|unique:users,email",
            "password" =>"required|min:6"
        ]);
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        return redirect()->route('loginpage');
    }


    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with('error', 'Email not found');
        }
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()->with('error', 'Password is incorrect');;
        }
        auth()->login($user);
        return redirect("/")->with('success', 'Logged in successfully');;
    }
}
