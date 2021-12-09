<?php

namespace App\Http\Controllers;
use App\Models\Cperiodo;
use Illuminate\Http\Request;

class CperiodoController extends Controller
{
    public function index(){
        return view('cperiodo.view');
    }

    public function fetchCperiodoData(Request $request){
        $query = Cperiodo::select('id', 'nombre', 'fecha_inicio', 'fecha_fin');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('fecha_inicio','like','%'.$request->searchQuery.'%');
                $q->orwhere('fecha_fin','like','%'.$request->searchQuery.'%');
            });
        }
        $cperiodos = $query->get();
        return $cperiodos;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cperiodo.form')->with($data);
    }
    public function store(Request $request){
        $cperiodo = new Cperiodo;
        $cperiodo -> nombre = $request->nombre;
        $cperiodo -> fecha_inicio = $request->fecha_inicio;
        $cperiodo -> fecha_fin = $request->fecha_fin;
        $cperiodo-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Periodo Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cperiodo.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cperiodo.form')->with($data);
    }
    public function editdata($id){
        $cperiodo = Cperiodo::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cperiodo,
        ]);
    }
    public function update(Request $request, $id){
        $cperiodo = Cperiodo::find($id);
        $cperiodo -> nombre = $request->nombre;
        $cperiodo -> fecha_inicio = $request->fecha_inicio;
        $cperiodo -> fecha_fin = $request->fecha_fin;
        $cperiodo-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Periodo Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $cperiodo = Cperiodo::find($id);
        $cperiodo->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Periodo Eliminado Correctamente',
        ]);
    }
}
