<?php

namespace Database\Seeders;
use App\Models\Cgrupo;
use Illuminate\Database\Seeder;

class CgrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo = new Cgrupo();
        $grupo->nombre = "G1";
        $grupo->semestre = "2";
        $grupo->iddocente="1";
        $grupo->idusuario="1";

        $grupo->save();

        $grupo = new Cgrupo();
        $grupo->nombre = "G2";
        $grupo->semestre = "4";
        $grupo->iddocente="1";
        $grupo->idusuario="1";

        $grupo->save();
    }
}
