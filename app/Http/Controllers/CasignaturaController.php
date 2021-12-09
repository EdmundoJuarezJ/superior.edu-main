<?php
namespace App\Http\Controllers;
use App\Models\Casignatura;
use Illuminate\Http\Request;

class CasignaturaController extends Controller
{
    public function index(){
        return view('casignatura.view');
    }
    
    
    
    public function fetchCasignaturaData(Request $request){
        $query = Casignatura::select('id', 'nombre', 'nombre_corto', 'semestre', 'estatus', 'clave', 'orden', 'promediar', 'num_creditos','idplan','idescala','idantecesor');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre_corto','like','%'.$request->searchQuery.'%');
                $q->orwhere('semestre','like','%'.$request->searchQuery.'%');
                $q->orwhere('estatus','like','%'.$request->searchQuery.'%');
                $q->orwhere('clave','like','%'.$request->searchQuery.'%');
                $q->orwhere('orden','like','%'.$request->searchQuery.'%');
                $q->orwhere('promediar','like','%'.$request->searchQuery.'%');
                $q->orwhere('num_creditos','like','%'.$request->searchQuery.'%');
                $q->orwhere('idplan','like','%'.$request->searchQuery.'%');
                $q->orwhere('idescala','like','%'.$request->searchQuery.'%');
                $q->orwhere('idantecesor','like','%'.$request->searchQuery.'%');
            });
        }
        $casignaturas = $query->get();
        return $casignaturas;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('casignatura.form')->with($data);
    }
    public function store(Request $request){
        $casignatura = new Casignatura;
        $casignatura -> nombre = $request->nombre;
        $casignatura -> nombre_corto = $request->nombre_corto;
        $casignatura -> semestre = $request->semestre;
        $casignatura -> estatus = $request->estatus;
        $casignatura -> clave = $request->clave;
        $casignatura -> orden = $request->orden;
        $casignatura -> promediar = $request->promediar;
        $casignatura -> num_creditos = $request->num_creditos;
        $casignatura -> idplan = $request->idplan;
        $casignatura -> idescala = $request->idescala;
        $casignatura -> idantecesor = $request->idantecesor;
        $casignatura-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Asignatura Guardad Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('casignatura.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('casignatura.form')->with($data);
    }
    public function editdata($id){
        $casignatura = Casignatura::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$casignatura,
        ]);
    }
    public function update(Request $request, $id){
        $casignatura = Casignatura::find($id);
        $casignatura -> nombre = $request->nombre;
        $casignatura -> nombre_corto = $request->nombre_corto;
        $casignatura -> semestre = $request->semestre;
        $casignatura -> estatus = $request->estatus;
        $casignatura -> clave = $request->clave;
        $casignatura -> orden = $request->orden;
        $casignatura -> promediar = $request->promediar;
        $casignatura -> num_creditos = $request->num_creditos;
        $casignatura -> idplan = $request->num_creditos;
        $casignatura -> idescala = $request->num_creditos;
        $casignatura -> idantecesor = $request->num_creditos;
        $casignatura-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Asignatura Actualizada Correctamente',
        ]);
    }
    public function delete($id){
        $casignatura = Casignatura::find($id);
        $casignatura->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Asignatura Eliminada Correctamente',
        ]);
    }
}

