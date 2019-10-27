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
<h2>Periodos</h2><br>

<a href="{{ url('admin/periodos') }}" class="btn btn-success" >↻ Refrescar</a>
<a href="{{ url('index') }}" class="btn btn-success" >⏎ Regresar</a>
<br/>
<br/>

<!-- Seccion que permite que hará que todo lo que se muestre a continuacion, sea dentro de una tabla-->
<form action="{{url('/admin/añoPeriodo/')}}" class="form-horizontal" method="post">
{{ csrf_field() }}

	<table class="table table-light table-hover">

		<thread class="thread-light">
			<tr>
				<th>Año a Evaluar</th>
			</tr>
		</thread>

		<tbody>
			<tr>
				<td>
					<select id="year" name="year">
						<option value="0">Año</option>
						<?php  for($i=2018;$i<=2025;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
					</select>
				</td>
				<td><input type="submit" class="btn btn-primary" name="accion" value="Iniciar Periodo"></td>
				<td><input type="submit" class="btn btn-danger" name="accion" value="Finalizar Periodo"></td>
			</tr>
		</tbody>

	</table>
</form>

</div>
@endsection