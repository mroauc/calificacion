<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register'=>false,'reset'=>false]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index','usersController@index');

Route::get('/admin/academicos','AcademicoController@index');
Route::get('/admin/añadirAcademico','AcademicoController@create');
Route::post('/admin/guardarAcademico','AcademicoController@store');
Route::post('/admin/buscarAcademico','AcademicoController@buscar');
Route::get('/admin/academico/{rut}/edit','AcademicoController@edit');
Route::post('/admin/academico/{rut}/update','AcademicoController@update');

Route::get('/admin/comisiones','ComisionController@index');
Route::get('/admin/añadirComision','ComisionController@create');
Route::post('/admin/guardarComision','ComisionController@store');
Route::post('/admin/buscarComision','ComisionController@buscar');
Route::get('/admin/comision/{id_comision}/edit','ComisionController@edit');
Route::post('/admin/comision/{id_comision}/update','ComisionController@update');

Route::get('/admin/facultades','FacultadController@index');
Route::get('/admin/añadirFacultad','FacultadController@create');
Route::post('/admin/guardarFacultad','FacultadController@store');
Route::get('/admin/facultad/{cod_facultad}/edit','FacultadController@edit');
Route::post('/admin/facultad/{cod_facultad}/update','FacultadController@update');
Route::post('/admin/buscarFacultad','FacultadController@buscar');

Route::get('/admin/departamentos','DepartamentoController@index');
Route::get('/admin/añadirDepartamento','DepartamentoController@create');
Route::post('/admin/guardarDepartamento','DepartamentoController@store');
Route::get('/admin/departamento/{cod_departamento}/edit','DepartamentoController@edit');
Route::post('/admin/departamento/{cod_departamento}/update','DepartamentoController@update');
Route::post('/admin/buscarDepartamento','DepartamentoController@buscar');

Route::get('/admin/usuarios','usersController@mostrar');
Route::get('/admin/añadirUsuario','usersController@create');
Route::post('/admin/guardarUsuario','usersController@store');
Route::post('/admin/buscarUsuario','usersController@buscar');
Route::get('/admin/usuario/{email}/edit','usersController@edit');
Route::post('/admin/usuario/{email}/update','usersController@update');
Route::get('/admin/reenviarContraseña','usersController@reenviarContraseña');
Route::get('/admin/usuario/{email}/nuevaContraseña','usersController@nuevaContraseña');

Route::get('/admin/periodos','PeriodoController@index');
Route::post('/admin/añoPeriodo/','PeriodoController@accion');


