<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
  protected $table = 'provincias';
  protected $fillable = ['id', 'provincia', 'id_pais', 'id_departamento'];
}
