<?php

namespace App\Http\Controllers;

use App\Mail\Confirmacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public  function register()
    {
        return view('formulario');
    }

    public  function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|unique:users'
        ]);


        //generar token 
        $token = uniqid();

        $user =  User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'token' => $token,
        ]);

        //**Enviar notificacion al mail */
        $user->enviarEmail();

        return redirect()->route('mensaje', ['user' => $user]);
    }

    public function confirmar(Request $request)
    {
        $token = $request->token;
        if (!$token) {
            return redirect()->route('register');
        }
        $user = User::where('token', $token)->first();
        if (empty($user)) {
            return redirect()->route('register');
        }

        $user->confirmado = 1;
        $user->token = '';

        $user->save();


        return view('confirmar', ['user' => $user]);
    }

    public  function show()
    {
        $users = User::all();
        return view('lista', ['users' => $users]);
    }

    public  function mensaje(Request $request)
    {

        $user = User::find($request->user);
        if (empty($user)) {
            return redirect()->route('register');
        }
        return view('mensaje', ['user' => $user, 'alerta' => '']);
    }

    public  function reenviar(Request $request)
    {

        $user = User::find($request->id);
        if (empty($user)) {
            return redirect()->route('register');
        }
        $user->enviarEmail();
        return view('mensaje', ['alerta' => 'Se reenvio el email al correo proporcionado en el registro', 'user' => $user]);
    }
}
