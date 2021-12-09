<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cmovimiento extends Model
{
    use HasFactory;
    protected $table = "c_movimiento";

    protected $fillable = [
      "id",
      "nombre",
      "estatus",
      "idrole",
    ];  
}
