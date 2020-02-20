<?php

namespace App\Http\Controllers;

use App\areas;
use Illuminate\Http\Request;

class AreasController extends Controller
{
  public function __construct()
  {
      $this->middleware('is_admin');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $areas = areas::all();
      return view('partials.areas', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partials.createArea');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'nombre' => 'required|string',
        'descripcion' => 'required|string',
      ]);

      $area = new areas;
      $area->nombre  = $request->nombre;
      $area->descripcion  = $request->descripcion;
      $area->save();


      return response()->json([
        'code' => 200,
        'message' => 'Area creada'
      ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $area = areas::findOrFail($id);
      return view('Areas.show', compact('area'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function edit(areas $areas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $area = areas::findOrFail($id);
      $area->nombre = $request->nombre;
      $area->descripcion = $request->descripcion;
      $area->save();

      return response()->json([
        'code' => 200,
        'message' => 'Area editada'
      ]);

    }


    public function activar($id){
      $area = areas::findOrFail($id);
      $area->activa = 1;
      $area->save();
      return response()->json([
        'code' => 200,
        'message' => 'Area Activada'
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $area = areas::findOrFail($id);
      $productos = $area->productos->count();
      if ($productos > 0) {
        $area->activa = 0;
        $area->save();
        return response()->json([
          'code' => 200,
          'message' => 'Area inactiva'
        ]);

      }else{
        $area->delete();
        return response()->json([
          'code' => 200,
          'message' => 'Area Eliminada'
        ]);
      }

    }
}
