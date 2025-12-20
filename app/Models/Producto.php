<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Importante: Dile que use la tabla 'productos' (la que ya tienes llena de plantas)
    protected $table = 'productos';

    // Importante: Dile que la clave primaria de la tabla es 'sku' para actvar el "deleted_at"
    protected $primaryKey = 'sku';
    public $incrementing = false;
    protected $keyType = 'string'; 

    // Estos son los campos que permitiremos guardar desde el formulario para crear un producto
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
