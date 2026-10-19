<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta todas las categorias mediante el modelo Cliente
        $clientes = Cliente::all();

        //Entrega la colección a la vista que dibuja la tabla HTML
        return view('cliente-list', compact('clientes'));
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
    //Guarda un nuevo cliente
    public function store(Request $request)
    {
            $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        Cliente::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    //Consultar un nuevo cliente.
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //Editar un cliente
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return response()->json($cliente);
    
    }

    /**
     * Update the specified resource in storage.
     */
    //Actualizar un nuevo cliente
    public function update(Request $request, string $id)
    {
            $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    //Eliminar un cliente
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')
        ->with('success', 'Cliente eliminado correctamente.');
    }
}
