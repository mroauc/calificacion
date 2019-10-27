@extends('layouts.app')

@section('content')

<div class="container">

<!-- Seccion que permite mostrar mensajes en pantalla-->
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje')}}
</div>
@endif


<!--Sección que mediante 9 botones, ofrecerá distintas funcionalidades al administrador.
	Cada botón, redirige a distintas url, según lo que se desee realizar-->
<br/>
<br/>
<br/>
<a href="{{ url('admin/añadir') }}" class="btn btn-secondary" >Gráficos</a>
<a href="{{ url('admin/facultades') }}" class="btn btn-primary" >Facultades</a>
<a href="{{ url('admin/departamentos') }}" class="btn btn-primary" >Departamentos</a>
<a href="{{ url('admin/comisiones') }}" class="btn btn-primary" >Comisiones</a>
<a href="{{ url('admin/academicos') }}" class="btn btn-primary" >Académicos</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-secondary" >Evaluar</a>
<a href="{{ url('admin/añadir') }}" class="btn btn-secondary" >Reportes</a>
<a href="{{ url('admin/usuarios') }}" class="btn btn-primary" >Usuarios</a>
<a href="{{ url('admin/periodos') }}" class="btn btn-primary" >Periodos</a>
<a href="{{ url('admin/periodos') }}" class="btn btn-primary" >Prueba3</a>
<br/>
<br/> 

</div>
@endsection