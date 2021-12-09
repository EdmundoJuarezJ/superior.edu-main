<?php

namespace App\Http\Controllers;
use App\Models\Cgrupo;
use Illuminate\Http\Request;

class CgrupoController extends Controller
{
    public function index(){
        return view('cgrupo.view');
    }
  
    public function fetchCgrupoData(Request $request){
        $query = Cgrupo::select('id', 'nombre', 'semestre','iddocente','idusuario');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('semestre','like','%'.$request->searchQuery.'%');
                $q->orwhere('iddocente','like','%'.$request->searchQuery.'%');
                $q->orwhere('idusuario','like','%'.$request->searchQuery.'%');
            });
        }
        $cgrupos = $query->get();
        return $cgrupos;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cgrupo.form')->with($data);
    }
    public function store(Request $request){
        $cgrupo = new Cgrupo;
        $cgrupo -> nombre = $request->nombre;
        $cgrupo -> semestre = $request->semestre;
        $cgrupo -> iddocente = $request->iddocente;
        $cgrupo -> idusuario = $request->idusuario;
        $cgrupo-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Grupo Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cgrupo.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cgrupo.form')->with($data);
    }
    public function editdata($id){
        $cgrupo = Cgrupo::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cgrupo,
        ]);
    }
    public function update(Request $request, $id){
        $cgrupo = Cgrupo::find($id);
        $cgrupo -> nombre = $request->nombre;
        $cgrupo -> semestre = $request->semestre;
        $cgrupo -> iddocente = $request->iddocente;
        $cgrupo -> idusuario = $request->idusuario;  
        $cgrupo-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Grupo Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $cgrupo = Cgrupo::find($id);
        $cgrupo->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Grupo Eliminado Correctamente',
        ]);
    }
}
