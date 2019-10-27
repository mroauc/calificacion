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
<form action="{{url('/admin/guardarAcademico')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="rut" class="control-label">{{'Rut'}}</label>
		<input type="text" class="form-control {{$errors->has('rut')?'is-invalid':''}}" name="rut" id="rut" placeholder="Rut">
		{!! $errors->first('rut','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="nombre" class="control-label">{{'Nombre'}}</label>
		<input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" placeholder="Nombre(s)">
		{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="apellido" class="control-label">{{'Apellido'}}</label>
		<input type="text" class="form-control {{$errors->has('apellido')?'is-invalid':''}}" name="apellido" id="apellido" placeholder="Apellido(s)">
		{!! $errors->first('apellido','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="titulo" class="control-label">{{'Titulo Profesional'}}</label>
		<input type="text" class="form-control {{$errors->has('titulo')?'is-invalid':''}}" name="titulo" id="titulo" placeholder="Título Profesional">
		{!! $errors->first('titulo','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="grado_academico" class="control-label">{{'Grado Académico'}}</label>
		<input type="text" class="form-control {{$errors->has('grado_academico')?'is-invalid':''}}" name="grado_academico" id="grado_academico" placeholder="Grado Académico">
		{!! $errors->first('grado_academico','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="departamento" class="control-label">{{'Departamento'}}</label><br>
		<select name="departamento" size="1" style="
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
				@foreach($departamentos as $dato)
					<option value="{{$dato->nombre}}">{{$dato->nombre}}</option>
				@endforeach
		</select>
		{!! $errors->first('departamento','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="categoria" class="control-label">{{'Categoria'}}</label><br>
		<select name="categoria" size="1" style="
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
				<option value="Instructor">Instructor</option>
				<option value="Auxiliar">Auxiliar</option>
				<option value="Adjunto">Adjunto</option>
				<option value="Titular">Titular</option>
		</select>
		{!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="horas_contrato" class="control-label">{{'Horas'}}</label>
		<input type="text" class="form-control {{$errors->has('horas_contrato')?'is-invalid':''}}" name="horas_contrato" id="horas_contrato" placeholder="Máximo 44">
		{!! $errors->first('horas_contrato','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
		<label for="tipo_planta" class="control-label">{{'Tipo Planta'}}</label>
		<input type="text" class="form-control {{$errors->has('tipo_planta')?'is-invalid':''}}" name="tipo_planta" id="tipo_planta" placeholder="El tipo de Planta">
		{!! $errors->first('tipo_planta','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<input type="submit" class="btn btn-success" value="Agregar ✚">
	<a class="btn btn-primary" href="{{ url('admin/academicos') }}">Regresar ←</a>

</form>
</div>
@endsection