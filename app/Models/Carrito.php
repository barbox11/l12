<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    //Los campos que se pueden llenar en la tabla
    protected $fillable = [
        'user_id',
        'producto_sku',
        'cantidad',
    ];

    public function product(){
        return $this->belongsTo(Producto::class, 'producto_sku', 'sku');
    }
}
