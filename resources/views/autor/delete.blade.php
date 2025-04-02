<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4 text-danger">Eliminar Autor</h1>
    <form action="/autor/{{$autor->id}}" method="POST" class="p-4 bg-white rounded shadow-sm">
        @csrf
        @method('DELETE')
        <div class="mb-3">
            <label for="id" class="form-label">Registro</label>
            <input type="text" class="form-control" name="id" id="id" value="{{$autor->id}}" readonly>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="{{$autor->nombre}}" readonly>
        </div>
        <button type="submit" class="btn btn-danger w-100">Confirmar Eliminación</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
