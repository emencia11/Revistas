<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h1 class="text-center mb-4">Lista de Artículos</h1>

<a href="/articulo/crear" class="btn btn-primary mb-3">Crear Artículo</a>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Página Inicio</th>
            <th>Página Fin</th>
            <th>Año</th>
            <th>Número</th>
            <th>Revista</th>
            <th>Autores</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($darticulo as $articulo)
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
                <td><a href="/articulo/editar/{{ $articulo->id }}" class="btn btn-warning btn-sm">Editar</a></td>
                <td><a href="/articuloa/{{ $articulo->id }}" class="btn btn-danger btn-sm">Eliminar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>