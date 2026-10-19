<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaProducto;

class CategoriaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta todas las categorias mediante el modelo CategoriaProducto
        //compact toma la variable categorias y eso hace que lo muestre a la vista
        $categorias = CategoriaProducto::all();

        //Entrega la colección a la vista que dibuja la tabla HTML
        return view('categoria_producto-list', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:500',
        ]);

        CategoriaProducto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categoria_productos.index')
            ->with('success', 'Categoría agregada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);

        return response()->json($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);

        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:500',
        ]);

        $categoria = CategoriaProducto::findOrFail($id);

        $categoria->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categoria_productos.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaProducto::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categoria_productos.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}
