<?php

namespace Database\Seeders;
use App\Models\Cevaluacion;
use Illuminate\Database\Seeder;

class CevaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cevaluacion = new Cevaluacion();
        $cevaluacion->calificacion = "9.9";
        $cevaluacion->idexpediente = "1";
        $cevaluacion->idusuario = "1";
        $cevaluacion->idasignatura = "1";
        $cevaluacion->save();
    }
}
