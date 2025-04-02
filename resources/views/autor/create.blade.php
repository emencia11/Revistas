<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Autor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Crear Autor</h1>
    <form action="/autor" method="POST" class="p-4 bg-white rounded shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Escribe el nombre" required>
        </div>
        <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="correo_electronico" id="correo_electronico" placeholder="Correo electrónico" required>
        </div>
        <div class="mb-3">
            <label for="adscripcion" class="form-label">Adscripción</label>
            <input type="text" class="form-control" name="adscripcion" id="adscripcion" placeholder="Escribe la adscripción" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Guardar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
