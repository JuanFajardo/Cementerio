<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
  protected $table = 'localidads';
  protected $fillable = ['id', 'localidad', 'id_pais', 'id_departamento', 'id_provincia'];
}
