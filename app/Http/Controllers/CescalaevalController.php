<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cescalaeval;
class CescalaevalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:escalaevals.index'); // protege todas las funciones
		}

		
    public function index(){
      return view('cescalaeval.view');
  }

  public function fetchCescalaevalData(Request $request){
      $query = Cescalaeval::select('id', 'nombre', 'calificacion_min', 'calificacion_max');
      if($request->searchQuery){
          $query->where(function ($q) use($request){
              $q->orwhere('id','like','%'.$request->searchQuery.'%');
              $q->orwhere('nombre','like','%'.$request->searchQuery.'%');
              $q->orwhere('calificacion_min','like','%'.$request->searchQuery.'%');
              $q->orwhere('calificacion_max','like','%'.$request->searchQuery.'%');
          });
      }
      $cescalaevals = $query->get();
      return $cescalaevals;
  }

  public function create(){
      $data= [
          'scope' => 'create'
      ];
      return view('cescalaeval.form')->with($data);
  }
  public function store(Request $request){
      $cescalaeval = new Cescalaeval;
      $cescalaeval -> nombre = $request->nombre;
      $cescalaeval -> calificacion_min = $request->calificacion_min;
      $cescalaeval -> calificacion_max = $request->calificacion_max;
      $cescalaeval-> save();
      return response()->json([
          'status'=>200,
          'message'=>'Modalidad de Carrera Guardada Correctamente',
      ]);
  }
  public function edit($id){
      $data = [
          'scope' => 'edit',
          'id'=> $id,
      ];
      return view('cescalaeval.form')->with($data);
  }
  public function showpage($id){
      $data = [
          'scope' => 'show',
          'id' => $id,
      ];
      return view('cescalaeval.form')->with($data);
  }
  public function editdata($id){
      $cescalaeval = Cescalaeval::find($id);
      return response()->json([
          'status'=>200,
          'data'=>$cescalaeval,
      ]);
  }
  public function update(Request $request, $id){
      $cescalaeval = Cescalaeval::find($id);
      $cescalaeval -> nombre = $request->nombre;
      $cescalaeval -> calificacion_min = $request->calificacion_min;
      $cescalaeval -> calificacion_max = $request->calificacion_max;
      $cescalaeval-> save();
      return response()->json([
          'status'=>200,
          'message'=>'Modalidad de Carrera Actualizada Correctamente',
      ]);
  }
  public function delete($id){
      $cescalaeval = Cescalaeval::find($id);
      $cescalaeval->delete();

      return response()->json([
          'status'=>200,
          'message'=>'Modalidad de Carrera Eliminada Correctamente',
      ]);
  }
}
