@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<table class="table table-light table-hover">

	<!-- Cabecera de la tabla, donde se especifica los datos que tendrá cada columna-->
	<thread class="thread-light">
		<tr>
			<th>Rut1</th>
			<th>Nombre(s)</th>
			<th>Apellido(s)</th>
			<th>Departamento</th>
			<th>Título Profesional</th>
			<th>Estado</th>
			<th>Editar</th>
		</tr>
	</thread>

	<tbody>
		<!-- Mediante un ciclo For, se mostrará dentro de la tabla el contenido de cada encuesta-->
		@foreach($datos as $academico)
		<tr>
			<td>{{ $academico->rut}}</td>
			<td>{{ $academico->nombre}}</td>
			<td>{{ $academico->apellido}}</td>
			<td>{{ $academico->departamento}}</td>
			<td>{{ $academico->titulo}}</td>
			<td>{{ $academico->estado}}</td>
			<td>
			<a class="btn btn-warning" href="{{ url('/admin/editarAcademico'.$academico->rut.'/edit') }}">✎
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<a href="{{ url('admin/academicos') }}" class="btn btn-success" >Volver</a>

</div>
@endsection