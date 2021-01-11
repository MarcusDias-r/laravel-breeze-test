<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;  //
use Illuminate\Auth\Events\Registered;  // para login apos cadastro. Testar sem 
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;   // 
use Illuminate\Support\Facades\Hash;  // para utilização de senhas com hash

class TestController extends Controller
{   
    public function index()
    {
        return view('welcome');
    }
 
    public function login()
    {
        return view('test.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        return redirect(route('home'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        //$request->session()->invalidate();

        //$request->session()->regenerateToken();

        return redirect('/');
    }


    public function register()
    {
        return view('test.register');
    }

    // metodo para armazenamento e login apos cadastro
    public function doRegister(Request $request)
    {
        //Cria requisitos que devem ser cumpridos no preenchimento dos inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        //Responsável pelo cadastramento do usuário -- a utilização com Auth::login, fará com que o usuário seja logado automaticamente apos a criação
        Auth::login($user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]));
        return redirect(route('home'));
    }
}
