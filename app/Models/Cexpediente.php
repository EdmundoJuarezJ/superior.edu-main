<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cexpediente extends Model
{
    use HasFactory;
    protected $table = 'expediente';

    protected $fillable = [
        'id',
        'idgrupo',
        'idalumno',
        'idusuario',
    ];
}
