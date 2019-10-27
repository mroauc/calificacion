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
<h2>Comisiones</h2><br>
<form action="{{url('/admin/buscarComision')}}" class="form-horizontal" method="post">
	{{ csrf_field() }}
	<div class="form-group">
		<input type="text" class="form-control {{$errors->has('id_comision')?'is-invalid':''}}" name="id_comision" id="id_comision" placeholder="Búsqueda Global">
		{!! $errors->first('id_comision','<div class="invalid-feedback">:message</div>') !!}
	</div>
</form>

<a href="{{ url('admin/añadirComision') }}" class="btn btn-success" >✚ Nueva Comisión</a>
<a href="{{ url('admin/comisiones') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Facultad</th>
			<th>Año</th>
			<th>Rut</th>
			<th>Decano</th>
			<th>Miembro Uno</th>
			<th>Miembro Dos</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada comision-->
		@foreach($datos as $comision)
		<tr>
			<td>{{ $comision->facultad}}</td>
			<td>{{ $comision->año}}</td>
			<td>{{ $comision->rut_academico}}</td>
			<td>{{ $comision->decano}}</td>
			<td>{{ $comision->miembro1}}</td>
			<td>{{ $comision->miembro2}}</td>
			<td>{{ $comision->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/comision/'.$comision->id_comision.'/edit') }}">✎
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