@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<!--Seccion que mediante 4 botones, ofrecerá distintas funcionalidades al administrador.
	Cada botón, redirige a distintas url, según lo que se desee realizar-->
<br/>
<br/>
<br/>
<a href="{{ url('admin/ver') }}" class="btn btn-primary" >Gráficos</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-primary" >Comisiones</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-primary" >Académicos</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-primary" >Evaluar</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-primary" >Reportes</a>
<br/>
<br/>

</div>
@endsection