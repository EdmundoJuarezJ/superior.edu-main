<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cpersona;
class CpersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = new Cpersona();
        $persona->identificador = "Matematicas";
        $persona->nombre = "MAT";
        $persona->apellido1="SANCHEZ";
        $persona->apellido2="RODRIGUEZ";
        $persona->sexo="M";
        $persona->curp="SANDASD54654";
        $persona->rfc="ASDAS46D";
        $persona->num_tel="018001321";
        $persona->num_cel="224165846";
        $persona->email="MAT@UPAM.EDU.MX";
        $persona->domicilio="CALLE 9 SUR PUEBLA MEXICO";
        $persona->idcolonia="1";
        $persona->colonia="20 de Noviembre";
        $persona->identidad="1";
        $persona->idmunicipio="1";
        $persona->idrole="1";
        $persona->iduser="1";
        $persona->idusuario="1";
        $persona->save();

        $persona = new Cpersona();
        $persona->identificador = "PACO";
        $persona->nombre = "FRANCISCO";
        $persona->apellido1="SANCHEZ";
        $persona->apellido2="RODRIGUEZ";
        $persona->sexo="M";
        $persona->curp="SANDASD54654";
        $persona->rfc="ASDAS46D";
        $persona->num_tel="152648445";
        $persona->num_cel="224489545";
        $persona->email="PACMAN@UPAM.EDU.MX";
        $persona->domicilio="CALLE 9 SUR PUEBLA MEXICO";
        $persona->idcolonia="1";
        $persona->colonia="20 de Noviembre";
        $persona->identidad="1";
        $persona->idmunicipio="1";
        $persona->idrole="1";
        $persona->iduser="1";
        $persona->idusuario="1";
        $persona->save();
    }
}
