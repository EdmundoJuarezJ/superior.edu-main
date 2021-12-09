<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Ccarrera extends Model
{
    use HasFactory;
    protected $table = "c_carrera";

    protected $fillable = [
      "id",
      "nombre",
      "nombre_corto",
      "estatus",
      "idmodalidad",
    ];   
}