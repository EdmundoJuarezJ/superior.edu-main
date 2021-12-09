<?php
namespace App\Http\Controllers;
use App\Models\Cplanestudio;
use Illuminate\Http\Request;


class CplanestudioController extends Controller
{
    public function index(){
        return view('cplanestudio.view');
    }

    public function fetchCplanestudioData(Request $request){
        $query = Cplanestudio::select('id', 'nombre', 'nombre_corto', 'estatus', 'num_creditos_total',
                                        'num_creditos_min', 'num_creditos_max', 'idcarrera');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre_corto','like','%'.$request->searchQuery.'%');
                $q->orwhere('estatus','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_creditos_total','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_creditos_min','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_creditos_max','like','%'.$request->searchQuery.'%');
                $q->orwhere('idcarrera','like','%'.$request->searchQuery.'%');
                
            });
        }
        $cplanestudios = $query->get();
        return $cplanestudios;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cplanestudio.form')->with($data);
    }
    public function store(Request $request){
        $cplanestudio = new Cplanestudio;
        $cplanestudio -> nombre = $request->nombre;
        $cplanestudio -> nombre_corto = $request->nombre_corto;
        $cplanestudio -> estatus = $request->estatus;
        $cplanestudio -> num_creditos_total = $request->num_creditos_total;
        $cplanestudio -> num_creditos_min = $request->num_creditos_min;
        $cplanestudio -> num_creditos_max = $request->num_creditos_max;
        $cplanestudio -> idcarrera = $request->idcarrera;
        $cplanestudio-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Plan de Estudio Guardado Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cplanestudio.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cplanestudio.form')->with($data);
    }
    public function editdata($id){
        $cplanestudio = Cplanestudio::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cplanestudio,
        ]);
    }
    public function update(Request $request, $id){
        $cplanestudio = Cplanestudio::find($id);
        $cplanestudio -> nombre = $request->nombre;
        $cplanestudio -> nombre_corto = $request->nombre_corto;
        $cplanestudio -> estatus = $request->estatus;
        $cplanestudio -> num_creditos_total = $request->num_creditos_total;
        $cplanestudio -> num_creditos_max = $request->num_creditos_max;
        $cplanestudio -> num_creditos_min = $request->num_creditos_min;
        $cplanestudio -> idcarrera = $request->idcarrera;
        $cplanestudio-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Plan de Estudio Actualizado Correctamente',
        ]);
    }
    public function delete($id){
        $cplanestudio = Cplanestudio::find($id);
        $cplanestudio->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Plan de estudio Eliminado Correctamente',
        ]);
    }
}
