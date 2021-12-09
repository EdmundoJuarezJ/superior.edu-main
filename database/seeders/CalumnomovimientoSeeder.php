<?php

namespace Database\Seeders;
use App\Models\Calumnomovimiento;
use Illuminate\Database\Seeder;

class CalumnomovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alumnomovimiento = new Calumnomovimiento();
        $alumnomovimiento->idalumno = 1;
        $alumnomovimiento->idusuario = 1;
        $alumnomovimiento->idmotivobaja = 1;
        $alumnomovimiento->idtipomovimiento = 1;
        $alumnomovimiento-> save();
    }
}
