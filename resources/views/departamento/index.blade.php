@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif

<!-- Boton que se ubicará en la parte superior de la pantalla, y redigirá a una url para agregar encuestas-->
<h2>Departamentos</h2><br>
<form action="{{url('/admin/buscarDepartamento')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('cod_departamento')?'is-invalid':''}}" name="cod_departamento" id="cod_departamento" placeholder="Buscar Departamento">
		{!! $errors->first('cod_departamento','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<a href="{{ url('admin/añadirDepartamento') }}" class="btn btn-success" >✚ Nuevo Departamento</a>
<a href="{{ url('admin/departamentos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Nombre</th>
			<th>Facultad</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada encuesta-->
		@foreach($datos as $departamento)
		<tr>
			<td>{{ $departamento->nombre}}</td>
			<td>{{ $departamento->facultad}}</td>
			<td>{{ $departamento->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/departamento/'.$departamento->cod_departamento.'/edit') }}">✎
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{{$datos->links()}}
</div>

</div>
@endsection