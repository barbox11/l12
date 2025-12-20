<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Este modelo lo creamos para manejar la tabla productos
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Pedimos todas las plantas a la base de datos
        $productos = Producto::paginate(10);

        // 2. Se las enviamos a la vista 'productos'
        // Usamos compact() para crear el array automáticamente
        return view('productos', compact('productos'));
    }

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
        //Creamos un nuevo producto
        $producto = new Producto();

        //Asignamos los valores recibidos del formulario
        $producto->sku = $request->input('sku');
        $producto->nombre = $request->input('nombre');
        $producto->valor = $request->input('valor');
        $producto->stock = $request->input('stock');
        $producto->descripción = $request->input('descripcion');
        $producto->estado = "activo"; // Al crear un producto, por defecto estará activo

        //Guardamos el producto en la base de datos
        $producto->save();

        //Redireccionamos con un mensaje de éxito
        return redirect()-> back()->with('success', 'Producto creado exitosamente. Recuerda subir la foto en la carpeta de img');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Buscamos el producto donde la columna 'sku' sea igual al $id recibido
        $producto = Producto::where('sku', $id)->first();

        // Si no existe, mostramos error 404
        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        // Si existe, mostramos la vista 'detalle'
        return view('detalle', compact('producto'));

    }
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
