<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areas;

class indexController extends Controller
{
  public function index()
  {
    return view('welcome');
  }

  public function getProductos()
  {
    $areas = areas::with(array('productos'=> function($query){
      $query->where('consignado', '=', 1)->where('disponibles', '>' , 0)->get();
    }))->where('activa', 1)->get();
    return view('partials.productos', compact('areas'));
  }


}
