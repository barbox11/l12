<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Importante: Dile que use la tabla 'productos' (la que ya tienes llena de plantas)
    protected $table = 'productos'; 

    // Estos son los campos que permitiremos guardar desde el formulario
    protected $fillable = [
        'nombre',
        'sku',
        'stock',
        'valor',
        'descripcion',
        'estado'
    ];

    // Si tu tabla en la base de datos NO tiene columnas created_at y updated_at
    // debes poner esto en false, si no, te dará error al guardar.
    public $timestamps = false; 
}