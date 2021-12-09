<?php
namespace App\Http\Controllers;
use App\Models\Cmodalidad;
use Illuminate\Http\Request;

class CmodalidadController extends Controller
{
    public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:modalidades.index'); // protege todas las funciones
		}

    public function index(){
        return view('cmodalidad.view');
    }

    public function fetchCmodalidadData(Request $request){
        $query = Cmodalidad::select('id', 'nombre');
        if($request->searchQuery){
            $query->where(function ($q) use($request){
                $q->orwhere('id','like','%'.$request->searchQuery.'%');
                $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
            });
        }
        $cmodalidades = $query->get();
        return $cmodalidades;
    }

    public function create(){
        $data= [
            'scope' => 'create'
        ];
        return view('cmodalidad.form')->with($data);
    }
    public function store(Request $request){
        $cmodalidad = new Cmodalidad;
        $cmodalidad -> nombre = $request->nombre;
        $cmodalidad-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Modalidad Guardad Correctamente',
        ]);
    }
    public function edit($id){
        $data = [
            'scope' => 'edit',
            'id'=> $id,
        ];
        return view('cmodalidad.form')->with($data);
    }
    public function showpage($id){
        $data = [
            'scope' => 'show',
            'id' => $id,
        ];
        return view('cmodalidad.form')->with($data);
    }
    public function editdata($id){
        $cmodalidad = Cmodalidad::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$cmodalidad,
        ]);
    }
    public function update(Request $request, $id){
        $cmodalidad = Cmodalidad::find($id);
        $cmodalidad -> nombre = $request->nombre;
        $cmodalidad-> save();
        return response()->json([
            'status'=>200,
            'message'=>'Modalidad Actualizada Correctamente',
        ]);
    }
    public function delete($id){
        $cmodalidad = Cmodalidad::find($id);
        $cmodalidad->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Modalidad Eliminada Correctamente',
        ]);
    }
}
