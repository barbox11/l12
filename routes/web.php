<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PostController;

/*
RUTAS PRINCIPALES
*/

// Página principal
Route::get('/', [HomeController::class, 'index']);

// Ruta alternativa /inicio
Route::get('/inicio', [HomeController::class, 'index']);

/*
RUTAS DE PRODUCTOS
*/

// Listado de productos
Route::get('/productos', [ProductoController::class, 'index']);

// Buscar productos por término
Route::get('/productos/buscar/{termino}', [ProductoController::class, 'buscar']);

// Ver detalle de un producto por SKU
Route::get('/productos/detalle/{sku}', [ProductoController::class, 'detalle']);

// Cambiar estado del producto (ADD / INA)
Route::get(
    '/productos/estado/{sku}/{estado}',
    [ProductoController::class, 'cambiarEstado']
);

// Filtrar productos por estado
Route::get(
    '/productos/filtrar/{estado}',
    [ProductoController::class, 'filtrar']
);

Route::resource('posts', PostController::class);