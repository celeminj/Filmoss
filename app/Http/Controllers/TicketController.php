<?php


namespace App\Http\Controllers;

use App\Mail\TicketMail;
use App\Models\Pelicula_nueva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'pelicula_id' => 'required|exists:pelicula_nueva,id',
            'hora' => 'required|date_format:H:i',
        ]);
        $pelicula = Pelicula_nueva::findOrFail($request->pelicula_id);

        Mail::to($request->correo)->send(new TicketMail($request->nombre, $pelicula->titulo, $pelicula->image, $pelicula->descripcion, $request->hora));

        return redirect()->back()->with('success', 'Te hemos enviado un ticket a tu correo!');
    }
}
