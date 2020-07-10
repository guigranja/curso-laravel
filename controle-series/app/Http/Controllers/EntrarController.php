<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar.index');
    }

    public function entrar(Request $request)
    {
        /*
         * Tentativa de login
         * @return true or false
         *
         * Salva na sessão que existe um usuario. E o usuario são os dados passados.
         * */
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()
                ->back()
                ->withErrors('Usuario e/ou senha incorretos');
        }

        return redirect()->route('listar_series');
    }
}
