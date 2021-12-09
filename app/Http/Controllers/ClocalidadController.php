<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clocalidad;

class ClocalidadController extends Controller
{
  public function __construct()
  {
          $this->middleware('auth');
    $this->middleware('can:localidades.index'); // protege todas las funciones
  }
    public function index(){
        return view('clocalidad.view');
      }
  
      public function fetchClocalidadData(Request $request){
        $query = Clocalidad::select('id','nombre', 'idmunicipio');
          if($request->searchQuery){
            $query->where(function ($q) use($request){
              $q->orWhere('id','like','%'.$request->searchQuery.'%');
              $q->orWhere('nombre','like','%'.$request->searchQuery.'%');
              $q->orWhere('idmunicipio','like','%'.$request->searchQuery.'%');
            });
          }
        $clocalidades = $query->get();
        return $clocalidades;
      }
  
      public function create(){
        $data = [
          'scope' => 'create'
        ];
        return view('clocalidad.form')->with($data);
      }
  
      public function store(Request $request){
        $clocalidad = new Clocalidad;
        $clocalidad->nombre = $request->nombre;
        $clocalidad->idmunicipio = $request->idmunicipio;
        $clocalidad->save();
  
        return response()->json([
          'status'=>200,
          'message'=>'Localidad Guardada Exitosamente',
  
        ]);
      }
  
      public function edit($id){
        $data = [
          'scope' => 'edit',
          'id' => $id,
        ];
        return view('clocalidad.form')->with($data);
      }
  
      public function showpage($id){
        $data = [
          'scope' => 'show',
          'id' => $id,
        ];
        return view('clocalidad.form')->with($data);
      }
  
      public function editdata($id){
        $clocalidad = Clocalidad::find($id);
        return response()->json([
          'status'=>200,
          'data'=>$clocalidad,
  
        ]);
      }
  
      public function update(Request $request, $id){
        $clocalidad = Clocalidad::find($id);
        $clocalidad->nombre = $request->nombre;
        $clocalidad->idmunicipio = $request->idmunicipio;
        $clocalidad->update();
  
        return response()->json([
          'status'=>200,
          'message'=>'Localidad Actualizada Exitosamente',
        ]);
      }
  
      public function delete($id){
        $clocalidad = Clocalidad::find($id);
        $clocalidad->delete();
        return response()->json([
          'status'=>200,
          'message'=>'Localidad Eliminada Exitosamente',
        ]);
      }
}
