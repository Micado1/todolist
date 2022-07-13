<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
        $user = User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->pasword),
        ]);
        session()->flash('success', 'Успешно');
        Auth::login($user);
        return redirect()->route('tasks');
    }
    public function login()
    {
        return view('user.login');
    }
    
    public function sendlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])){
            return redirect()->route('tasks');
        }
        return redirect()->back()->with('error', 'Не верный логин или пароль');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
