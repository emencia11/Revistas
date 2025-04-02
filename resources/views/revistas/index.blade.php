<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Revistas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Lista de Revistas</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('revistas.create') }}" class="btn btn-primary">Crear Revista</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>ISSN</th>
                    <th>Número</th>
                    <th>Año de Publicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revistas as $revista)
                    <tr>
                        <td>{{ $revista->titulo }}</td>
                        <td>{{ $revista->ISSN }}</td>
                        <td>{{ $revista->numero }}</td>
                        <td>{{ $revista->anio_publicacion }}</td>
                        <td>
                            <a href="{{ route('revistas.edit', $revista) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('revistas.destroy', $revista) }}" method="POST" style="display:inline;" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('revistas.articulos', $revista) }}" class="btn btn-info">Ver Artículos</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript para confirmación de eliminación -->
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                if (!confirm('¿Estás seguro de que deseas eliminar esta revista?')) {
                    event.preventDefault();
                }
            });
        });
    </script>
</body>
</html>