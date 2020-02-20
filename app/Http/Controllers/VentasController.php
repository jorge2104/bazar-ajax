<?php

namespace App\Http\Controllers;

use App\ventas;
use App\productos;
use App\pago_venta;
use App\pagos;
use Auth;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ventas = ventas::where('quien_vendio', Auth::user()->id)->with('quien_compra')->with('producto')->get();
      return view('Ventas.index', compact('ventas'));
    }

    public function Aventas()
    {
      $ventas = ventas::with('quien_compra')->with('producto')->with('vendedor')->get();
      return view('Ventas.Aindex', compact('ventas'));
    }

    public function compras()
    {
      $compras = ventas::where('comprador', Auth::user()->id)->with('quien_compra')->with('producto')->get();
      return view('clientPartials.compras', compact('compras'));
    }

    public function createPago($id)
    {
      $compra = ventas::findOrfail($id);
      return view('ventas.createPago', compact('compra'));
    }

    public function storePago(Request $request, $id)
    {

      $compra = ventas::findOrfail($id);
      $compra->pago += $request->monto;
      $compra->save();

      $pago = new pagos;
      $pago->monto =  $request->monto;
      $pago->fecha = now();
      $pago->save();

      $pago_venta = new pago_venta;
      $pago_venta->pago_id = $pago->id;
      $pago_venta->venta_id = $compra->id;
      $pago_venta->save();



       return response()->json([
              'code' => 200,
              'message' => "pago(s) realizados",
            ]);
    }

    public function pagoShow($id)
    {
      $pagos = pago_venta::where('venta_id', $id)->with('pagos')->get();
      return view('Ventas.pagos', compact('pagos'));

    }

    public function ApagoShow($id)
    {
      $pagos = pago_venta::where('venta_id', $id)->with('pagos')->get();
      return view('Ventas.Apagos', compact('pagos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $ventas = ventas::with('producto')->with("quien_compra")
      ->with("vendedor")->where("pago", 0)->get();
      return view("clientPartials.formPagos",compact('ventas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      foreach ($request->pagar as $pagar) {
        $venta = ventas::findOrfail($pagar);
        $venta->pago = 1;
        $venta->save();

        $pago = new pagos;
        $pago->monto = $venta->precio_venta;
        $pago->fecha  = now() ;
        $pago->entregado  = 0 ;
        $pago->save();
      }

      return response()->json([
        'code' => 200,
        'message' => "pago(s) realizados",
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $producto = productos::findOrfail($id);

      $venta = new ventas;
      $venta->producto_id = $id;
      $venta->fecha = now();
      $venta->pago = 0;
      $venta->quien_vendio= $producto->clienta_vende;
      $venta->precio_venta= $producto->precio_vendido;
      $venta->comprador = Auth::user()->id;
      $venta->save();

      $producto->disponibles = $producto->disponibles-1;
      $producto->save();


      return response()->json([
        'code' => 200,
        'message' => 'compra realizada'
      ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function PagosIndex()
    {
      $entregados = pagos::where('entregado', 1)->get();
      $pendientes = pagos::where('entregado', 0)->get();
      return view('paPartials.pagos',compact("entregados", "pendientes"));
    }

    public function entregar($id)
    {
      $entrega = pagos::findOrfail($id);
      $entrega->entregado = 1;
      $entrega->save();

      return response()->json([
        'code' => 200,
        'message' => 'Entrega correctamente'
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(ventas $ventas)
    {
        //
    }
}
