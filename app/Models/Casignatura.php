<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Casignatura extends Model
{
    use HasFactory;

    protected $table = 'c_asignatura';


		protected $fillable = [
			'id',
			'nombre',
      'nombre_corto',
      'semestre',
      'estatus',
      'clave',
      'orden',
      'promediar',
      'num_creditos',
		];
}
