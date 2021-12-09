<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Calumnomovimiento extends Model
{
    use HasFactory;

    protected $table = 'alumno_movimiento';


		protected $fillable = [
			'id',
		];
}
