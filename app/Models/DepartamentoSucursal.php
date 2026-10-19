<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartamentoSucursal extends Model
{
    protected $table = 'departamento_sucursales';

    protected $fillable = [
        'nombre',
        'descripcion',
        'encargado',
    ];
}