<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Difunto;

class DifuntoController extends Controller
{
  public function __construct(){
    /*
    $this->middleware('auth');
    if( \Auth::guest() )
      return redirect('index.php/login');
      */
  }

  public function index(Request $request){
    $datos = Difunto::all();
    $medicos = \App\Medico::all();
    $religions = \App\Religion::all();
    $profesions = \App\Profesion::all();
    $paises       = \DB::table('pais')->pluck('pais','id');
    $departamentos= \DB::table('departamentos')->pluck('departamento','id');
    $provincias   = \DB::table('provincias')->pluck('provincia','id');
    $localidads   = \DB::table('localidads')->pluck('localidad','id');
    if ($request->ajax()) {
      return $datos;
    }else{
      return view('difunto.index', compact('datos', 'profesions', 'religions', 'medicos', 'paises', 'departamentos', 'provincias', 'localidads'));
    }
  }

  public function medico($medico){
    $numero = \DB::table('medicos')->where('medico','=',$medico)->count();
    if($numero == 0){
        $dato = new \App\Medico;
        $dato->medico = $medico;
        $dato->save();
    }
  }
  public function religion($religion){
    $numero = \DB::table('religions')->where('religion','=',$religion)->count();
    if($numero == 0){
        $dato = new \App\Religion;
        $dato->religion = $religion;
        $dato->save();
    }
  }
  public function profesion($profesion){
    $numero = \DB::table('profesions')->where('profesion','=',$profesion)->count();
    if($numero == 0){
        $dato = new \App\Profesion;
        $dato->profesion = $profesion;
        $dato->save();
    }
  }

  public function store(Request $request){
    $request['religion']  = isset($request->religion) ? $request->religion : " ";
    $request['hijo']      = isset($request->hijo) ? $request->hijo : " ";
    $request['conyuge']   = isset($request->conyuge) ? $request->conyuge : " ";
    $request['profesion'] = isset($request->profesion) ? $request->profesion : " ";
    $request['registro_civil'] = isset($request->registro_civil) ? $request->registro_civil : " ";
    $request['boleta_entierro'] = isset($request->boleta_entierro) ? $request->boleta_entierro : " ";
    $request['certificado_defuncion'] = isset($request->certificado_defuncion) ? $request->certificado_defuncion : " ";
    $request['paterno'] = isset($request->paterno) ? $request->paterno : " ";
    $request['materno'] = isset($request->materno) ? $request->materno : " ";
    $request['esposo'] = isset($request->esposo) ? $request->esposo : " ";
    $request['fecha_nacimiento'] = isset($request->fecha_nacimiento) ? $request->fecha_nacimiento : " ";
    $request['diagnostico'] = isset($request->diagnostico) ? $request->diagnostico : " ";
    $request['medico'] = isset($request->medico) ? $request->medico : " ";
    $request['edad'] = isset($request->edad) ? $request->edad : " ";
    $request['estado_civil'] = isset($request->estado_civil) ? $request->estado_civil : " ";
    $request['lugar_procedencia'] = isset($request->lugar_procedencia) ? $request->lugar_procedencia : " ";
    $request['padre'] = isset($request->padre) ? $request->padre : " ";
    $request['madre'] = isset($request->madre) ? $request->madre : " ";
    $request['senas_particulares'] = isset($request->senas_particulares) ? $request->senas_particulares : " ";
    $request['ultimo_domicilio'] = isset($request->ultimo_domicilio) ? $request->ultimo_domicilio : " ";
    $request['direccion'] = isset($request->direccion) ? $request->direccion : " ";
    $request['fecha_registro'] = isset($request->fecha_registro) ? $request->fecha_registro : " ";
    $request['nacionalidad'] = isset($request->nacionalidad) ? $request->nacionalidad : " ";
    $request['departamento'] = isset($request->departamento) ? $request->departamento : " ";
    $request['provincia'] = isset($request->provincia) ? $request->provincia : " ";
    $request['localidad'] = isset($request->localidad) ? $request->localidad : " ";
    $request['libro'] = isset($request->libro) ? $request->libro : " ";
    $request['folio'] = isset($request->folio) ? $request->folio : " ";
    $request['partida'] = isset($request->partida) ? $request->partida : " ";
    $request['distrito'] = isset($request->distrito) ? $request->distrito : " ";

    $this->medico($request->medico);
    $this->religion($request->religion);
    $this->profesion($request->profesion);

    $dato = new Difunto;
    $dato->fill( $request->all() );
    $dato->save();
    return redirect('/Difunto');
  }

  public function show($id){
    $datos = Difunto::Where('id', '=', $id)->get();
    return $datos;
  }

  public function update(Request $request, $id){

    $request['religion']  = isset($request->religion) ? $request->religion : " ";
    $request['hijo']      = isset($request->hijo) ? $request->hijo : " ";
    $request['conyuge']   = isset($request->conyuge) ? $request->conyuge : " ";
    $request['profesion'] = isset($request->profesion) ? $request->profesion : " ";
    $request['registro_civil'] = isset($request->registro_civil) ? $request->registro_civil : " ";
    $request['boleta_entierro'] = isset($request->boleta_entierro) ? $request->boleta_entierro : " ";
    $request['certificado_defuncion'] = isset($request->certificado_defuncion) ? $request->certificado_defuncion : " ";
    $request['paterno'] = isset($request->paterno) ? $request->paterno : " ";
    $request['materno'] = isset($request->materno) ? $request->materno : " ";
    $request['esposo'] = isset($request->esposo) ? $request->esposo : " ";
    $request['fecha_nacimiento'] = isset($request->fecha_nacimiento) ? $request->fecha_nacimiento : " ";
    $request['diagnostico'] = isset($request->diagnostico) ? $request->diagnostico : " ";
    $request['medico'] = isset($request->medico) ? $request->medico : " ";
    $request['edad'] = isset($request->edad) ? $request->edad : " ";
    $request['estado_civil'] = isset($request->estado_civil) ? $request->estado_civil : " ";
    $request['lugar_procedencia'] = isset($request->lugar_procedencia) ? $request->lugar_procedencia : " ";
    $request['padre'] = isset($request->padre) ? $request->padre : " ";
    $request['madre'] = isset($request->madre) ? $request->madre : " ";
    $request['senas_particulares'] = isset($request->senas_particulares) ? $request->senas_particulares : " ";
    $request['ultimo_domicilio'] = isset($request->ultimo_domicilio) ? $request->ultimo_domicilio : " ";
    $request['direccion'] = isset($request->direccion) ? $request->direccion : " ";
    $request['fecha_registro'] = isset($request->fecha_registro) ? $request->fecha_registro : " ";
    $request['nacionalidad'] = isset($request->nacionalidad) ? $request->nacionalidad : " ";
    $request['departamento'] = isset($request->departamento) ? $request->departamento : " ";
    $request['provincia'] = isset($request->provincia) ? $request->provincia : " ";
    $request['localidad'] = isset($request->localidad) ? $request->localidad : " ";
    $request['libro'] = isset($request->libro) ? $request->libro : " ";
    $request['folio'] = isset($request->folio) ? $request->folio : " ";
    $request['partida'] = isset($request->partida) ? $request->partida : " ";
    $request['distrito'] = isset($request->distrito) ? $request->distrito : " ";

    $this->medico($request->medico);
    $this->religion($request->religion);
    $this->profesion($request->profesion);

    $dato = Difunto::find($id);
    $dato->fill($request->all());
    $dato->save();
    return redirect('/Difunto');
  }

  public function destroy(Request $request, $id){
    if( $request->ajax() ){
      $dato = Difunto::find($id);
      $dato->delete();
      return "Datos eliminados";
    }else{
      return redirect('/Difunto');
    }
  }

}
