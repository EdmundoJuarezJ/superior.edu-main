<?php

namespace Database\Seeders;
use App\Models\Cmotivobaja;
use Illuminate\Database\Seeder;

class CmotivobajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivobaja = new Cmotivobaja();
        $motivobaja->nombre = "Simon";
        $motivobaja->estatus = "1";
        $motivobaja->idrole = "1";

        $motivobaja->save();

        $motivobaja = new Cmotivobaja();
        $motivobaja->nombre = "Armando";
        $motivobaja->estatus = "1";
        $motivobaja->idrole = "1";

        $motivobaja->save();
    }
}
