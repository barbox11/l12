<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
CONTROLADOR DE PRODUCTOS
*/
class ProductoController extends Controller
{
    /*
    LISTADO DE PRODUCTOS
    */
    public function index()
    {
        // Obtenemos todos los productos desde la base de datos
        $productos = DB::table('productos')
                    ->orderBy('valor', 'desc') 
                    ->get();

        // Enviamos los datos a la vista productos
        return view('productos', [
            'productos' => $productos
        ]);
    }

    /*
    DETALLE DE UN PRODUCTO
    */
    public function detalle($sku)
    {
        // Buscamos el producto por su SKU
        $producto = DB::table('productos')
            ->where('sku', $sku)
            ->first();

        // Si no existe, mostramos error 404
        if (!$producto) {
            abort(404, 'Producto no encontrado');
        }

        // Enviamos el producto a la vista detalle
        return view('detalle', [
            'producto' => $producto
        ]);
    }

    /*
    BUSCAR PRODUCTOS
    */
    public function buscar($termino)
    {
        // Buscamos productos por nombre
        $productos = DB::table('productos')
            ->where('nombre', 'LIKE', "%{$termino}%")
            ->get();

        return view('productos', [
            'productos' => $productos
        ]);
    }


    public function cambiarEstado($sku, $estado)
    {
        // Determinar qué nombre poner según el estado
    $nuevoNombre = ($estado == 'activo') ? 'activo' : 'inactivo';
    
    // Actualizamos el NOMBRE del producto
    DB::table('productos')
        ->where('sku', $sku)
        ->update([
            'nombre' => $nuevoNombre  // ← Ahora cambia el NOMBRE
        ]);

        // Redirigimos nuevamente al detalle del producto
        return redirect("/productos/detalle/{$sku}");
    }

    /*
    FILTRAR PRODUCTOS POR ESTADO
    */
    public function filtrar($estado)
    {
        // Filtramos los productos según su estado
        $productos = DB::table('productos')
            ->where('estado', $estado)
            ->get();

        return view('productos', [
            'productos' => $productos
        ]);
    }
}
