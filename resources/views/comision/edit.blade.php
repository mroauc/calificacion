@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas/{ID}"-->
<form action="{{ url('/admin/comision/'.$comision->id_comision.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Comisión</h2>

	<div class="form-group">
		<label for="año" class="control-label">{{'Año'}}</label>
		<input type="text" class="form-control" name="año" id="año" value="{{ $comision->año}}" readonly="readonly">
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label>
		<input type="text" class="form-control" name="facultad" id="facultad" value="{{ $comision->facultad}}">
	</div>

	<div class="form-group">
		<label for="rut_academico" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control" name="rut_academico" id="rut_academico" value="{{ $comision->rut_academico}}">
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control" name="decano" id="decano" value="{{ $comision->decano}}">
	</div>

	<div class="form-group">
		<label for="miembro1" class="control-label">{{'Miembro Uno'}}</label>
		<input type="text" class="form-control" name="miembro1" id="miembro1" value="{{ $comision->miembro1}}">
	</div>

	<div class="form-group">
		<label for="miembro2" class="control-label">{{'Miembro Dos'}}</label>
		<input type="text" class="form-control" name="miembro2" id="miembro2" value="{{ $comision->miembro2}}">
	</div>

	<div class="form-group">
		<label for="fecha_pie" class="control-label">{{'Fecha Pie'}}</label>
		<input type="text" class="form-control" name="fecha_pie" id="fecha_pie" value="{{ $comision->fecha_pie}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label>
		<input type="text" class="form-control" name="estado" id="estado" value="{{ $comision->estado}}">
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/comisiones') }}">Regresar ←</a>

</form>
</div>

@endsection