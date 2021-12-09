<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cgrupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';


		protected $fillable = [
			'id',
			'nombre',
            'semestre',
		];
}
