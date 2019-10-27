@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas/{ID}"-->
<form action="{{ url('/admin/academico/'.$academico->rut.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Académico</h2>

	<div class="form-group">
		<label for="rut" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control" name="rut" id="rut" value="{{ $academico->rut}}" readonly="readonly">
	</div>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $academico->nombre}}">
	</div>

	<div class="form-group">
		<label for="apellido" class="control-label">{{'Apellido'}}</label>
		<input type="text" class="form-control" name="apellido" id="apellido" value="{{ $academico->apellido}}">
	</div>

	<div class="form-group">
		<label for="titulo" class="control-label">{{'Titulo Profesional'}}</label>
		<input type="text" class="form-control" name="titulo" id="titulo" value="{{ $academico->titulo}}">
	</div>

	<div class="form-group">
		<label for="grado_academico" class="control-label">{{'Grado Academico'}}</label>
		<input type="text" class="form-control" name="grado_academico" id="grado_academico" value="{{ $academico->grado_academico}}">
	</div>

	<div class="form-group">
		<label for="departamento" class="control-label">{{'Departamento'}}</label>
		<input type="text" class="form-control" name="departamento" id="departamento" value="{{ $academico->departamento}}">
	</div>

	<div class="form-group">
		<label for="categoria" class="control-label">{{'Categoria'}}</label>
		<input type="text" class="form-control" name="categoria" id="categoria" value="{{ $academico->categoria}}">
	</div>

	<div class="form-group">
		<label for="horas_contrato" class="control-label">{{'Horas'}}</label>
		<input type="text" class="form-control" name="horas_contrato" id="horas_contrato" value="{{ $academico->horas_contrato}}">
	</div>

	<div class="form-group">
		<label for="tipo_planta" class="control-label">{{'Tipo Planta'}}</label>
		<input type="text" class="form-control" name="tipo_planta" id="tipo_planta" value="{{ $academico->tipo_planta}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label>
		<input type="text" class="form-control" name="estado" id="estado" value="{{ $academico->estado}}">
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/academicos') }}">Regresar ←</a>

</form>
</div>

@endsection