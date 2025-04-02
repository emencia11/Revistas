<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista Autores</h1>
    <a href="/autor/create" class="btn btn-primary mb-3">Crear Autor</a>
    <table class="table table-striped border">
        <thead class="table-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Adscripción</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dautor as $autor)
            <tr>
                <td>{{$autor->id}}</td>
                <td>{{$autor->nombre}}</td>
                <td>{{$autor->correo_electronico}}</td>
                <td>{{$autor->adscripcion}}</td>
                <td><a href="/autor/{{$autor->id}}/edit" class="btn btn-warning btn-sm">Editar</a></td>
                <td><a href="/autor/{{$autor->id}}/eliminar" class="btn btn-danger btn-sm">Eliminar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
