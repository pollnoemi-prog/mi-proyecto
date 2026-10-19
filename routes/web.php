<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\DepartamentoSucursalController;
use App\Http\Controllers\BienvenidaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

// RUTA 4: protege el panel y los listados; se abren después de iniciar sesión.
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
   
// RUTA 2: /dashboard llama al index para mostrar la tabla de productos en el panel
    // Ruta de productos
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard'); 

    
    // Productos
    Route::get('/productos', [ProductoController::class, 'index'])
    ->name('productos.index');

    Route::post('/productos', [ProductoController::class, 'store'])
    ->name('productos.store');

    Route::put('/productos/{id}', [ProductoController::class, 'update'])
    ->name('productos.update');

    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])
    ->name('productos.destroy');



    // RUTA 2: /dashboard llama al index para mostrar la tabla de categorias en el panel
    // Ruta de categorías
    Route::get('/categoria-productos',   [CategoriaProductoController::class, 'index'])
        ->name('categoria_productos.index');
    
    Route::post('/categoria-productos', [CategoriaProductoController::class, 'store'])
        ->name('categoria_productos.store');

    Route::put('/categoria-productos/{id}', [CategoriaProductoController::class, 'update'])
        ->name('categoria_productos.update');

    Route::delete('/categoria-productos/{id}', [CategoriaProductoController::class, 'destroy'])
        ->name('categoria_productos.destroy');


    
    // RUTA 2: /dashboard llama al index para mostrar la tabla de clientes en el panel
    // Ruta de clientes
    Route::get('/clientes', [ClienteController::class, 'index'])
        ->name('clientes.index');
    
    Route::post('clientes', [ClienteController::class, 'store'])
    ->name('clientes.store');
// 
    Route::put('/clientes/{id}', [ClienteController::class, 'update'])
    ->name('clientes.update');

    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])
    ->name('clientes.destroy');
    

        // RUTA 2: /dashboard llama al index para mostrar la tabla de sucursal en el panel
    // Ruta de sucursales
    Route::get('/sucursales', [SucursalController::class, 'index'])
        ->name('sucursales.index');
    
    Route::post('/sucursales', [SucursalController::class, 'store'])
        ->name('sucursales.store');

    Route::put('/sucursales/{id}', [SucursalController::class, 'update'])
        ->name('sucursales.update');

    Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy'])
        ->name('sucursales.destroy');

    // RUTA 2: /dashboard llama al index para mostrar la tabla de envios en el panel
    // Ruta de envíos
    Route::get('/envios', [EnvioController::class, 'index'])
        ->name('envios.index');
    
    // RUTA 2: /dashboard llama al index paSra mostrar la tabla de departamentosucursal en el panel
    // Ruta de departamentos de sucursales
    Route::get('/departamento-sucursales', [DepartamentoSucursalController::class, 'index'])
        ->name('departamento_sucursales.index');

});

Route::get('/productos_lista', [ProductoController::class, 'index']);
Route::get('/bienvenida', [BienvenidaController::class, 'index']);
Route::get('/home', [DashboardController::class, 'index']);

//tiene que ser modal el formulario de registro
//modal:para las cuatro tablas un boton de agregar,eliminar,editas.
//en la misma vista tiene que estar todo 
//componetns modal copiar y pegar y darle funcion 
//metodos con sus respectivos controladores 
// medtodos de update en laravel
//ver, editar, crear y eliminar
//un modal por accion 
// chat.js dompdf y exportacion de word excel
//integracion en cruds
//