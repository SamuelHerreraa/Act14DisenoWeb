<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nota</title>
</head>
<body>
    <h1>Agregar Nota</h1>
    <form method="POST" action="{{ url('/notes') }}">
        @csrf
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            @error('titulo')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
            @error('autor')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="cuerpo">Cuerpo:</label>
            <textarea id="cuerpo" name="cuerpo" required></textarea>
            @error('cuerpo')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="clasificacion">Clasificación:</label>
            <input type="text" id="clasificacion" name="clasificacion" required>
            @error('clasificacion')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">Agregar Nota</button>
    </form>
</body>
</html>