<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = User::with('rol')->get();
      return view('partials.usuarios', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("partials.createUser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = new User;
      $user->name = $request->name;
      $user->password = bcrypt($request->password);
      $user->email = $request->email;
      $user->lastname = $request->lastname;
      $user->second_lastname = $request->second_lastname;
      $user->sexo = $request->sexo;
      $user->id_role = $request->id_role;
      $user->save();
      return response()->json([
        'code' => 200,
        'message' => 'Usuario Agreagdo'
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $usuario = User::findOrFail($id);
        return view('Usuarios.edit', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('partials.password', compact("id"));
    }

    public function storePass($id, Request $request)
    {
      $user = User::findOrFail($id);
      $user->password = bcrypt($request->password);
      $user->save();

      return response()->json([
        'code' => 200,
        'message' => 'contraseña guardada'
      ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(isset($request->name)){$user->name = $request->name;}
        if(isset($request->email)) {$user->email = $request->email;}
        if(isset($request->lastname)) {$user->lastname = $request->lastname;}
        if(isset($request->second_lastname)) {$user->second_lastname = $request->second_lastname;}
        if(isset($$request->sexo)) {$user->sexo = $request->sexo;}
        $user->save();

        return response()->json([
          'code' => 200,
          'message' => 'Usuario Editado'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
