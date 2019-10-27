<?php

namespace App\Http\Controllers;

use App\Comision;
use App\facultad;
use Illuminate\Http\Request;

class ComisionController extends Controller{

    public function index(){
    	$datos=Comision::paginate(3);
    	return view('comision.index',compact('datos'));
    }

    public function create(Request $request){
        $facultades=facultad::all();
    	return view('comision.create',compact('facultades'));
    }

    public function store(Request $request){
    	$campos=[
            'año' => 'required|string|min:2',
            'facultad' => 'required|string|min:2',
            'rut_academico' => 'required|string|max:100',
            'decano' => 'required|string|max:100',
            'miembro1' => 'required|string|max:100',
            'miembro2' => 'required|string|max:100',
            'fecha_pie' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosComision=request()->except('_token');
        Comision::insert($datosComision);
        return redirect('admin/comisiones')->with('Mensaje','Comisión agregada con éxito');
    }

    public function buscar(Request $request){
    	$id_comision=request()->input('id_comision');
    	$datos=Comision::where('id_comision','=',$id_comision)->get();
    	return view('comision.buscar',compact('datos'));
    }

    public function edit($id_comision){
    	$comision=Comision::findOrFail($id_comision);
    	return view('comision.edit',compact('comision'));
    }

    public function update(Request $request, $id_comision){
    	$datosComision=request()->except('_token');
    	Comision::where('id_comision','=',$id_comision)->update($datosComision);
    	return redirect('admin/comisiones')->with('Mensaje','Comisión actualizada con éxito');
    }

}
