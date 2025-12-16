<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
    Controlador Producto
 */
class ProductoController extends Controller
{
    /*
    Constructor
    */
    public function __construct()
    {
        // Intencionalmente vacío por ahora
        // El modelo se integrará más adelante
    }

    /*
        LISTADO CON FILTROS
     */
    public function index(Request $request)
    {
        // Capturamos el filtro desde la URL (?filtro=activos)
        $filtro = $request->query('filtro');

        /*
         * ⚠️ Aquí irá la lógica del modelo más adelante
         * En CodeIgniter:
         * $this->productoModel->where(...)->findAll();
         */

        // Retornamos la vista (por ahora sin datos)
        return view('productos', [
            'titulo'       => 'Listado de Productos',
            'productos'    => [],
            'filtroActual' => $filtro
        ]);
    }

    /*
        DETALLE DEL PRODUCTO
     */
    public function detalle($sku)
    {
        /*
         * Aquí luego irá:
         * $this->productoModel->find($sku)
         */

        // Si no hay producto, simulamos 404
        abort(404, 'Producto no encontrado');
    }

    /**
     * 3️⃣ BUSCADOR
     */
    public function buscar($termino)
    {
        /*
         * Aquí luego irá la búsqueda por nombre
         */

        return view('productos', [
            'titulo'    => 'Resultados de búsqueda: ' . $termino,
            'productos' => []
        ]);
    }

    /**
     * 4️⃣ CAMBIAR ESTADO
     */
    public function cambiarEstado($sku, $estado)
    {
        /*
         * Aquí luego irá:
         * update estado
         */

        return redirect()->to("/productos/detalle/{$sku}");
    }

    /**
     * 5️⃣ FILTRAR PRODUCTOS POR ESTADO
     */
    public function filtrar($estado)
    {
        /*
         * Aquí luego irá el filtro por estado
         */

        return view('productos', [
            'productos' => []
        ]);
    }
}
