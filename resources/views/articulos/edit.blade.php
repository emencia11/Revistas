<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    
    <h1 class="text-center mb-4">Editar Artículo</h1>

    <form action="/articulo/{{ $articulo->id }}" method="POST" class="border p-4 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">ID</label>
            <input type="text" class="form-control" name="id" value="{{ $articulo->id }}" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" value="{{ $articulo->titulo }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Página de Inicio</label>
            <input type="number" class="form-control" name="pagina_inicio" value="{{ $articulo->pagina_inicio }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Página Fin</label>
            <input type="number" class="form-control" name="pagina_fin" value="{{ $articulo->pagina_fin }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Revista</label>
            <select class="form-select" name="revista_id" required>
                @foreach ($revistas as $revista)
                    <option value="{{ $revista->id }}" 
                        {{ $revista->id == $articulo->revista_id ? 'selected' : '' }}>
                        {{ $revista->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Año</label>
            <input type="number" class="form-control" name="anio" value="{{ $articulo->anio }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="number" class="form-control" name="numero" value="{{ $articulo->numero }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="/articulo" class="btn btn-secondary">Cancelar</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
