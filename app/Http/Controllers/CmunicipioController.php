<?php
namespace App\Http\Controllers;
use App\Models\Cmunicipio;
use Illuminate\Http\Request;

class CmunicipioController extends Controller
{
    public function index(){
        return view('cmunicipio.view');
    }

    public function fetchCmunicipioData(Request $request){
        $query = Cmunicipio::select('id', 'nombre','identidad');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('identidad','like','%'.$request->searchQuery.'%');
            });
        }
        $cmunicipios = $query->get();
        return $cmunicipios;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cmunicipio.form')->with($data);
    }
    public function store(Request $request){
        $cmunicipio = new Cmunicipio;
        $cmunicipio->nombre = $request->nombre;
        $cmunicipio->identidad = $request->identidad;
        $cmunicipio-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Municipio Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cmunicipio.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cmunicipio.form')->with($data);
    }
    public function editdata($id){
        $cmunicipio = Cmunicipio::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cmunicipio,
        ]);
    }
    public function update(Request $request, $id){
        $cmunicipio = Cmunicipio::find($id);
        $cmunicipio -> nombre = $request->nombre;
        $cmunicipio -> identidad = $request->identidad;
        $cmunicipio-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Municipio Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $cmunicipio = Cmunicipio::find($id);
        $cmunicipio->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Municipio Eliminado Correctamente',
        ]);
    }
}




