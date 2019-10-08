<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function index(){
    if( \Auth::user()->grupo == "Administrador"  ){
      $usuarios = \DB::table('users')->pluck('email', 'id');
    }
    return view('reporte.index', compact( 'usuarios'));
  }

  public function reporte(Request $request){

    $inicio       = date("Y-m-d",strtotime($request->inicio."- 1 days")); 	    //"2019-02-01"
    $fin          = date("Y-m-d",strtotime($request->fin."+ 1 days"));       //"2019-02-28"
    $fallecimiento= date("Y-m-d",strtotime($request->fecha_fallecimiento));       //"2019-02-28"
    $btn          = $request->btn;       //"xls"
    $datos        = "";
    if( $request->fecha_fallecimiento  != null ){
      $datos = \DB::table('difuntos')->where('created_at', '>', $inicio)
                                 ->where('created_at', '<', $fin)
                                 ->get();
    }else{
      $datos = \DB::table('difuntos')->where('fecha_fallecimiento', '=', $fin)
                                      ->get();
    }

    if($btn == "doc"){
      return view('reporte.pdf', compact('datos', 'inicio', 'fin'));
    }elseif ($btn == "xls") {
      return view('reporte.excel', compact('datos', 'inicio', 'fin'));
    }elseif ($btn == "pdf") {
      $pdf = \PDF::loadView('reporte.pdf', compact('datos', 'inicio', 'fin'));
      return $pdf->download('listado.pdf');
    }
  }


    public function ordeCompra($id){
      $compras = \DB::table('compras')->join('users', 'compras.id_user', '=', 'users.id')
                                    ->join('proveedors', 'compras.id_proveedor', '=', 'proveedors.id')
                                    ->select('compras.*', 'users.email', 'proveedors.*')
                                    ->where('compras.id', '=', $id)
                                    ->get();
      $detalles = \DB::table('detalles')->where('detalles.id_compra', '=', $id)->get();

      return view('reporte.ordenCompra', compact('compras', 'detalles'));
    }

}
