<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            'title' => 'Register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => 'required|min:8|unique:users'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registrasi telah berhasil, silahkan login!');

        return redirect('/login')->with('success', 'Registrasi telah berhasil, silahkan login!');
    }
}
