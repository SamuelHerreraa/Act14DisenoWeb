<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Notas</title>
</head>
<body>
    <h1>Todas las Notas</h1>
    <ul>
        @foreach($notes as $note)
            <li>
                <strong>Título:</strong> {{ $note->titulo }}<br>
                <strong>Autor:</strong> {{ $note->autor }}<br>
                <strong>Cuerpo:</strong> {{ $note->cuerpo }}<br>
                <strong>Clasificación:</strong> {{ $note->clasificacion }}<br>
                
                <!-- Botones -->

                <form method="POST" action="{{ route('notes.delete', $note->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                
                <hr>
            </li>
        @endforeach
        <a href="{{ url('/notes') }}">Volver</a>
    </ul>
</body>
</html>