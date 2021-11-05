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
    return redirect()->route('categoria.index');

});

Route::get('zadga', function(){
	$dep=DB::select('SELECT  nomb,  COUNT(*)
                    FROM departamento d,  ciudad c
                    where d.id_dep=c.depa
                    group by  d.nomb ');
    return view('categoria.proto',compact('dep'));
} );
Route::get('categoria','index@index')->name('categoria.index');
Route::get('login','registro@viewlogin')->name('login');
Route::get('registro', 'registro@viewregistro')->name('registro');
Route::post('registrar', 'registro@store')->name('registrar');
Route::post('iniciar', 'loginController@login')->name('iniciar');
Route::get('/superu/{id}', 'index@user')->name('inicio');
Route::get('/suario/{id}','index@usuario')->name('inius');
Route::get('home/{$id}', 'inicio@index')->name('home');
Route::get('/logout', 'loginController@logout')->name('logout');
Route::get('/informacion/user{id}','UsrController@info')->name('infoRut');

Route::get('/ususer/{id}','User@index')->name('iniUs');
Route::get('/empleados/{id}','Empleados@index')->name('inicioEm');

Route::get('/RegistroUs/{id}','UsrController@reDisct')->name('register');
Route::get('/formularioAd','UsrController@form')->name('formulario');
Route::get('/listaUserWold','UsrController@listU')->name('listUs');
Route::get('/listaUserEmp','UsrController@listE')->name('list_em');
Route::get('/listaUserAdm','UsrController@listA')->name('list_ad');
Route::get('/listaUserUs','UsrController@listUs')->name('list');
Route::get('/usuarios','UsrController@index')->name('list_us');
Route::post('/usersI', 'UsrController@insertar')->name('insertar');
Route::post('/usersIsert/{id}', 'UsrController@insertar2')->name('insertar2');
Route::get('userUser/{id}','UsrController@editarUs')->name('editaruser');
Route::put('editUs/{id}','UsrController@editUs')->name('editarUs');
Route::put('editar/user/{id}','UsrController@editarU')->name('edit');
Route::put('edit/user/{id}','UsrController@editarPas')->name('editP');

Route::get('/proyect/proyect','eduardas@formulpro')->name('formulpro');
Route::get('/proyect/actividad','eduardas@formulaunid')->name('formunid');
Route::get('/proyect/unidactiv','eduardas@formulaunidpro')->name('formactiv');
Route::get('/proyect/unidad/{id}','eduardas@formulacti')->name('formuacti');
Route::post('/proyect/insertpro','eduardas@insertpro')->name('inpro');
Route::post('/proyect/insertunid','eduardas@inserunid')->name('inunid');
Route::post('/proyect/insertundact','eduardas@instunidact')->name('inunidact');
Route::post('/proyect/insertactivid','eduardas@insertact')->name('inact');
Route::get('/proyect/borrarpro/{id}','eduardas@borrapro')->name('bopro');
Route::get('/proyect/borraracti/{id}','eduardas@borraracti')->name('boact');
Route::get('/proyect/borrarunid','eduardas@borrarunid')->name('bounid');
Route::get('/proyect/editproyect/{id}','eduardas@editpro')->name('epro');
Route::post('/proyect/insertproy','eduardas@eproyect')->name('valpro');
Route::get('/proyect/editunid/{id}','eduardas@editact')->name('editarItem');
Route::get('/proyect/editacti/{id}','eduardas@editunid')->name('eunid');
Route::post('/proyect/editinst','eduardas@inseredit')->name('editunid');
Route::get('/proyect/storepro','eduardas@storedpro')->name('stpro');
Route::get('/proyect/storeact','eduardas@storedact')->name('stact');
Route::get('/proyect/storeunid','eduardas@storedund')->name('stunid');
Route::get('/proyect/tabpro','eduardas@tablapro')->name('tabpro');
Route::get('/proyect/tabact/{id}','eduardas@tablact')->name('tabact');
Route::get('/proyect/tabunid','eduardas@tablasunid')->name('tabunid');
Route::get('/manoObra/{id}','eduardas@tablasM')->name('manobra');
Route::get('/manaquinaria/{id}','eduardas@tablamo')->name('maquinaria');
Route::get('/material/{id}','eduardas@tablasMat')->name('material');
Route::get('/calculos/montos/{id}','eduardas@calcular')->name('calcularmont');
Route::post('/sumartotal','eduardas@sumatoria')->name('sumacal');
Route::get('/registro/insert','eduardas@registroIn')->name('regIns');
Route::get('/registro/delite','eduardas@registroDe')->name('regDel');
Route::get('/registro/update','eduardas@registroUp')->name('regUp');
Route::get('/tabla-item/item','eduardas@tablait')->name('tabItem');
Route::get('/tabla-unid/unid','eduardas@tablaunid')->name('tabUnides');
Route::get('/formulario/calculo/{id}','eduardas@forcalculo')->name('forcal');
Route::get('/editsinf/editforItem/{id}','eduardas@editsItem')->name('Itemedit');
Route::get('/editsinf/editforUnid/{id}','eduardas@editsUnid')->name('UnidEdit');
Route::get('/editsinf/editInsertIt','eduardas@insertItem')->name('insertItem');
Route::get('/editsinf/editInsertUn','eduardas@insertUnid')->name('insertUpt');
Route::name('print')->get('/imprimir', 'eduardas@imprimir');
Route::get('/editactivi/formulario/{id}','eduardas@editactiv')->name('actform');
Route::post('/insertactivi/formula','eduardas@insertarItem')->name('inactitem');
Route::get('/insertationfor/formula','eduardas@iteminsertion')->name('instertitem');
Route::get('/formulario/nuevospre','eduardas@nuevop')->name('añadirp');
Route::post('/insertprecio/newprecio','eduardas@insertprecio')->name('newprecio');
Route::get('/fornukariosub/proyecto','eduardas@nuevosubp')->name('añadirsub');
Route::get('/tablasubpro/subproyectos','eduardas@tablaSubp')->name('tablasub');
Route::get('/tablasitems/items','eduardas@tablaItmes')->name('tablaunid');
Route::get('/tablashistoria/precios/{id}','eduardas@histop')->name('preciost');
Route::get('/subproyecto/subproyecto/{id}','eduardas@formulariosubp')->name('formul_act');
Route::post('/insertactividad/actividad','eduardas@insertactivid')->name('insert_act');
Route::get('/subproyecto/formula_editar/{id}','eduardas@formula_edit')->name('formu_edit');
Route::post('/insertaredit/actividad','eduardas@insertaredit')->name('insert_editI');

//     Route::get('table-list''', function () {
// 		return view('pages.tab''le_list');
// 	})->name('table');

// 	Route::get('typography', function () {
// 		return view('pages.typography');
// 	})->name('typography');

// 	Route::get('icons', function () {
// 		return view('pages.icons');
// 	})->name('icons');

// 	Route::get('map', function () {
// 		return view('pages.map');
// 	})->name('map');

// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');

// 	Route::get('rtl-support', function () {
// 		return view('pages.language');
// 	})->name('language');

// 	Route::get('upgrade', function () {
// 		return view('pages.upgrade');
// 	})->name('upgrade');
// });
