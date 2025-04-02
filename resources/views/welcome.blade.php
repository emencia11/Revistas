<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        header, footer {
            width: 100%;
            background-color: #343a40;
            color: white;
            text-align: center;
            height: 60px; 
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
        }

        header {
            top: 0;
        }

        footer {
            bottom: 0;
        }

        main {
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100%;
            padding: 20px;
            margin-top: 60px; 
            margin-bottom: 60px; 
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .menu-buttons {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .menu-buttons a {
            display: inline-block;
            padding: 15px 30px;
            font-size: 1.5rem;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 10px;
            text-align: center;
            width: 200px;
            transition: background 0.3s;
        }

        .menu-buttons a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h2>Sistema de Revistas</h2>
    </header>

    <main>
        <h1>Bienvenido al Menú Principal</h1>
        <div class="menu-buttons">
            <a href="/revistas">Revistas</a>
            <a href="/articulo">Artículos</a>
            <a href="/autor">Autores</a>
        </div>
    </main>

    <footer>
        &copy; 2025, Grupo N4 | Todos los Derechos Reservados
    </footer>

</body>
</html>