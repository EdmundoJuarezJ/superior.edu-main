<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cmodalidad extends Model
{
    use HasFactory;

		protected $table = 'cmodalidad';


		protected $fillable = [
			'id',
			'nombre',
		];

}