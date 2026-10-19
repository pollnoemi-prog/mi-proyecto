<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartamentoSucursal;

class DepartamentoSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta todas las categorias mediante el modelo DepartamentoSucursales
        $departamento_sucursales = DepartamentoSucursal::all();

        //Entrega la colección a la vista que dibuja la tabla HTML
        return view('departamento_sucursal-list', compact('departamento_sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
