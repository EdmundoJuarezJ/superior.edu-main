<?php

namespace Database\Seeders;
use App\Models\Cperiodo;
use Illuminate\Database\Seeder;

class CperiodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodo = new Cperiodo();
        $periodo->nombre = "Primero";
        $periodo->fecha_inicio = "2021-12-05";
        $periodo->fecha_fin = "2021-12-20";

        $periodo->save();

        $periodo = new Cperiodo();
        $periodo->nombre = "Segundo";
        $periodo->fecha_inicio = "2021-12-05";
        $periodo->fecha_fin = "2021-12-20";

        $periodo->save();

    }
}
