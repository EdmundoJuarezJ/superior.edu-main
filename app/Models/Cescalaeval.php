<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cescalaeval extends Model
{
    use HasFactory;
    protected $table = "c_escalaeval";

  

    protected $fillable = [
      "id",
      "nombre",
      "calificacion_min",
      "calificacion_max"
    ];

}