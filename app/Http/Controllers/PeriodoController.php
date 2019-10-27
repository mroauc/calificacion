<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller{

    public function index(){
        return view('periodo.index');
    }

    public function accion(Request $request){
    	/*Validación de que se ingresa el campo*/
    	$campos=[
            'year' => 'required|string|min:4'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    	$accion=$request->input('accion');
    	/*Inicio proceso de accion*/
    	$año=$request->input('year');
    	$datosPeriodo=Periodo::where('año','=',$año)->get();
    	if($datosPeriodo=='[]'){
    		$nuevoPeriodo=new Periodo();
    		$nuevoPeriodo->año=$año;
    		$nuevoPeriodo->save();
    	}
    	$estado=Periodo::where('año','=',$año)->get('estado')->first();
    	if($accion=="Iniciar Periodo"){
    		if($estado->estado=="INACTIVO"){
    			Periodo::where('año','=',$año)->update(['estado'=>"ACTIVO"]);
        		return redirect('admin/periodos')->with('Mensaje','El periodo ahora está activo');
    		}else{
    			return redirect('admin/periodos')->with('Mensaje','El periodo ya se encuentra activo');
    		}
    	}else{
    		if($estado->estado=="INACTIVO"){
    			return redirect('admin/periodos')->with('Mensaje','El periodo ya se encuentra inactivo');
    		}else{
    			Periodo::where('año','=',$año)->update(['estado'=>"INACTIVO"]);
    			return redirect('admin/periodos')->with('Mensaje','El periodo ahora está inactivo');
    		}
    	}
    }
}
