@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas/{ID}"-->
<form action="{{ url('/admin/facultad/'.$facultad->cod_facultad.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Facultad</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $facultad->nombre}}">
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control" name="decano" id="decano" value="{{ $facultad->decano}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label>
		<input type="text" class="form-control" name="estado" id="estado" value="{{ $facultad->estado}}">
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/facultades') }}">Regresar ←</a>

</form>
</div>

@endsection