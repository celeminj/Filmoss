<?php
namespace App\Http\Controllers\Api;

use App\Models\Chat;
use Illuminate\Http\Request;
use App\Models\Evento_pelicula;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Chat::all());
    }

    /**
     * Obtener mensajes filtrados por película nueva, hora y usuario.
     */
    public function obtenerChatPorPeliculaYHora($peliculaId, $hora, $usuarioId)
    {
        $fechaHora = date('Y-m-d H:i:s', strtotime($hora));

        // Buscar el evento relacionado con la película y la hora
        $evento = Evento_pelicula::whereHas('ver_evento', function ($query) use ($peliculaId) {
            $query->where('pelicula_nueva_id', $peliculaId);
        })
        ->where('fecha_inicio', '<=', $fechaHora)
        ->where('fecha_final', '>=', $fechaHora)
        ->first();

        if (!$evento) {
            return response()->json(['error' => 'Evento no encontrado'], 404);
        }

        // Obtener los mensajes del chat relacionados con el evento y el usuario
        $mensajes = Chat::where('usuario_id', $usuarioId)
            ->where('evento_pelicula_id', $evento->id)
            ->with('usuario') // Asociar el usuario que envió el mensaje
            ->orderBy('fecha', 'asc')
            ->get();

        return response()->json($mensajes);
    }

    /**
     * Almacenar un nuevo mensaje.
     */
   // En tu controlador ChatController.php
   public function almacenarMensaje(Request $request, $peliculaId, $hora, $eventoId)
   {
       $request->validate([
           'mensaje' => 'required|string',
           'usuario_id' => 'required|exists:usuario,id'
       ]);
   
       try {
           $chat = Chat::create([
               'mensaje' => $request->mensaje,
               'fecha' => now(), // Añade la fecha actual
               'enviado' => true,
               'recibido' => false,
               'usuario_id' => $request->usuario_id,
               'evento_pelicula_id' => $eventoId
           ]);
   
           return response()->json($chat, 201);
   
       } catch (\Exception $e) {
           return response()->json([
               'error' => $e->getMessage()
           ], 500);
       }
   }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validated = $request->validate([
            'mensaje' => 'required|string|max:255',
            'evento_pelicula_id' => 'required|exists:evento_pelicula,id',
        ]);

        try {
            // Crear el nuevo mensaje en el chat
            $chat = Chat::create([
                'mensaje' => $validated['mensaje'],
                'fecha' => now(),
                'enviado' => true,
                'recibido' => false,
                'usuario_id' => auth()->id(), // Usuario autenticado
                'evento_pelicula_id' => $validated['evento_pelicula_id'],
            ]);

            return response()->json($chat, 201); 
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar el mensaje: ' . $e->getMessage()], 500);
        }
    }
    public function obtenerMensajes($peliculaId, $hora, $eventoId)
    {
        $mensajes = Chat::with('usuario')  // Asegúrate de que el modelo Chat tiene la relación "usuario" definida
            ->where('evento_pelicula_id', $eventoId)  // Filtrar por el evento de la película
            ->orderBy('fecha', 'asc')
            ->get();
    
        return response()->json($mensajes);  // Esto enviará los mensajes con los datos de usuario
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        return response()->json($chat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chat $chat)
    {
        $validated = $request->validate([
            'mensaje' => 'string|max:255',
        ]);

        $chat->update($validated);

        return response()->json($chat);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        return response()->json(['message' => 'Chat eliminado con éxito']);
    }
}
