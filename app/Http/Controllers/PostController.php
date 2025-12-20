<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
=======
use App\Models\Producto; // Este modelo lo creamos para manejar la tabla productos
use Illuminate\Support\Facades\DB;
>>>>>>> Stashed changes

class PostController extends Controller
{
    /**
<<<<<<< Updated upstream
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
=======
     * Muestra el listado (Index)
     * Url: /posts
     */
    public function index()
        {
            // 1. Pedimos todas las plantas a la base de datos
            $productos = Producto::all();

            // 2. Se las enviamos a la vista 'productos.blade.php'
            return view('productos', compact('productos'));
        }
>>>>>>> Stashed changes

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
