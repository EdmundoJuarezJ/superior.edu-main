<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmunicipio extends Model
{
    use HasFactory;

    protected $table = 'c_municipio';

    protected $fillable = [
        'id',
        'nombre',
    ];
}
