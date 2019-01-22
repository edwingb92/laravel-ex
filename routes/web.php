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
/*
Route::get('/', function () {
    return view('auth.login');
});
*/

Route::resource('ClasificacionSocial', 'ClasificacionSocialController', ['except' => 'show','create','edit']);
Route::resource('EstadoCivil', 'EstadoCivilController', ['except' => 'show','create','edit']);
Route::resource('TipoPersona', 'TipoPersonaController', ['except' => 'show','create','edit']);
Route::resource('EstadoMembresia', 'EstadoMembresiaController', ['except' => 'show','create','edit']);
Route::resource('TipoDocumento', 'TipoDocumentoController', ['except' => 'show','create','edit']);
Route::resource('Profesion', 'ProfesionController', ['except' => 'show','create','edit']);
Route::resource('Avatar', 'AvatarController', ['except' => 'show','create','edit']);
Route::resource('Eclesial', 'EclesialController', ['except' => 'show','create','edit','index']);
Route::resource('Laboral', 'LaboralController', ['except' => 'show','create','edit','index']);
Route::resource('Familia', 'FamiliaController', ['except' => 'create','edit']);
Route::resource('DetalleFamilia', 'DetalleFamiliaController', ['except' => 'show','create','edit','index','update']);
Route::resource('Observacion', 'ObservacionController', ['except' => 'show','create','edit','index']);
Route::resource('DetalleMinisterio', 'DetalleMinisterioController', ['except' => 'show','create','edit','index','update']);
Route::resource('RolMinisterio', 'RolMinisterioController', ['except' => 'show','create','edit','index']);


Route::resource('Miembros', 'MiembroController');
Route::resource('Ministerio', 'MinisterioController');

Route::get('login', 'Auth\LoginController@showLoginForm');

Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
