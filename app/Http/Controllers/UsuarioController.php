<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login(Request $request){

        $correo = $request->input('correo');
        $contrasenya = $request->input('contrasenya');
        $user = Usuario::where('correo',$correo)->first();

        if($user != null && Hash::check($contrasenya, $user->contrasenya)){
            Auth::login($user);
            return redirect()->route('catalogo');
        }
        else{
            $request->session()->flash('error','No existe este correo');
            $response = redirect('/login')->withInput();
        }

        return $response;
    }
    public function showLogin(){

        // $user = new Usuario();

        // $user->nombre = 'sadmin';
        // $user->fecha_nacimiento = '9999-12-12';
        // $user->correo = 'sadmin@gmail.com';
        // $user->contrasenya = \bcrypt('sadmin');
        // $user->rol_id = 1;

        // $user->save();



        return view("auth.login");
    }

    public function logout(){

        Auth::logout();

        return redirect('/home');
    }
    public function showRegister(){

        return view("auth.register");
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'nombre' => 'required|string|max:255',
        //     'fecha_nacimiento' => 'required|date',
        //     'correo' => 'required|email|unique:usuario',
        //     'contrasenya' => 'required|min:6|confirmed',
        // ]);


        $user = new Usuario();
        $user->nombre = $request->input("nombre");
        $user->fecha_nacimiento = $request->input("fecha_nacimiento");
        $user->correo = $request->input("correo");
        $user->contrasenya = Hash::make($request->input("contrasenya"));
        $user->rol_id = 2;


        if ($user->save()) {
            Auth::login($user);
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
        $rol = Rol::all();
        return view('gestion.gestion_usuario', compact('usuario','rol'));
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
        try {
            $usuario->delete();
            $mensaje = ['success' => 'Registro eliminado correctamente'];
        } catch (QueryException $ex) {
            $mensaje = ['error' => Utilitat::errorMessage($ex)];
        }

        $usuario = Usuario::all();

        return view('gestion.gestion_usuario', compact('mensaje','usuario'));
    }


}
