<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        if ($notes -> isEmpty()) {

            $data = [
                'message' => 'No hay datos registrados',
                'status' => 200
            ];

            return response()->json($data, 404);
        }

        return response()->json($notes, 200);
    }

    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'titulo' => 'required|max:255',
        'autor' => 'required',
        'cuerpo' => 'required',
        'clasificacion' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/notes/add')
                    ->withErrors($validator)
                    ->withInput();
    }

    $note = Note::create([
        'titulo' => $request->titulo,
        'autor' => $request->autor,
        'cuerpo' => $request->cuerpo,
        'clasificacion' => $request->clasificacion,
    ]);

    if (!$note) {
        return redirect('/notes/add')->with('error', 'Error al crear la nota');
    }

    return redirect('/notes')->with('success', 'Nota creada exitosamente');
}


    public function show($id)
    {
        $note = Note::find($id);

        if(!$note) {
            $data = [
                'message' => 'Nota Encontrada',
                'status' => 404
            ];
            return response()->json($data,404);
        }

        $data = [
            'student' => $note,
            'status' => 200
        ];
        return response()->json($data, 200);
    }

    public function showgeneral()
    {
        $notes = Note::all();

        return view('show', ['notes' => $notes]);
    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if(!$note) {

            $data = [
                'message' => 'Nota no encontrada',
                'status' => 404
            ];
            return response()->json($data,404);

        }

        $note->delete();

        $data = [
            'message' => 'Nota Eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        if(!$note) {

            $data = [
                'message' => 'Nota no encontrada',
                'status' => 404
            ];
            return response()->json($data,404);

        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:255',
            'autor' => 'required',
            'cuerpo' => 'required',
            'clasificacion' => 'required',
        ]);
        if($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errores' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
        
        $note->titulo = $request->titulo;
        $note->autor = $request->autor;
        $note->cuerpo = $request->cuerpo;
        $note->clasificacion = $request->clasificacion;

        $note-> save();

        $data = [
            'message' => 'Nota Actualizada',
            'note' => $note,
            'status' => 200
        ];
        return response()->json($data, 200);




    }


    public function updatePartial(Request $request, $id)
    {
        $note = Note::find($id);
        if(!$note) {

            $data = [
                'message' => 'Nota no encontrada',
                'status' => 404
            ];
            return response()->json($data,404);

        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'max:255',
            'autor',
            'cuerpo',
            'clasificacion',
        ]);
        if($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                'errores' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        if($request->has('titulo')) {
            $note->titulo = $request->titulo;
        }

        if($request->has('autor')) {
            $note->autor = $request->autor;
        }

        if($request->has('cuerpo')) {
            $note->cuerpo = $request->cuerpo;
        }

        if($request->has('clasificacion')) {
            $note->clasificacion = $request->clasificacion;
        }
        
        $note-> save();

        $data = [
            'message' => 'Nota Actualizada',
            'note' => $note,
            'status' => 200
        ];
        return response()->json($data, 200);




    }

    






}
