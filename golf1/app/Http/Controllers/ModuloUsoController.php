<?php

namespace AppGolf\Http\Controllers;

use Illuminate\Http\Request;

use AppGolf\Http\Requests;
use AppGolf\Http\Controllers\Controller;
use AppGolf\Modulo;
use AppGolf\ModuloUso;
use AppGolf\User;
use Carbon\Carbon;
use Session;
use Redirect;
use Auth;
use DB;

class ModuloUsoController extends Controller
{
    
    public function index()
    {

      $modules = DB::table('modulos')
            ->orderBy('id', 'asc')
            ->get();

      $modulesuse = DB::table('modulo_usos')   
                ->where('status', '=', 1)
                ->get();   

// 00:00:21
      foreach ($modules as $module){
        $module->status = 0;
        $module->init_time = 0;
        $module->end_time =0;
        $module->remaining_time = 0;
        $module->string_fecha = "0";
        $module->cadi = 0;
        $module->nombre_cadi = "NA";
        $module->nombre_cliente = "NA";
         foreach ($modulesuse as $mu ) {
             if($module->id == $mu->modulo_id){
                $module->status = 1;
                $module->init_time = $mu->init_time;
                $module->end_time = Carbon::parse($mu->end_time);
                $module->remaining_time = $module->end_time->diff(Carbon::now());
                $module->string_fecha = $module->remaining_time->format(" %i minutos, %s segundos");
                $module->cadi = $mu->user_id;
                $module->nombre_cadi = User::find($mu->user_id)->name;
                $module->nombre_cliente = $mu->nombre_cliente;
             }
         }
      }
     return view('usomodulo.index',compact('modules'));    
    }

    public function asignar($idmodulo){
        $modulo = Modulo::find($idmodulo);
        return view('usomodulo.asignar',compact('modulo'));
    }

    public function terminar($idmodulo)
    {     
        ModuloUso::where('modulo_id', $idmodulo)->where('status',1)->update(array('status' => 0));
        Session::flash('message','Terminado Correctamente');
        return $this->index();
    }
 
   public function cancelar($idmodulo)
    {     
        ModuloUso::where('modulo_id', $idmodulo)->where('status',1)->update(array('status' => 2));
        Session::flash('message',' Cancelado Correctamente');
        return $this->index();
    }
    
    public function store(Request $request)
    {

        $numero = $request['numero'];
        $module = DB::table('modulos')
                ->where('numero', '=', $numero)
                ->first();
        ModuloUso::create([
            'modulo_id' => $module->id, 
            'user_id' => Auth::user()->id,
            'init_time' => Carbon::now(),
            'end_time' =>  Carbon::now()->addMinutes($request['minutos']),
            'minutos' => $request['minutos'],
            'status' => 1,
            'nombre_cliente' => $request['nombre_cliente'],
        ]);
        return redirect('/uso')->with('message','Creado exitosamente');
    }


}