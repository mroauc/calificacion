<?php

namespace App\Http\Controllers;

use App\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller{

    public function index(){
    	$datos=Facultad::paginate(3);
    	return view('facultad.index',compact('datos'));
    }

    public function create(){
    	return view('facultad.create');
    }

    public function store(Request $request){
    	$campos=[
            'nombre' => 'required|string|min:2',
            'decano' => 'required|string|max:100'
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
        $datosFacultad=request()->except('_token');
        Facultad::insert($datosFacultad);
        return redirect('admin/facultades')->with('Mensaje','Facultad agregada con éxito');
    }

    public function edit($cod_facultad){
    	$facultad=Facultad::findOrFail($cod_facultad);
    	return view('facultad.edit',compact('facultad'));
    }

    public function update(Request $request, $cod_facultad){
    	$datosFacultad=request()->except('_token');
    	Facultad::where('cod_facultad','=',$cod_facultad)->update($datosFacultad);
    	return redirect('admin/facultades')->with('Mensaje','Facultad actualizada con éxito');
    }

    public function buscar(Request $request){
    	$cod_facultad=request()->input('cod_facultad');
    	$datos=Facultad::where('cod_facultad','=',$cod_facultad)->get();
    	return view('facultad.buscar',compact('datos'));
    }

}
