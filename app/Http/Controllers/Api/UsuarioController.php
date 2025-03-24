<?php

namespace App\Http\Controllers\Api;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UsuarioResource;

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

    return response()->json(Usuario::with('rol')->get());

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
        $usuario = new Usuario();
        $usuario->nombre = $request->input("nombre");
        $usuario->fecha_nacimiento = $request->input("fecha_nacimiento");
        $usuario->correo = $request->input("correo");
        $usuario->contrasenya = Hash::make($request->input("contrasenya"));


        try {
            $usuario->save();
          $response = (new UsuarioController)($usuario)
          ->response()
          ->setStatusCode(201);

        } catch (QueryException $ex) {
            $response = response()->json(['error' => Utilitat::errorMessage($ex)], 500);


        }

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        $usuario = Usuario::with('usuarios')->find($usuario->id);
        return new UsuarioResource($usuario);
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
        try {
            $usuario->update([
                'nombre' => $request->input("nombre"),
                'fecha_nacimiento' => $request->input("fecha_nacimiento"),
                'correo' => $request->input("correo"),
                'contrasenya' => Hash::make($request->input("contrasenya"))
            ]);
            return response()->json(['message' => 'Usuario actualizado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }
}
