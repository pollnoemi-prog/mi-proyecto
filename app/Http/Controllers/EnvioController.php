<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta todas las categorias mediante el modelo Envio
        $envios = Envio::all();

        //Entrega la colección a la vista que dibuja la tabla HTML
        return view('envio-list', compact('envios'));
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
             $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|integer|min:0',
            'correo' => 'required|numeric|min:0',
            'telefono' => 'required|numeric|min:0',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'direccion' => $request->stock,
            'correo' => $request->precio,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto agregado correctamente.');
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
