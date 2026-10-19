<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida a nuestra tienda</title>
</head>

<body>

    <h1>Bienvenido a nuestra tienda</h1>

    <p>Consulta la información de nuestros clientes, sucursales y productos.</p>

    <hr>

    <h2>Clientes registrados</h2>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>

        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->correo }}</td>
                <td>{{ $cliente->telefono }}</td>
            </tr>
        @endforeach
    </table>

    <br>

    <h2>Sucursales de la tienda</h2>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>

        @foreach($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->nombre }}</td>
                <td>{{ $sucursal->direccion }}</td>
                <td>{{ $sucursal->correo }}</td>
                <td>{{ $sucursal->telefono }}</td>
            </tr>
        @endforeach
    </table>

    <br>

    <h2>Productos disponibles</h2>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
        </tr>

        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->stock }}</td>
                <td>${{ $producto->precio }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>