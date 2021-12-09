<?php

namespace App\Http\Controllers;
use App\Models\Cmovimiento;
use Illuminate\Http\Request;

class CmovimientoController extends Controller
{
    public function __construct()
		{
            $this->middleware('auth');
			$this->middleware('can:movimientos.index'); // protege todas las funciones
		}

    public function index(){
        return view('cmovimiento.view');
      }
  
      public function fetchCmovimientoData(Request $request){
        $query = Cmovimiento::select('id','nombre', 'estatus','idrole');
          if($request->searchQuery){
            $query->where(function ($q) use($request){
              $q->orWhere('id','like','%'.$request->searchQuery.'%');
              $q->orWhere('nombre','like','%'.$request->searchQuery.'%');
              $q->orWhere('estatus','like','%'.$request->searchQuery.'%');
              $q->orWhere('idrole','like','%'.$request->searchQuery.'%');
            });
          }
        $cmovimientos = $query->get();
        return $cmovimientos;
      }
  
      public function create(){
        $data = [
          'scope' => 'create'
        ];
        return view('cmovimiento.form')->with($data);
      }
  
      public function store(Request $request){
        $cmovimiento = new Cmovimiento;
        $cmovimiento->nombre = $request->nombre;
        $cmovimiento->estatus = $request->estatus;
        $cmovimiento->idrole = $request->idrole;
        $cmovimiento->save();
  
        return response()->json([
          'status'=>200,
          'message'=>'Movimiento Guardado Exitosamente',
  
        ]);
      }
  
      public function edit($id){
        $data = [
          'scope' => 'edit',
          'id' => $id,
        ];
        return view('cmovimiento.form')->with($data);
      }
  
      public function showpage($id){
        $data = [
          'scope' => 'show',
          'id' => $id,
        ];
        return view('cmovimiento.form')->with($data);
      }
  
      public function editdata($id){
        $cmovimiento = Cmovimiento::find($id);
        return response()->json([
          'status'=>200,
          'data'=>$cmovimiento,
  
        ]);
      }
  
      public function update(Request $request, $id){
        $cmovimiento = Cmovimiento::find($id);
        $cmovimiento->nombre = $request->nombre;
        $cmovimiento->estatus = $request->estatus;
        $cmovimiento->idrole = $request->idrole;
        $cmovimiento->update();
  
        return response()->json([
          'status'=>200,
          'message'=>'Movimiento Actualizado Exitosamente',
        ]);
      }
  
      public function delete($id){
        $cmovimiento = Cmovimiento::find($id);
        $cmovimiento->delete();
        return response()->json([
          'status'=>200,
          'message'=>'Movimiento Eliminado Exitosamente',
        ]);
      }
  
}
