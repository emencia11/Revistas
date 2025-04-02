<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Revista</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Crear Revista</h1>
        <form action="{{ route('revistas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">ISSN</label>
                <input type="text" name="ISSN" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="number" name="numero" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de Publicación</label>
                <input type="number" name="anio_publicacion" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('revistas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>

