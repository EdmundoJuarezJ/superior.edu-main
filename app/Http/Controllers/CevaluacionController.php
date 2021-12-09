<?php

namespace App\Http\Controllers;
use App\Models\Cevaluacion;
use Illuminate\Http\Request;

class CevaluacionController extends Controller
{
    public function index(){
        return view('cevaluacion.view');
      }
  
      public function fetchCevaluacionData(Request $request){
        $query = Cevaluacion::select('id','calificacion','idexpediente','idusuario','idasignatura');
          if($request->searchQuery){
            $query->where(function ($q) use($request){
              $q->orWhere('id','like','%'.$request->searchQuery.'%');
              $q->orWhere('calificacion','like','%'.$request->searchQuery.'%');
              $q->orWhere('idexpediente','like','%'.$request->searchQuery.'%');
              $q->orWhere('idusuario','like','%'.$request->searchQuery.'%');
              $q->orWhere('idasignatura','like','%'.$request->searchQuery.'%');
            });
          }
        $cevaluaciones = $query->get();
        return $cevaluaciones;
      }
  
      public function create(){
        $data = [
          'scope' => 'create'
        ];
        return view('cevaluacion.form')->with($data);
      }
  
      public function store(Request $request){
        $cevaluacion = new Cevaluacion;
        $cevaluacion->calificacion = $request->calificacion;
        $cevaluacion->idexpediente = $request->idexpediente;
        $cevaluacion->idusuario = $request->idusuario;
        $cevaluacion->idasignatura = $request->idasignatura;
        $cevaluacion->save();
  
        return response()->json([
          'status'=>200,
          'message'=>'Evaluacion Guardada Exitosamente',
  
        ]);
      }
  
      public function edit($id){
        $data = [
          'scope' => 'edit',
          'id' => $id,
        ];
        return view('cevaluacion.form')->with($data);
      }
  
      public function showpage($id){
        $data = [
          'scope' => 'show',
          'id' => $id,
        ];
        return view('cevaluacion.form')->with($data);
      }
  
      public function editdata($id){
        $cevaluacion = Cevaluacion::find($id);
        return response()->json([
          'status'=>200,
          'data'=>$cevaluacion,
  
        ]);
      }
  
      public function update(Request $request, $id){
        $cevaluacion = Cevaluacion::find($id);
        $cevaluacion->calificacion = $request->calificacion;
        $cevaluacion->idexpediente = $request->idexpediente;
        $cevaluacion->idusuario = $request->idusuario;
        $cevaluacion->idasignatura = $request->idasignatura;
        $cevaluacion->update();
  
        return response()->json([
          'status'=>200,
          'message'=>'Evaluacion Actualizada Exitosamente',
        ]);
      }
  
      public function delete($id){
        $cevaluacion = Cevaluacion::find($id);
        $cevaluacion->delete();
        return response()->json([
          'status'=>200,
          'message'=>'Evaluacion Eliminada Exitosamente',
        ]);
      }
  
}
