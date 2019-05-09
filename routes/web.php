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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [
//    'uses' => 'HomeController@home',
//    'as' => 'home_path',
//]);

Auth::routes();
Route::get('/logout',[
    'uses' => 'adminController@destroy',
    'as' => 'logout_path',
]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'home_path',
]);
Route::get('/crear-usuario', [
    'uses' => 'adminController@crear_usuario',
    'as' => 'crear_usuario_path',
]);
Route::get('/admin', [
    'uses' => 'adminController@index',
    'as' => 'admin_index_path',
]);
//rutas para los administradores
Route::get('/admin/administrador/nuevo', [
    'uses' => 'AdministradorController@nuevo',
    'as' => 'administrador_nuevo_path',
]);
Route::post('/admin/administrador/nuevo', [
    'uses' => 'AdministradorController@store',
    'as' => 'administrador_store_path',
]);
Route::get('/admin/administrador/lista', [
    'uses' => 'AdministradorController@get',
    'as' => 'administrador_lista_path',
]);
Route::post('/admin/administrador/editar', [
    'uses' => 'AdministradorController@editar',
    'as' => 'administrador_editar_path',
]);
Route::get('/admin/administrador/delete/{id}', [
    'uses' => 'AdministradorController@getDelete',
    'as' => 'administrador.lista.delete',
]);

Route::get('/admin/comunidad/nuevo', [
    'uses' => 'ComunidadController@nuevo',
    'as' => 'comunidad_nuevo_path',
]);
Route::post('/admin/comunidad/nuevo', [
    'uses' => 'ComunidadController@store',
    'as' => 'comunidad_store_path',
]);
Route::get('/admin/comunidad/lista', [
    'uses' => 'ComunidadController@getComunidades',
    'as' => 'comunidad_lista_path',
]);
Route::post('admin/{servicio}/mostrar-provincias', [
    'uses' => 'ComunidadController@mostrarProvincias',
    'as' => 'comunidad_mostrar_provincias_path',
]);
Route::post('admin/{servicio}/mostrar-distritos', [
    'uses' => 'ComunidadController@mostrarDistritos',
    'as' => 'comunidad_mostrar_distritos_path',
]);
Route::post('/admin/comunidad/editar', [
    'uses' => 'ComunidadController@editar',
    'as' => 'comunidad_editar_path',
]);
Route::get('/admin/comunidad/editar/imagen/{filename}', [
    'uses' => 'ComunidadController@getFoto',
    'as' => 'comunidad_editar_imagen_path',
]);
Route::get('/admin/comunidad/delete/{id}', [
    'uses' => 'ComunidadController@getDelete',
    'as' => 'comunidad.lista.delete',
]);
// RUTAS PARA ASOCIACION
Route::get('/admin/asociacion/lista', [
    'uses' => 'AsociacionController@lista',
    'as' => 'asociacion.lista',
]);
Route::get('/admin/asociacion/nuevo', [
    'uses' => 'AsociacionController@nuevo',
    'as' => 'asociacion.nuevo',
]);
Route::post('/admin/asociacion/nuevo', [
    'uses' => 'AsociacionController@store',
    'as' => 'asociacion.store',
]);
Route::post('admin/{servicio}/mostrar-comunidades', [
    'uses' => 'AsociacionController@mostrarComunidades',
    'as' => 'comunidad.mostrar.comunidades',
]);
Route::post('admin/comunidad/modal/mostrar-comunidades', [
    'uses' => 'AsociacionController@mostrarComunidades',
    'as' => 'comunidad_mostrar_comunidades_',
]);
Route::post('admin/comunidad/mostrar-provincias', [
    'uses' => 'ComunidadController@mostrarProvincias',
    'as' => 'comunidad_mostrar_provincias_path',
]);
Route::post('admin/comunidad/mostrar-distritos', [
    'uses' => 'ComunidadController@mostrarDistritos',
    'as' => 'comunidad_mostrar_distritos_path',
]);
Route::post('/admin/asociacion/editar', [
    'uses' => 'AsociacionController@editar',
    'as' => 'asociacion.editar',
]);
Route::post('/admin/asociacion/editar/modal', [
    'uses' => 'AsociacionController@editar_modal',
    'as' => 'asociacion.editar.modal',
]);
Route::get('/admin/asociacion/editar/imagen/{filename}', [
    'uses' => 'AsociacionController@getFoto',
    'as' => 'asociacion.editar.imagen',
]);
Route::get('/admin/asociacion/delete/{id}', [
    'uses' => 'AsociacionController@getDelete',
    'as' => 'asociacion.delete',
]);
// rutas para servicios(actividades, comidas, hospedaje, transporte, otros_servicios)
Route::get('/admin/servicios/lista/{asociacion_id}', [
    'uses' => 'ServiciosController@lista',
    'as' => 'servicios.lista',
]);
Route::get('/admin/servicios/nuevo/{asociacion_id}', [
    'uses' => 'ServiciosController@nuevo',
    'as' => 'servicios.nuevo',
]);
Route::post('/admin/servicios/calendario/eliminar', [
    'uses' => 'ServiciosController@calendario_eliminar',
    'as' => 'servicios.calendario.eliminar',
]);

Route::get('/admin/asociacion/buscar/{ruc_rs}', [
    'uses' => 'ServiciosController@buscar_asociacion',
    'as' => 'servicios.buscar_asociacion',
]);
Route::post('/admin/actividades/store', [
    'uses' => 'ServiciosController@store',
    'as' => 'servicios.actividad.store',
]);
Route::post('/admin/comidas/store', [
    'uses' => 'ServiciosController@store',
    'as' => 'servicios.comidas.store',
]);
Route::post('/admin/hospedaje/store', [
    'uses' => 'ServiciosController@store',
    'as' => 'servicios.hospedaje.store',
]);
Route::post('/admin/transporte/store', [
    'uses' => 'ServiciosController@store',
    'as' => 'servicios.transporte.store',
]);
Route::post('/admin/servicio/store', [
    'uses' => 'ServiciosController@store',
    'as' => 'servicios.servicio.store',
]);

Route::get('/admin/servicios/buscar/{ruc_rs}', [
    'uses' => 'ServiciosController@buscar_servicios',
    'as' => 'servicios.buscar_servicios',
]);
Route::get('/admin/mostar/imagen/{filename}/{storage}', [
    'uses' => 'ServiciosController@showFoto',
    'as' => 'servicio.show.imagen',
]);
Route::post('/admin/actividades/edit', [
    'uses' => 'ServiciosController@edit',
    'as' => 'servicios.actividad.edit',
]);
Route::get('/admin/servicio/delete/{id}/{atributo}', [
    'uses' => 'ServiciosController@getDelete',
    'as' => 'servicio.lista.delete',
]);
Route::get('/admin/reserva', [
    'uses' => 'ReservaController@lista',
    'as' => 'reserva.lista',
]);

Route::get('/admin/reserva/detalle/{id}', [
    'uses' => 'ReservaController@detalle',
    'as' => 'reserva.detalle',
]);

Route::get('/admin/reserva/grupo/confirmar/{tipo_servicio}/{grupo_id}/{estado}', [
    'uses' => 'ReservaController@confirmar',
    'as' => 'reserva.detalle.confirmar',
]);

Route::post('/admin/reserva/escojer-proveedor', [
    'uses' => 'ReservaController@escojer_proveedor',
    'as' => 'reserva.detalle.escojer.proveedor',
]);
Route::post('/admin/reserva/get-reserva', [
    'uses' => 'ReservaController@getReserva',
    'as' => 'reserva.get',
]);
// RUTAS PARA PROVEEDOR
Route::get('/admin/proveedor/lista', [
    'uses' => 'ProveedorController@lista',
    'as' => 'proveedor.lista',
]);
Route::get('/admin/proveedor/nuevo/{categoria}', [
    'uses' => 'ProveedorController@nuevo',
    'as' => 'proveedor.nuevo',
]);
Route::post('/admin/proveedor/nuevo', [
    'uses' => 'ProveedorController@store',
    'as' => 'proveedor.store',
]);
Route::post('/admin/proveedor/editar', [
    'uses' => 'ProveedorController@editar',
    'as' => 'proveedor.editar',
]);

// rutas para productos
Route::get('/admin/producto/lista', [
    'uses' => 'ProductosController@lista',
    'as' => 'producto.lista',
]);
Route::get('/admin/producto/nuevo/{categoria}', [
    'uses' => 'ProductosController@nuevo',
    'as' => 'producto.nuevo',
]);
Route::post('/admin/producto/mostrar-proveedores', [
    'uses' => 'ProductosController@mostrar_proveedores',
    'as' => 'mostrar.proveedores.nuevo',
]);
Route::post('/admin/producto/nuevo', [
    'uses' => 'ProductosController@store',
    'as' => 'producto.store',
]);
Route::post('/admin/producto/editar', [
    'uses' => 'ProductosController@editar',
    'as' => 'producto.editar',
]);
Route::get('/admin/producto/delete/{id}/{categoria}', [
    'uses' => 'ProductosController@getDelete',
    'as' => 'producto.delete',
]);

// rutas poara operaciones
Route::get('/admin/operaciones/{f1}/{f2}', [
    'uses' => 'OperacionesController@lista',
    'as' => 'operaciones.lista',
]);
Route::post('/admin/operaciones/', [
    'uses' => 'OperacionesController@lista_post',
    'as' => 'operaciones.post.lista',
]);
Route::post('/admin/servicio/calendario', [
    'uses' => 'ServiciosController@add_calendario',
    'as' => 'servicios.calendario.add',
]);

Route::post('/admin/servicio/calendario-d', [
    'uses' => 'ServiciosController@add_calendario_d',
    'as' => 'servicios.calendario.add_2',
]);

// rutas para las solicitudes

Route::get('/admin/solucitudes/asociacion/lista', [
    'uses' => 'SolicitudAsociacionController@lista',
    'as' => 'solucitudes.asociacion.lista',
]);

Route::get('/admin/solucitudes/asociacion/crear/{id}', [
    'uses' => 'SolicitudAsociacionController@crear',
    'as' => 'solucitudes.asociacion.crear',
]);
Route::get('/admin/solucitudes/otros/lista', [
    'uses' => 'SolicitudOtrosController@lista',
    'as' => 'solucitudes.otros.lista',
]);
Route::get('/admin/solicitudes/otros/crear/{id}', [
    'uses' => 'SolicitudOtrosController@crear',
    'as' => 'solucitudes.otros.crear',
]);

// rutas para una asociacion en concreto

// Route::get('/admin/servicios/lista/{asociacion_id}', [
//     'uses' => 'ServiciosController@lista',
//     'as' => 'servicios.lista',
// ]);
