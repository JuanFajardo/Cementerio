<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuxiliarController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
  }

  public function pais($id){
    $datos = \App\Departamento::where('id_pais', '=', $id)->get();
    return $datos;
  }

  public function departamento($id){
    $datos = \App\Provincia::where('id_departamento', '=', $id)->get();
    return $datos;
  }

  public function provincia($id){
    $datos = \App\Localidad::where('id_provincia', '=', $id)->get();
    return $datos;
  }

}
