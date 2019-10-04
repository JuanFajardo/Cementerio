<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller{
  public function __construct(){
    /*$this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');*/
  }

  public function index(){
    if( \Auth::user()->grupo == "Administrador"  ){
      $usuarios = \DB::table('users')->pluck('email', 'id');
    }
    return view('reporte.index', compact( 'usuarios'));
  }

  public function reporte(Request $request){
        $inicio     = date("Y-m-d",strtotime($request->inicio."- 1 days")); 	    //"2019-02-01"
        $fin	      = date("Y-m-d",strtotime($request->fin."+ 1 days"));       //"2019-02-28"

        $salud    = $request->salud;	//null
        $usuario  = $request->usuario;	      //null
        $btn	    = $request->btn;       //"pdf"

        if( \Auth::user()->grupo == "Administrador"  ){

          $raw1 =  $salud   != null   ? " centrosalud = '".$salud."' " : " 1 = 1 ";
          $raw2 =  $usuario != null   ? " usuario = '".$usuario."' " : " 1 = 1 ";

        }else{

          $centros = \DB::table('encargados')->where( 'id_user', '=', \Auth::user()->id )->get();
          $usuarios = \DB::table('users')->where('id',     '=',  \Auth::user()->id)
                                         ->orWhere('grupo',  '=', 'Usuario' )
                                         ->get();
          $cadena1 = "";
          foreach ($centros as $centro ) {
            $dato1 = "'".$centro->centro_salud."',";
            $cadena1 = $cadena1 . $dato1;
          }
          $cadena1 =  substr($cadena1, 0, -1);

          $cadena2 = "";
          foreach ($usuarios as $usuario ) {
            $dato2 = "'".$usuario->name."',";
            $cadena2 = $cadena2 . $dato2;
          }
          $cadena2 =  substr($cadena2, 0, -1);

          return $cadena1  . " -- " . $cadena2;

          $raw1 =  $salud   != null   ? " centrosalud = '".$salud."' " : " centrosalud in ( ".$cadena1." )";
          $raw2 =  $usuario != null   ? " usuario = '".$usuario."' " : " usuario in (".$cadena2.") ";

        }
        $datos = \DB::table('logs')->where('created_at', '>', $inicio)
                                   ->where('created_at', '<', $fin)
                                   ->whereRaw($raw1)
                                   ->whereRaw($raw2)
                                   ->get();
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
