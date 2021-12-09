<?php

namespace App\Http\Controllers;
use App\Models\Centidad;
use Illuminate\Http\Request;

class CentidadController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:entidades.index'); // protege todas las funciones
    }


public function index(){
    return view('centidad.view');
}

public function fetchCentidadData(Request $request){
    $query = Centidad::select('id', 'nombre');
    if($request->searchQuery){
        $query->where(function ($q) use($request){
            $q->orwhere('id','like','%'.$request->searchQuery.'%');
            $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
        });
    }
    $centidades = $query->get();
    return $centidades;
}

public function create(){
    $data= [
        'scope' => 'create'
    ];
    return view('centidad.form')->with($data);
}
public function store(Request $request){
    $centidad = new Centidad;
    $centidad -> nombre = $request->nombre;
    $centidad-> save();
    return response()->json([
        'status'=>200,
        'message'=>'Entidad Guardad Correctamente',
    ]);
}
public function edit($id){
    $data = [
        'scope' => 'edit',
        'id'=> $id,
    ];
    return view('centidad.form')->with($data);
}
public function showpage($id){
    $data = [
        'scope' => 'show',
        'id' => $id,
    ];
    return view('centidad.form')->with($data);
}
public function editdata($id){
    $centidad = Centidad::find($id);
    return response()->json([
        'status'=>200,
        'data'=>$centidad,
    ]);
}
public function update(Request $request, $id){
    $centidad = Centidad::find($id);
    $centidad -> nombre = $request->nombre;
    $centidad-> save();
    return response()->json([
        'status'=>200,
        'message'=>'Entidad Actualizada Correctamente',
    ]);
}
public function delete($id){
    $centidad = Centidad::find($id);
    $centidad->delete();

    return response()->json([
        'status'=>200,
        'message'=>'Entidad Eliminada Correctamente',
    ]);
}
}

