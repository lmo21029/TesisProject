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

/** VISTAS DEL HOME,  REGISTRO,  Y USUARIO REGISTRADO */

Route::get('welcome', function () {
    return view('index');
});

Route::get('sign', function(){
    return view('login');
});


Route::get('home', function(){
    return view('home_login');
});

/** VISTAS DEL HOME,  REGISTRO,  Y USUARIO REGISTRADO */





/**  RUTAS DE LOGIN Y DE REGISTRO**/

Route::resource('registro','UserController');

Route::post('login','UserController@login');




/**  TERMINO DE  RUTAS DE LOGIN Y DE REGISTRO**/






/** ADMIN INDEX */


Route::get('admin', ['middleware' =>  ['auth','admin'], 'uses' =>'UserController@admin']);
Route::get('adminpersonal', ['middleware' => ['auth', 'administrativo'], 'uses' =>'UserController@administrativo']);

/** TERMINO DE ADMIN INDEX */





/**
 * CRUDS
 **/
Route::resource('gruas','GruasController');

Route::resource('empresas','EmpresasController');

Route::resource('choferes','ChoferesController');

Route::resource('servicios','ServiciosController');

Route::resource('facturas','FacturasController');

Route::resource('pagos','PagosController');

Route::resource('registro_roles','UserController');


Route::get('logout','UserController@logout'); // salir del sistema como admind

/**
 * TERMINO DE LOS CRUDS
 **/

/*


 */

Route::get('from', ['middleware' => 'auth', function(){
    return view('home_login');
}]);

/**
Rutas DEL PERFIL USUARIO Y SERVICIO USUARIO
 */



Route::resource('usuario/servicio','UsuarioServicio');

Route::resource('usuario/perfil','UsuarioPerfil');




/**Usuario Index**/
Route::get('usuario', function(){
    return view('usuario.index');
});
/**Usuario Servicios**/
Route::get('usuario/servicio', function(){
    return view('usuario.servicio');
});
/**Usuario Perfil**/
/*Route::get('usuario/perfil', function(){
    return view('usuario.perfil');
});*/


Route::get('admin_pagos/mostrar_servicios',['as'=>'adminpagos.servicios','uses'=>'AdminiPagosController@mostrarservicios']);



/**
RUTAS DEL PERSONAL ADMINISTRATIVO
 **/

Route::resource('admin_chofer','AdminiChoferesController');

Route::resource('admin_grua','AdminiGruasController');

Route::resource('admin_servicio','AdminiServiciosController');

Route::resource('admin_pagos','AdminiPagosController');

Route::resource('admin_factura','AdminfacturasController');



/**
RUTAS DEL PERSONAL ADMINISTRATIVO
 **/
//Ruta de PDF
Route::get('pdf', 'PdfController@servicios');
//Route::get('pdf', 'PdfController@invoice');


Route::post('android',function(){


    $credentials = Input::only('email');
    $credentials['password'] = Input::get('password');
    if(Auth::attempt($credentials)) {
        return Auth::user();
    }

    else{
        return 'fallo';

    }


});




Route::post('android/registro',function(){

    $nuevo_usuario= new App\User();

    $nuevo_usuario->name=Input::get('name');
    $nuevo_usuario->apellido=Input::get('apellido');
    $nuevo_usuario->email=Input::get('email');
    $nuevo_usuario->cedula=Input::get('cedula');
    $nuevo_usuario->direccion=Input::get('direccion');
    $nuevo_usuario->password=Input::get('password');
    $nuevo_usuario->telefono=Input::get('telefono');
    $nuevo_usuario->id_rol=Input::get('id_rol');

    if($nuevo_usuario->save()){
        return json_encode('exito');
    }
  else{
      return json_encode('fallo');
  }

});

Route::post('android/servicio',function(){

    $nuevo_servicio= new App\Servicios();

    $nuevo_servicio->origen=Input::get('origen');
    $nuevo_servicio->reforigen=Input::get('reforigen');
    $nuevo_servicio->destino=Input::get('destino');
    $nuevo_servicio->refdestino=Input::get('refdestino');
    $nuevo_servicio->monto=Input::get('monto');
    $nuevo_servicio->placa=Input::get('placa');
    $nuevo_servicio->tipo_servicio=Input::get('tipo_servicio');
    $nuevo_servicio->kilometros=Input::get('kilometros');
    $nuevo_servicio->tipo_cliente=Input::get('tipo_cliente');
    $nuevo_servicio->servicios_pagados=Input::get('servicios_pagados');
    $nuevo_servicio->users_id=Input::get('users_id');
    $nuevo_servicio->chofer_id=Input::get('chofer_id');
    $nuevo_servicio->empresa_id=Input::get('empresa_id');

    if($nuevo_servicio->save()){
        return json_encode('exito');
    }
    else{
        return json_encode('fallo');
    }



});



Route::post('android/empresas',function(){

    $nuevo_empresa= new App\Empresas();

    $nuevo_empresa->nombre_empresa=Input::get('nombre_empresa');
    $nuevo_empresa->rif_empresa=Input::get('rif_empresa');
    $nuevo_empresa->direccion_empresa=Input::get('direccion_empresa');
    $nuevo_empresa->telefono_empresa=Input::get('telefono_empresa');


    if($nuevo_empresa->save()){
        return json_encode('exito');
    }
    else{
        return json_encode('fallo');
    }

});



Route::post('android/verempresa',function(){

  return App\Empresas::all();

});


Route::post('android/verservicio',function(){

    return App\Servicios::all();

});


Route::post('android/verchofer',function(){

    return App\Choferes::all();

});