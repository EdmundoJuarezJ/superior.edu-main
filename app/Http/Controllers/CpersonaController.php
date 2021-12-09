<?php

namespace App\Http\Controllers;
use App\Models\Cpersona;
use Illuminate\Http\Request;

class CpersonaController extends Controller
{
    public function index(){
        return view('cpersona.view');
    }
    public function fetchCpersonaData(Request $request){
        $query = Cpersona::select('id', 'identificador', 'nombre', 'apellido1', 'apellido2', 'sexo', 'curp', 'rfc', 'num_tel','num_cel','email','domicilio', 'idcolonia', 'colonia', 'identidad', 'idmunicipio','idrole','iduser','idusuario');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('identificador','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('apellido1','like','%'.$request->searchQuery.'%');
                $q->orwhere('apellido2','like','%'.$request->searchQuery.'%');
                $q->orwhere('sexo','like','%'.$request->searchQuery.'%');
                $q->orwhere('curp','like','%'.$request->searchQuery.'%');
                $q->orwhere('rfc','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_tel','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_cel','like','%'.$request->searchQuery.'%');
                $q->orwhere('email','like','%'.$request->searchQuery.'%');
                $q->orwhere('domicilio','like','%'.$request->searchQuery.'%');
                $q->orwhere('idcolonia','like','%'.$request->searchQuery.'%');
                $q->orwhere('colonia','like','%'.$request->searchQuery.'%');
                $q->orwhere('identidad','like','%'.$request->searchQuery.'%');
                $q->orwhere('idmunicipio','like','%'.$request->searchQuery.'%');
                $q->orwhere('idrole','like','%'.$request->searchQuery.'%');
                $q->orwhere('iduser','like','%'.$request->searchQuery.'%');
                $q->orwhere('idusuario','like','%'.$request->searchQuery.'%');
            });
        }
        $cpersonas = $query->get();
        return $cpersonas;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cpersona.form')->with($data);
    }
    public function store(Request $request){
        $cpersona = new Cpersona;
        $cpersona -> identificador = $request->identificador;
        $cpersona -> nombre = $request->nombre;
        $cpersona -> apellido1 = $request->apellido1;
        $cpersona -> apellido2 = $request->apellido2;
        $cpersona -> sexo = $request->sexo;
        $cpersona -> curp = $request->curp;
        $cpersona -> rfc = $request->rfc;
        $cpersona -> num_tel = $request->num_tel;
        $cpersona -> num_cel = $request->num_cel;
        $cpersona -> email = $request->email;
        $cpersona -> domicilio = $request->domicilio;
        $cpersona -> idcolonia = $request->idcolonia;
        $cpersona -> colonia = $request->colonia;
        $cpersona -> identidad = $request->identidad;
        $cpersona -> idmunicipio = $request->idmunicipio;
        $cpersona -> idrole = $request->idrole;
        $cpersona -> iduser = $request->iduser;
        $cpersona -> idusuario = $request->idusuario;
        $cpersona-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Persona Guardada Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cpersona.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cpersona.form')->with($data);
    }
    public function editdata($id){
        $cpersona = Cpersona::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cpersona,
        ]);
    }
    public function update(Request $request, $id){
        $cpersona = Cpersona::find($id);
        $cpersona -> identificador = $request->identificador;
        $cpersona -> nombre = $request->nombre;
        $cpersona -> apellido1 = $request->apellido1;
        $cpersona -> apellido2 = $request->apellido2;
        $cpersona -> sexo = $request->sexo;
        $cpersona -> curp = $request->curp;
        $cpersona -> rfc = $request->rfc;
        $cpersona -> num_tel = $request->num_tel;
        $cpersona -> num_cel = $request->num_cel;
        $cpersona -> domicilio = $request->domicilio;
        $cpersona -> idcolonia = $request->idcolonia;
        $cpersona -> colonia = $request->colonia;
        $cpersona -> identidad = $request->identidad;
        $cpersona -> idmunicipio = $request->idmunicipio;
        $cpersona -> idrole = $request->idrole;
        $cpersona -> iduser = $request->iduser;
        $cpersona -> idusuario = $request->idusuario;
        $cpersona-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Persona Actualizada Correctamente',
        ]);
    }
    public function delete($id){
        $cpersona = Cpersona::find($id);
        $cpersona->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Persona Eliminada Correctamente',
        ]);
    }
}
