<?php


Route::get('/', function(){
  if (Auth::guest()){
    return redirect(asset('index.php/login'));
  }else{
    return view('master');
  }
});

Auth::routes();

Route::resource('/Difunto', 'DifuntoController');

Route::get('/Buscar', 'DifuntoController@buscarGet');
Route::post('/Buscar', 'DifuntoController@buscarPost');

Route::get('/Reporte', 'ReporteController@index');
Route::post('/Reporte', 'ReporteController@reporte');

Route::get('Extra/Pais/{id}', 'AuxiliarController@pais');
Route::get('Extra/Departamento/{id}', 'AuxiliarController@departamento');
Route::get('Extra/Provincia/{id}', 'AuxiliarController@provincia');

Route::get('Usuario', 'UsuarioController@index');
Route::get('Usuario/create', 'UsuarioController@showRegistrationForm');
Route::post('Usuario', 'UsuarioController@create')->name('usuarios');
Route::get('Usuario/{id}', 'UsuarioController@viewuser');
Route::get('Usuario/{id}/edit', 'UsuarioController@edit');
Route::patch('Usuario/{id}', 'UsuarioController@update')->name('usuario.update');
Route::get('Usuario/info/ver', 'UsuarioController@profile');
Route::post('Usuario/info/ver', 'UsuarioController@profileActulizar');

Route::get('/clave', 'UsuarioController@claveGet')->name('usuario.clave');
Route::post('/clave', 'UsuarioController@clavePost')->name('usuario.cambiar');

Auth::routes();
