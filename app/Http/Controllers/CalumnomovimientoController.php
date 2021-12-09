<?php

namespace App\Http\Controllers;
use App\Models\Calumnomovimiento;
use Illuminate\Http\Request;

class CalumnomovimientoController extends Controller
{
    public function index(){
        return view('calumnomovimiento.view');
    }
   
    public function fetchCalumnomovimientoData(Request $request){
        $query = Calumnomovimiento::select('id','idalumno','idusuario','idmotivobaja','idtipomovimiento');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('idalumno','like','%'.$request->searchQuery.'%');
                $q->orwhere('idusuario','like','%'.$request->searchQuery.'%');
                $q->orwhere('idmotivobaja','like','%'.$request->searchQuery.'%');
                $q->orwhere('idtipomovimiento','like','%'.$request->searchQuery.'%');
                
            });
        }
        $calumnomovimientos = $query->get();
        return $calumnomovimientos;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('calumnomovimiento.form')->with($data);
    }
    public function store(Request $request){
        $calumnomovimiento = new Calumnomovimiento;
        $calumnomovimiento-> idalumno = $request->idalumno;
        $calumnomovimiento-> idusuario = $request->idusuario;
        $calumnomovimiento-> idmotivobaja = $request->idmotivobaja;
        $calumnomovimiento-> idtipomovimiento = $request->idtipomovimiento;
        $calumnomovimiento-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Movimiento Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('calumnomovimiento.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('calumnomovimiento.form')->with($data);
    }
    public function editdata($id){
        $cmodalidad = Calumnomovimiento::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cmodalidad,
        ]);
    }

    public function update(Request $request, $id){
        $calumnomovimiento = Calumnomovimiento::find($id);
        $calumnomovimiento-> idalumno = $request->idalumno;
        $calumnomovimiento-> idusuario = $request->idusuario;
        $calumnomovimiento-> idmotivobaja = $request->idmotivobaja;
        $calumnomovimiento-> idtipomovimiento = $request->idtipomovimiento;
        $calumnomovimiento-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Movimiento Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $calumnomovimiento = Calumnomovimiento::find($id);
        $calumnomovimiento->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Movimiento Eliminado Correctamente',
        ]);
    }
}
