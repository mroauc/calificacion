@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/estilo.css">

<div class="container">

<style>
	p {
 		 font-size: 200%;
	}
	.rojo {
 		 color: red;
	}
	.verde {
  		color: green;
	}	
</style>


<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error}}</li>
		@endforeach
	</ul>
</div>
@endif

<!--Seccion que mediante el llenado de un formulario, permite crear una encuesta.
	Posteriormente, los datos son enviados mediante el método POST a la url "/encuestas"-->
<form action="{{url('/admin/guardarComision')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="año" class="control-label">{{'Año'}}</label>
		<input type="text" class="form-control {{$errors->has('año')?'is-invalid':''}}" name="año" id="año" placeholder="Año en que la comisión evalúa">
		{!! $errors->first('año','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="facultad" class="control-label">{{'Facultad'}}</label><br>
		<select name="facultad" size="1" style="
			    display: block;
				width: 100%;
    			height: calc(2.19rem + 2px);
				padding: .375rem .75rem;
				font-size: .9rem;
				line-height: 1.6;
				color: #495057;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #ced4da;
				border-radius: .25rem;">
			<option selected></option>
			@foreach($facultades as $dato)
				<option value="{{$dato->nombre}}">{{$dato->nombre}}</option>
			@endforeach
		</select>
		{!! $errors->first('facultad','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="rut_academico" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control {{$errors->has('rut_academico')?'is-invalid':''}}" name="rut_academico" id="rut_academico" placeholder="Rut">
		{!! $errors->first('rut_academico','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="decano" class="control-label">{{'Decano'}}</label>
		<input type="text" class="form-control {{$errors->has('decano')?'is-invalid':''}}" name="decano" id="decano" placeholder="Decano">
		{!! $errors->first('decano','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="miembro1" class="control-label">{{'Miembro Uno'}}</label>
		<input type="text" class="form-control {{$errors->has('miembro1')?'is-invalid':''}}" name="miembro1" id="miembro1" placeholder="Miembro 1">
		{!! $errors->first('miembro1','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="miembro2" class="control-label">{{'Miembro Dos'}}</label>
		<input type="text" class="form-control {{$errors->has('miembro2')?'is-invalid':''}}" name="miembro2" id="miembro2" placeholder="Miembro 2">
		{!! $errors->first('miembro2','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="fecha_pie" class="control-label">{{'Fecha Pie'}}</label>
		<input type="text" class="form-control {{$errors->has('fecha_pie')?'is-invalid':''}}" name="fecha_pie" id="fecha_pie" placeholder="dd/mm/aaaa">
		{!! $errors->first('fecha_pie','<div class="invalid-feedback">:message</div>') !!}
	</div>


	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('admin/comisiones') }}">Regresar ←</a>

</form>
</div>
@endsection