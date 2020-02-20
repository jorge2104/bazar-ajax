<?php
Route::get('/', 'indexController@index')->name('index');
Auth::routes();
Route::get('/get/productos', 'indexController@getProductos')->name('getProductos');
Route::get('/home', 'HomeController@index')->name('home');
//areas
Route::get('Areas/index', 'AreasController@index')->middleware('auth')->name('areas.index');
Route::post('Areas/update/{id}', 'AreasController@update')->middleware('auth')->name('areas.update');
Route::get('Areas/delete/{id}', 'AreasController@destroy')->middleware('auth')->name('areas.delete');
Route::get('Areas/activar/{id}', 'AreasController@activar')->middleware('auth')->name('areas.activar');
Route::get('Areas/create', 'AreasController@create')->middleware('auth')
->name('areas.create');
Route::post('Areas/store', 'AreasController@store')->middleware('auth')
->name('areas.store');


//Usuarios
Route::get('Usuarios/index', 'UserController@index')->middleware('auth')->name('usuarios.index');
Route::post('Usuarios/update/{id}', 'UserController@update')->middleware('auth')->name('usuarios.update');
Route::get('Usuarios/password/{id}', 'UserController@edit')->middleware('auth')->name('usuarios.edit');
Route::post('Usuarios/storepass/{id}', 'UserController@storePass')->middleware('auth')->name('usuarios.storePass');
Route::get('Usuarios/register/', 'UserController@create')->middleware('auth')->name('usuarios.create');
Route::post('Usuarios/store/', 'UserController@store')->middleware('auth')->name('usuarios.store');

//productos
Route::get('/Productos/admin/show', 'ProductosController@Aproductos')
->middleware('auth')->name('Aproductos.index');
Route::get('/Productos/admin/images/show/{id}', 'ProductosController@getImages');
Route::get('/Productos/consignar/{id}', 'ProductosController@consignar');
Route::post('/Productos/storeConsigna/{id}', 'ProductosController@storeConsigna');
Route::post('/Productos/update/{id}', 'ProductosController@update');
Route::get('/Productos/index', 'ProductosController@index')->middleware('auth')->name('productos.index');

Route::get('/Productos/delete/{id}', 'ProductosController@destroy')
->middleware('auth')->name('productos.destroy');

//fotos
Route::get('/fotos/upload/{id}', 'FotosController@create')->name('Fotos.create');;


Route::post('/Fotos/store/{id}', 'fotosController@store')
->middleware('auth')->name('Fotos.store');

Route::get('/Fotos/delete/{id}', 'fotosController@destroy')
->middleware('auth')->name('Fotos.delete');

Route::get('/Producto/delete/{id}', 'ProductosController@destroy')->name('Fotos.destroy');
Route::get('/Productos/create/', 'ProductosController@create')->name('productos.create');


Route::post('/Productos/store/', 'ProductosController@store')
->middleware('auth')->name('Productos.store');


Route::get('/fotos/edit/{id}', 'fotosController@edit')
->middleware('auth')->name('Fotos.edit');

Route::post('/Fotos/update/{id}', 'fotosController@update')
->middleware('auth')->name('Fotos.actualizar');


Route::post('/Fotos/update/{id}', 'fotosController@update')
->middleware('auth')->name('Fotos.actualizar');

Route::get('/Ventas/create/{id}', 'VentasController@show')
->middleware('auth')->name('Ventas.create');

Route::get('/compras/index', 'VentasController@compras')
->middleware('auth')->name('Ventas.compras');



///pagos


Route::get('/Pagos/index/', 'VentasController@PagosIndex')
->middleware('auth');

Route::get('/Pagos/create/', 'VentasController@create')
->middleware('auth');

Route::post('/Pagos/store/', 'VentasController@store')
->middleware('auth');


Route::get('/Pagos/entregar/{id}', 'VentasController@entregar')
->middleware('auth');
