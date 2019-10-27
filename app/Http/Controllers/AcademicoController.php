<?php

namespace App\Http\Controllers;

use App\Academico;
use App\Departamento;
use Illuminate\Http\Request;

class AcademicoController extends Controller
{

    public function index(){
    	$datos=Academico::paginate(3);
    	return view('academico.index',compact('datos'));
    }

    public function create(Request $request){
        $departamentos=Departamento::all();
    	return view('academico.create',compact('departamentos'));
    }

    public function store(Request $request){
    	$campos=[
            'rut' => 'required|string|min:2',
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'titulo' => 'required|string|max:100',
            'grado_academico' => 'required|string|max:100',
            'departamento' => 'required|string|min:2',
            'categoria' => 'required|string|min:2',
            'horas_contrato' => 'required|string|max:100',
            'tipo_planta' => 'required|string|max:100',
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);
    	$datosAcademico=request()->except('_token');
    	Academico::insert($datosAcademico);
    	return redirect('admin/academicos')->with('Mensaje','Académico agregado con éxito');
    }

    public function buscar(Request $request){
    	$rut=request()->input('rut');
    	$datos=Academico::where('rut','=',$rut)->get();
    	return view('academico.buscar',compact('datos'));
    }

    public function edit(Request $request, $rut){
    	$academico=Academico::findOrFail($rut);
    	return view('academico.edit',compact('academico'));
    }

    public function update(Request $request, $rut){
    	$datosAcademico=request()->except('_token');
    	Academico::where('rut','=',$rut)->update($datosAcademico);
    	return redirect('admin/academicos')->with('Mensaje','Académico actualizado con éxito');
    }

}
