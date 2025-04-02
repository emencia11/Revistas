<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    
    <h1 class="text-center mb-4 text-danger">Eliminar Artículo</h1>

    <table class="table table-bordered">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Página Inicio</th>
                <th>Página Fin</th>
                <th>Año</th>
                <th>Número</th>
                <th>Revista</th>
                <th>Autores</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $articulo->id }}</td>
                <td>{{ $articulo->titulo }}</td>
                <td>{{ $articulo->pagina_inicio }}</td>
                <td>{{ $articulo->pagina_fin }}</td>
                <td>{{ $articulo->anio }}</td>
                <td>{{ $articulo->numero }}</td>
                <td>{{ $articulo->revista->titulo }}</td>
                <td>
                    <ul class="list-unstyled">
                        @foreach ($articulo->autores as $autor)
                            <li>{{ $autor->nombre }} (Posición: {{ $autor->pivot->posicion }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="/articulo/{{ $articulo->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Confirmar Eliminación</button>
        <a href="/articulo" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
