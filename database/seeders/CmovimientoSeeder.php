<?php

namespace Database\Seeders;
use App\Models\Cmovimiento;
use Illuminate\Database\Seeder;

class CmovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Movimientos
      $cmovimiento = new Cmovimiento();
      $cmovimiento->nombre = "ALTA";
      $cmovimiento->estatus="1";
      $cmovimiento->idrole = "1";
      $cmovimiento->save();
      
      $cmovimiento = new Cmovimiento();
      $cmovimiento->nombre = "BAJA DEFINITIVA";
      $cmovimiento->estatus="0";
      $cmovimiento->idrole = "2";
      $cmovimiento->save();

      $cmovimiento = new Cmovimiento();
      $cmovimiento->nombre = "BAJA TEMPORAL";
      $cmovimiento->estatus="0";
      $cmovimiento->idrole = "3";
      $cmovimiento->save();

      $cmovimiento = new Cmovimiento();
      $cmovimiento->nombre = "EGRESADO";
      $cmovimiento->estatus="0";
      $cmovimiento->idrole = "4";
      $cmovimiento->save();

      $cmovimiento = new Cmovimiento();
      $cmovimiento->nombre = "VIGENTE";
      $cmovimiento->estatus="1";
      $cmovimiento->idrole = "1";
      $cmovimiento->save();
    }
}
