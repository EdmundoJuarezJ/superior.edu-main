<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Cpersona extends Model
{
    use HasFactory;
    protected $table = 'persona';

    protected $fillable=[
        'id',
        'identificador',
        'nombre',
        'apellido1',
        'apellido2',
        'sexo',
        'curp',
        'rfc',
        'num_tel',
        'num_cel',
        'email',
        'domicilio',
        'idcolonia',
        'colonia',
        
    ];
    

}
