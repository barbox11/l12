<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;

// Página principal ( / )
Route::get('/', [HomeController::class, 'index']);

// Ruta alternativa /inicio
Route::get('/inicio', [HomeController::class, 'index']);


// Listado principal de productos
Route::get('/productos', [ProductoController::class, 'index']);

//  Buscador de productos
Route::get('/productos/buscar/{termino}', [ProductoController::class, 'buscar']);

// Detalle de producto por SKU
Route::get('/productos/detalle/{sku}', [ProductoController::class, 'detalle']);

//  Cambiar estado de un producto
Route::get(
    '/productos/estado/{id}/{estado}',
    [ProductoController::class, 'cambiarEstado']
);

// Filtrar productos por estado
Route::get(
    '/productos/filtrar/{estado}',
    [ProductoController::class, 'filtrar']
);