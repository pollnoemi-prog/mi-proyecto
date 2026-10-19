<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Sucursal;
use App\Models\Producto;

class BienvenidaController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        $sucursales = Sucursal::all();
        $productos = Producto::all();

        return view('bienvenida', compact(
            'clientes',
            'sucursales',
            'productos'
        ));
    }
}
