<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmotivobaja extends Model
{
    use HasFactory;

    protected $table = 'c_motivobaja';


    protected $fillable = [
        'id',
        'nombre',
        'estatus',
        'idrole',
    ];

}
