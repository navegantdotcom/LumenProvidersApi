<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',        
        'direccion',
        'colonia',
        'estado',
        'cp',        
        'rfc',
        'telefono',
        'movil',
        'correo',
        'contrato',
    ];
}
