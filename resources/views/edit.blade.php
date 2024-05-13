<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
</head>
<body>
    <h1>Editar Nota</h1>
    <form method="POST" action="{{ route('notes.update', $note->id) }}">
        @csrf
        @method('PUT')
        <label for="titulo">Título:</label><br>
        <input type="text" id="titulo" name="titulo" value="{{ $note->titulo }}"><br>
        <label for="autor">Autor:</label><br>
        <input type="text" id="autor" name="autor" value="{{ $note->autor }}"><br>
        <label for="cuerpo">Cuerpo:</label><br>
        <textarea id="cuerpo" name="cuerpo">{{ $note->cuerpo }}</textarea><br>
        <label for="clasificacion">Clasificación:</label><br>
        <input type="text" id="clasificacion" name="clasificacion" value="{{ $note->clasificacion }}"><br>
        <br>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
