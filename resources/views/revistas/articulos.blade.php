<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos de la Revista: {{ $revista->titulo }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Artículos de la Revista: {{ $revista->titulo }}</h1>
        <a href="{{ route('revistas.index') }}" class="btn btn-secondary mb-3">Volver a Revistas</a>

        @if($articulos->isEmpty())
            <p>No hay artículos disponibles para esta revista.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Página Inicio</th>
                        <th>Página Fin</th>
                        <th>Año</th>
                        <th>Número</th>
                        <th>Revista</th>
                        <th>Autores</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
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
                            <td>
                                <a href="{{ route('articulo.edit', $articulo) }}" class="btn btn-warning btn-sm">Editar</a>

                                <!-- Confirmación para eliminar -->
                                <form action="{{ route('articulo.destroy', $articulo) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>