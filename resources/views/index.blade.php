<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Acciones</title>
</head>
<body>
    <h1>Menú de Acciones</h1>
    <ul>
        <li><a href="{{ url('/notes/add') }}">Agregar Nota</a></li>
        <li><a href="{{ url('/notes/show') }}">Ver Notas</a></li>
    </ul>
</body>
</html>