<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ccarrera;
class CcarreraController extends Controller
{
  public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:carreras.index'); // protege todas las funciones
		}


    public function index(){
      return view('ccarrera.view');
    }

    public function fetchCcarreraData(Request $request){
      $query = Ccarrera::select('id','nombre','nombre_corto','estatus','idmodalidad');
        if($request->searchQuery){
          $query->where(function ($q) use($request){
            $q->orWhere('id','like','%'.$request->searchQuery.'%');
            $q->orWhere('nombre','like','%'.$request->searchQuery.'%');
            $q->orWhere('nombre_corto','like','%'.$request->searchQuery.'%');
            $q->orWhere('estatus','like','%'.$request->searchQuery.'%');
            $q->orWhere('idmodalidad','like','%'.$request->searchQuery.'%');
          });
        }
      $ccarreras = $query->get();
      return $ccarreras;
    }

    public function create(){
      $data = [
        'scope' => 'create'
      ];
      return view('ccarrera.form')->with($data);
    }

    public function store(Request $request){
      $ccarrera = new Ccarrera;
      $ccarrera->nombre = $request->nombre;
      $ccarrera->nombre_corto = $request->nombre_corto;
      $ccarrera->estatus = $request->estatus;
      $ccarrera->idmodalidad = $request->idmodalidad;
      $ccarrera->save();

      return response()->json([
        'status'=>200,
        'message'=>'Carrera Saved Successfully',

      ]);
    }

    public function edit($id){
      $data = [
        'scope' => 'edit',
        'id' => $id,
      ];
      return view('ccarrera.form')->with($data);
    }

    public function showpage($id){
      $data = [
        'scope' => 'show',
        'id' => $id,
      ];
      return view('ccarrera.form')->with($data);
    }

    public function editdata($id){
      $ccarrera = Ccarrera::find($id);
      return response()->json([
        'status'=>200,
        'data'=>$ccarrera,

      ]);
    }

    public function update(Request $request, $id){
      $ccarrera = Ccarrera::find($id);
      $ccarrera->nombre = $request->nombre;
      $ccarrera->nombre_corto = $request->nombre_corto;
      $ccarrera->estatus = $request->estatus;
      $ccarrera->idmodalidad = $request->idmodalidad;
      $ccarrera->update();

      return response()->json([
        'status'=>200,
        'message'=>'Carrera Updated Successfully',
      ]);
    }

    public function delete($id){
      $ccarrera = Ccarrera::find($id);
      $ccarrera->delete();
      return response()->json([
        'status'=>200,
        'message'=>'Carrera Deleted Successfully',
      ]);
    }

}
