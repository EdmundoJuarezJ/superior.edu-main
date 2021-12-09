<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Casignatura;
class CasignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $asignatura = new Casignatura();
      $asignatura->nombre = "Matematicas";
      $asignatura->nombre_corto = "MAT";
      $asignatura->semestre="4";
      $asignatura->estatus="1";
      $asignatura->clave="MAT21H21";
      $asignatura->orden="2";
      $asignatura->promediar="1";
      $asignatura->num_creditos="40";
      $asignatura->idplan="1";
      $asignatura->idescala="1";
      $asignatura->idantecesor="1";
      
      $asignatura->save();

      $asignatura = new Casignatura();
      $asignatura->nombre = "Informatica";  
      $asignatura->nombre_corto = "INFM";
      $asignatura->semestre="2";
      $asignatura->estatus="1";
      $asignatura->clave="INFM21H21";
      $asignatura->orden="3";
      $asignatura->promediar="1";
      $asignatura->num_creditos="50";
      $asignatura->idplan="1";
      $asignatura->idescala="1";
      $asignatura->idantecesor="1";
      
      $asignatura->save();

    }
}
