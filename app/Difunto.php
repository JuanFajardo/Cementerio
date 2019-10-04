<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Difunto extends Model
{
  protected $table = 'difuntos';
  protected $fillable = ['id', 'registro_civil', 'boleta_entierro', 'certificado_defuncion', 'nombre', 'paterno', 'materno', 'esposo', 'inicial_nombre',
                        'fecha_nacimiento', 'fecha_fallecimiento', 'hora_fallecimiento', 'diagnostico', 'medico', 'edad', 'sexo',
                        //'diacnostico', 'medico',
                        'estado_civil', 'religion', 'profesion', 'lugar_procedencia', 'hijo', 'padre', 'madre', 'conyuge', 'senas_particulares', 'ultimo_domicilio',
                        'direccion', 'fecha_registro', 'nacionalidad', 'departamento', 'provincia', 'localidad', 'libro', 'folio', 'partida', 'distrito', 'imagen'];

  public function setImagenAttribute($imagen){
    $this->attributes['imagen'] = md5(date('Y_m_d_H_i_s_')).'_'.$imagen->getClientOriginalName();
    $name = md5(date('Y_m_d_H_i_s_')).'_'.$imagen->getClientOriginalName();
    \Storage::disk('local')->put($name, \File::get($imagen));
  }

}
