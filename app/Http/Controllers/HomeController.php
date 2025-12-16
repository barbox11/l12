<?php

namespace App\Http\Controllers;

/*
Controlador Home
Se encarga de mostrar la página principal del sistema
 */
class HomeController extends Controller
{
    /*
        Muestra la vista de inicio
     */
    public function index()
    {
        // Retorna la vista "inicio"
        // Laravel busca el archivo en: resources/views/inicio.blade.php
        return view('inicio');
    }
}