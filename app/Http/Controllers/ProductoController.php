<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtención de datos
        //Laravel consulta los datos de la tabla productos
        $productos = Producto::all();

        //preparar los datos antes de la vista
        $topStock = $productos
          ->sortByDesc(fn ($producto) => (int) $producto->stock)
          ->take(10)
          ->values();

          //convierte los datos de los registros en datos para la grafica
        $chartData = [
          'labels' => $topStock->pluck('nombre')->all(),
          'stock' => $topStock->pluck('stock')
            ->map(fn ($stock) => (int) $stock)
            ->all(),
        ];
        
        //El controlador retorna esos datos a la misma vista index
        return view('producto-list', compact('productos', 'chartData'));
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
    //Guarda un producto nuevo
        public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        Producto::create([
            'nombre' => $request->nombre,
            'stock' => $request->stock,
            'precio' => $request->precio,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    //Consultar un producto.
    public function show(string $id)
    {
         $producto = Producto::findOrFail($id);

        return response()->json($producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    //Editar un producto
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    //Actualizar un nuevo producto
    //indOrFail($id) busca el producto que quieres editar.
    //redirect() regresa al listado de productos.
    public function update(Request $request, string $id)
    {
            $request->validate([
            'nombre' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre' => $request->nombre,
            'stock' => $request->stock,
            'precio' => $request->precio,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    //Eliminar un nuevo producto
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')
         ->with('success', 'Producto eliminado correctamente.');
    }
}
