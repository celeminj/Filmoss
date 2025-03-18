<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){

        // $nomUsuari = $request->input('nom');
        // $contrasenya = $request->input('contrasenya');

        // $usuari = Usuari::where('nom',$nomUsuari)->first();

        // if($usuari != null && Hash::check($contrasenya, $usuari->contrasenya)){
        //     Auth::login($usuari);
        //     $request->session()->flash('usuari', $usuari);
        //     $response = redirect('/');
        // }
        // else{
        //     $request->session()->flash('error','Usuari o contrasenya incorrectes');
        //     $response = redirect('/');
        // }

        return $response;
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function showRegister(){

        return view("auth.register");
    }

    public function register(Request $request)
    {


        $usuario = new Usuario();
        $usuario->nombre = $request->input("nombre");
        $usuario->fecha_nacimiento = $request->input("fecha_nacimiento");
        $usuario->correo = $request->input("correo");
        $usuario->contrasenya = Hash::make($request->input("contrasenya"));

        if ($usuario->save()) {
            Auth::login($usuario);
            session()->flash('success', 'Usuario registrado');
            return redirect('/home');
        } else {
            session()->flash('error', "No se ha podido registrar");
            return back();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = usuario::all();

        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
