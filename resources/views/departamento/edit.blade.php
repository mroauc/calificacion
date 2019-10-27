@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas/{ID}"-->
<form action="{{ url('/admin/departamento/'.$departamento->cod_departamento.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Departamento</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $departamento->nombre}}">
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label>
		<input type="text" class="form-control" name="facultad" id="facultad" value="{{ $departamento->facultad}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label>
		<input type="text" class="form-control" name="estado" id="estado" value="{{ $departamento->estado}}">
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/departamentos') }}">Regresar ←</a>

</form>
</div>

@endsection