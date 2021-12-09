<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Centidad extends Model
{
    use HasFactory;

    protected $table = 'c_entidad';

    protected $fillable = [
        "id",
        "nombre",
    ];
}
