<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@cargarMateria');

/*
|
|	Vistas del modulo administrar - parametros del sistema
|	ubicadas en la carpeta views > HomeController 
|
*/

Route::get('home', 'HomeController@cargarMateria');

Route::get('cargarMateria', 'HomeController@cargarMateria', function()
{
	return view('parametros.cargarMateria');
});
Route::any('cargarMateria', array('as' => 'cargarMateria', 'uses' => 'HomeController@cargarMateria'));


Route::get('listaMaterias', 'HomeController@listaMaterias', function()
{
	return view('parametros.listaMaterias');
});
Route::any('listaMaterias', array('as' => 'listaMaterias', 'uses' => 'HomeController@listaMaterias'));


Route::get('cargarMateriasProfesor', 'HomeController@cargarMateriasProfesor', function()
{
	return view('parametros.cargarMateriasProfesor');
});
Route::any('cargarMateriasProfesor', array('as' => 'cargarMateriasProfesor', 'uses' => 'HomeController@cargarMateriasProfesor'));


Route::get('listaMateriasProfesor', 'HomeController@listaMateriasProfesor', function()
{
	return view('parametros.listaMateriasProfesor');
});
Route::any('listaMateriasProfesor', array('as' => 'listaMateriasProfesor', 'uses' => 'HomeController@listaMateriasProfesor'));


Route::get('grupoMaterias', 'HomeController@grupoMaterias', function()
{
	return view('parametros.grupoMaterias');
});
Route::any('grupoMaterias', array('as' => 'grupoMaterias', 'uses' => 'HomeController@grupoMaterias'));

Route::get('disponibilidadProfesores', 'HomeController@disponibilidadProfesores', function()
{
	return view('HomeController.disponibilidadProfesores');
});
Route::any('/disponibilidadProfesores/{id}', array('as' => 'disponibilidadProfesores', 'uses' => 'HomeController@disponibilidadProfesores'));


Route::get('getEventosData', 'HomeController@getEventosData', function()
{
	return view('HomeController.getEventosData');
});
Route::any('getEventosData/{profesor}', array('as' => 'getEventosData', 'uses' => 'HomeController@getEventosData'));

Route::get('setEventosData', 'HomeController@setEventosData', function()
{
	return view('HomeController.setEventosData');
});
Route::any('/setEventosData/{start}/{end}/{profesor}', array('as' => 'setEventosData', 'uses' => 'HomeController@setEventosData', ));

Route::get('updateEventosData', 'HomeController@updateEventosData', function()
{
	return view('HomeController.updateEventosData');
});
Route::any('/updateEventosData/{start}/{end}/{id}/{profesor}', array('as' => 'updateEventosData', 'uses' => 'HomeController@updateEventosData', ));

Route::get('deleteEventoData', 'HomeController@deleteEventoData', function()
{
	return view('HomeController.deleteEventoData');
});
Route::any('/deleteEventoData/{id}', array('as' => 'deleteEventoData', 'uses' => 'HomeController@deleteEventoData', ));


Route::get('cargarData', 'HomeController@cargarData', function()
{
	return view('parametros.cargarData');
});
Route::any('/cargarData/{id}', array('as' => 'cargarData', 'uses' => 'HomeController@cargarData'));

Route::get('eliminarListaSeccion', 'HomeController@eliminarListaSeccion', function(){});
Route::any('/eliminarListaSeccion/{id}', array('as' => 'eliminarListaSeccion', 'uses' => 'HomeController@eliminarListaSeccion'));


/*
|
|	Vistas del modulo parametros algoritmos - restricciones del modelo
|	ubicadas en la carpeta views > parametros 
|
*/

Route::get('tabu', 'ParametrosController@tabu', function()
{
	return view('parametros.tabu');
});
Route::any('tabu', array('as' => 'tabu', 'uses' => 'ParametrosController@tabu'));


Route::get('listaTabu', 'ParametrosController@listaTabu', function()
{
	return view('parametros.listaTabu');
});
Route::any('listaTabu', array('as' => 'listaTabu', 'uses' => 'ParametrosController@listaTabu'));

Route::get('eliminarListaTabu', 'ParametrosController@eliminarListaTabu', function(){});
Route::any('/eliminarListaTabu/{id}', array('as' => 'eliminarListaTabu', 'uses' => 'ParametrosController@eliminarListaTabu'));

Route::get('editarTabu', 'ParametrosController@editarTabu', function(){});
Route::any('/editarTabu/{id}', array('as' => 'editarTabu', 'uses' => 'ParametrosController@editarTabu'));

Route::get('verTabu', 'ParametrosController@verTabu', function()
{
	return view('parametros.verTabu');
});
Route::any('/verTabu/{id}', array('as' => 'verTabu', 'uses' => 'ParametrosController@verTabu'));

Route::get('eliminarListaGenetico', 'ParametrosController@eliminarListaGenetico', function(){});
Route::any('/eliminarListaGenetico/{id}', array('as' => 'eliminarListaGenetico', 'uses' => 'ParametrosController@eliminarListaGenetico'));

Route::get('editarListaGenetico', 'ParametrosController@editarListaGenetico', function(){});
Route::any('/editarListaGenetico/{id}', array('as' => 'editarListaGenetico', 'uses' => 'ParametrosController@editarListaGenetico'));


Route::get('genetico', 'ParametrosController@genetico', function()
{
	return view('parametros.genetico');
});
Route::any('genetico', array('as' => 'genetico', 'uses' => 'ParametrosController@genetico'));

Route::get('editarGenetico', 'ParametrosController@editarGenetico', function()
{
	return view('parametros.editarGenetico');
});
Route::any('/editarGenetico/{id}', array('as' => 'editarGenetico', 'uses' => 'ParametrosController@editarGenetico'));

Route::get('verGenetico', 'ParametrosController@verGenetico', function(){return view('parametros.verGenetico');});
Route::any('/verGenetico/{id}', array('as' => 'verGenetico', 'uses' => 'ParametrosController@verGenetico'));

Route::get('listaGenetico', 'ParametrosController@listaGenetico', function(){return view('parametros.listaGenetico');});
Route::any('listaGenetico', array('as' => 'listaGenetico', 'uses' => 'ParametrosController@listaGenetico'));

/* ----------------------------  Profesor   ----------------------------------------- */
Route::get('cargarProfesor', 'ProfesorController@cargarProfesor', function(){ return view('profesor.cargarProfesor');});
Route::any('cargarProfesor', array('as' => 'cargarProfesor', 'uses' => 'ProfesorController@cargarProfesor'));

Route::get('listaProfesores', 'ProfesorController@listaProfesores', function(){ return view('profesor.listaProfesores');});
Route::any('listaProfesores', array('as' => 'listaProfesores', 'uses' => 'ProfesorController@listaProfesores'));

Route::get('eliminarProfesor', 'ProfesorController@eliminarProfesor', function(){});
Route::any('/eliminarProfesor/{id}', array('as' => 'eliminarProfesor', 'uses' => 'ProfesorController@eliminarProfesor'));

Route::get('editarProfesor', 'ProfesorController@editarProfesor', function(){return view('editarProfesor');});
Route::any('/editarProfesor/{id}', array('as' => 'editarProfesor', 'uses' => 'ProfesorController@editarProfesor'));

Route::get('verProfesor', 'ProfesorController@verProfesor', function(){return view('verProfesor');});
Route::any('/verProfesor/{id}', array('as' => 'verProfesor', 'uses' => 'ProfesorController@verProfesor'));


/* ----------------------------  Salones   ----------------------------------------- */
Route::get('cargarSalon', 'SalonController@cargarSalon', function(){ return view('salon.cargarSalon');});
Route::any('cargarSalon', array('as' => 'cargarSalon', 'uses' => 'SalonController@cargarSalon'));

Route::get('listaSalones', 'SalonController@listaSalones', function(){ return view('salon.listaSalones');});
Route::any('listaSalones', array('as' => 'listaSalones', 'uses' => 'SalonController@listaSalones'));

Route::get('eliminarSalon', 'SalonController@eliminarSalon', function(){});
Route::any('/eliminarSalon/{id}', array('as' => 'eliminarSalon', 'uses' => 'SalonController@eliminarSalon'));

Route::get('editarSalon', 'SalonController@editarSalon', function(){return view('salon.editarSalon');});
Route::any('/editarSalon/{id}', array('as' => 'editarSalon', 'uses' => 'SalonController@editarSalon'));

Route::get('verSalon', 'SalonController@verSalon', function(){return view('salon.verSalon');});
Route::any('/verSalon/{id}', array('as' => 'verSalon', 'uses' => 'SalonController@verSalon'));



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
