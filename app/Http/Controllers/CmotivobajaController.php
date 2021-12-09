<?php

namespace App\Http\Controllers;
use App\Models\Cmotivobaja;
use Illuminate\Http\Request;

class CmotivobajaController extends Controller
{
    public function index(){
        return view('cmotivobaja.view');
    }

    public function fetchCmotivobajaData(Request $request){
        $query = Cmotivobaja::select('id', 'nombre', 'estatus', 'idrole');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('estatus','like','%'.$request->searchQuery.'%');
                $q->orwhere('idrole','like','%'.$request->searchQuery.'%');
            });
        }
        $cmotivobajas = $query->get();
        return $cmotivobajas;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cmotivobaja.form')->with($data);
    }
    public function store(Request $request){
        $cmotivobaja = new Cmotivobaja;
        $cmotivobaja -> nombre = $request->nombre;
        $cmotivobaja -> estatus = $request->estatus;
        $cmotivobaja -> idrole = $request->idrole;
        $cmotivobaja -> save();
        return response()->json([
            'status'=>200,
            'message'=>'Motivo Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cmotivobaja.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cmotivobaja.form')->with($data);
    }
    public function editdata($id){
        $cmotivobaja = Cmotivobaja::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cmotivobaja,
        ]);
    }
    public function update(Request $request, $id){
        $cmotivobaja = Cmotivobaja::find($id);
        $cmotivobaja -> nombre = $request->nombre;
        $cmotivobaja -> estatus = $request->estatus;
        $cmotivobaja -> idrole = $request->idrole;
        $cmotivobaja-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Motivo Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $cmotivobaja = Cmotivobaja::find($id);
        $cmotivobaja->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Motivo Eliminado Correctamente',
        ]);
    }
}
