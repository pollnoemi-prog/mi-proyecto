<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class SucursalController extends Controller
{
    // Mostrar todas las sucursales
    public function index()
    {
        $sucursales = Sucursal::all();

        return view('sucursal-list', compact('sucursales'));
    }

    // Mostrar formulario de registro
    public function create()
    {
        //
    }

    // Registrar una sucursal
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        Sucursal::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal agregada correctamente.');
    }

    // Consultar una sucursal
    public function show(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);

        return response()->json($sucursal);
    }

    // Buscar una sucursal para editar
    public function edit(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);

        return response()->json($sucursal);
    }

    // Actualizar una sucursal
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        $sucursal = Sucursal::findOrFail($id);

        $sucursal->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal actualizada correctamente.');
    }

    // Eliminar una sucursal
    public function destroy(string $id)
    {
        $sucursal = Sucursal::findOrFail($id);

        $sucursal->delete();

        return redirect()->route('sucursales.index')
            ->with('success', 'Sucursal eliminada correctamente.');
    }
}
