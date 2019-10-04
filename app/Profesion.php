<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesion extends Model
{
  protected $table = 'profesions';
  protected $fillable = ['id', 'profesion'];

}
