<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
  protected $table = 'departamentos';
  protected $fillable = ['id', 'departamento', 'id_pais'];

}
