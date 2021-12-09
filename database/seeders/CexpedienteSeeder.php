<?php

namespace Database\Seeders;
use App\Models\Cexpediente;
use Illuminate\Database\Seeder;

class CexpedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cexpediente = new Cexpediente();
        $cexpediente->idgrupo = "1";
        $cexpediente->idalumno = "1";
        $cexpediente->idusuario = "1";
        $cexpediente->save();
    }
}
