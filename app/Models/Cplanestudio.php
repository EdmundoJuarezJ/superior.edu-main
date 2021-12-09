<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cplanestudio extends Model
{
  use HasFactory;

  protected $table = 'c_planestudio';


  protected $fillable = [
    'id',
    'nombre',
    'nombre_corto',
    'estatus',
    'num_creditos_total',
    'num_creditos_min',
    'num_creditos_max',
    
  ];

}