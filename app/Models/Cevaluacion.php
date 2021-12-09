<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cevaluacion extends Model
{
    use HasFactory;
    protected $table = 'evaluacion';
    protected $fillable = [
        'id',
        'calificacion',
        'idexpediente',
        'idusuario',
        'idasignatura',
    ];
}
