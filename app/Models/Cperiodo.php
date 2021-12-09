<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cperiodo extends Model
{
    use HasFactory;

    protected $table = 'c_periodo';


		protected $fillable = [
			'id',
			'nombre',
            'fecha_inicio',
            'fecha_fin',
		];
}
