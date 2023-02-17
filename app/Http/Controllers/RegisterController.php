<?php

namespace App\Http\Controllers;

use App\Mail\Confirmacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    // ** Retorna la el formulario de registro
    public  function register()
    {
        return view('formulario');
    }

    /** valida, registra y envia el email de confirmación  */
    public  function store(Request $request)
    {
        /** Validación */
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|unique:users'
        ]);


        //** Generar token 
        $token = uniqid();

        //** Inserta al usuario */
        $user =  User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'token' => $token,
        ]);

        //**Enviar notificacion al email */
        $user->enviarEmail();

        //**Redirige al mensaje de envio de email */
        return redirect()->route('mensaje', ['user' => $user]);
    }

    //**Funcion que confirma el email de un usuario */
    public function confirmar(Request $request)
    {
        //** Valida el token */
        $token = $request->token;
        if (!$token) {
            return redirect()->route('register');
        }

        //** Valida al usuario */
        $user = User::where('token', $token)->first();
        if (empty($user)) {
            return redirect()->route('register');
        }
        //** Limpia el token y marca como confirmado al usuario */

        $user->confirmado = 1;
        $user->token = '';

        //* Actualiza la informacion del usuario */
        $user->save();

        //* Retorna la vista de confirmación */
        return view('confirmar', ['user' => $user]);
    }

    //* Función que muestra a todos los usuarios en pantalla */
    public  function show()
    {
        $users = User::all();
        return view('lista', ['users' => $users]);
    }

    //* Funcíon que muestra el mensaje de envio de email */
    public  function mensaje(Request $request)
    {

        $user = User::find($request->user);
        if (empty($user)) {
            return redirect()->route('register');
        }
        return view('mensaje', ['user' => $user, 'alerta' => '']);
    }

    //** Función que envia nuevamente el email de confirmacion */
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
