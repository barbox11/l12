<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //Muestra la página de login
    public function showLoginForm() {
        return view('login');
    }

    // Procesa los datos
    public function loginCustom(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // REDIRECCIÓN AL CARRITO CON MENSAJE
            return redirect()->route('carrito.index')
                ->with('bienvenida', "Bienvenido " . Auth::user()->name . ", ya puedes iniciar con el proceso de compra de tus productos");
        }

        return back()->withErrors(['email' => 'Correo o clave incorrectos.'])->withInput();
    }
}
