@extends('layouts.app')

@section('content')

<div class="container">

<!--Seccion que mediante el llenado de un formulario, permite editar una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas/{ID}"-->
<form action="{{ url('/admin/usuario/'.$user->email.'/update')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

<h2>Editar Usuario</h2>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->nombre}}">
	</div>

	<div class="form-group">
		<label for="apellidos" class="control-label">{{'Apellidos'}}</label>
		<input type="text" class="form-control" name="apellidos" id="apellidos" value="{{ $user->apellidos}}">
	</div>

	<div class="form-group">
		<label for="permiso" class="control-label">{{'Permiso'}}</label>
		<input type="text" class="form-control" name="permiso" id="permiso" value="{{ $user->permiso}}">
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label>
		<input type="text" class="form-control" name="facultad" id="facultad" value="{{ $user->facultad}}">
	</div>

	<div class="form-group">
		<label for="estado" class="control-label">{{'Estado'}}</label>
		<input type="text" class="form-control" name="estado" id="estado" value="{{ $user->estado}}">
	</div>

	<input type="submit" class="btn btn-success" value="Modificar ✍">

	<a class="btn btn-primary" href="{{ url('admin/usuarios') }}">Regresar ←</a>

</form>
</div>

@endsection