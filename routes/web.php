<?php
use App\User;
use App\Permission\Models\Role;
use App\Permission\Models\Permission;
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
// Route::get('/posts', 'PostController@index');
// Route::get('/posts/create', 'PostController@create');
// Route::get('/posts/{post}', 'PostController@show');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{post}/edit', 'PostController@edit');
// Route::patch('/posts/{post}/edit', 'PostController@update');
// Route::delete('/posts/{post}/edit', 'PostController@destroy');
// Route::get('posts', 'AdminController@posts'); sin usar

//Front end
Route::get('/', function () {
    return view('welcome');
});

Route::get('/inscripcion', function () {
    alert()->success('Success Mensage','Optinal Title');
    return view('inscripcion');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    alert()->success('Success Mensage','Optinal Title');
    return view('contact');
});

Route::resource('posts','PostController');

//Back end
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show');
Route::get('admin', 'AdminController@index');

//Tablas Referenciales

Route::resource('estados', 'EstadoController');
Route::resource('professions','ProfessionController');
Route::resource('academiclevels','AcademiclevelController');
Route::resource('divisions','DivisionController');
Route::resource('positions','PositionController');
Route::resource('centervotes','CentervoteController');
Route::resource('localcommittees','LocalcommitteeController');
Route::resource('electoralcommissions','ElectoralcommissionController');

//Seguridad
Auth::routes();

Route::group(["prefix"=>'users'],function(){
    Route::get('/','UserController@index')->name('users');
    Route::get('indexpersons','UserController@indexpersons')->name('users.indexpersons');
    Route::get('{id}/create','UserController@create')->name('users.create');
    Route::post('store', 'UserController@store')->name('users.store');

    Route::get('{id}/edit','UserController@edit')->name('users.edit');
    Route::patch('{id}/update','UserController@update')->name('users.update');
    Route::delete('{id}/delete','UserController@destroy')->name('users.delete');
});

Route::resource('/role', 'RoleController')->names('role');
Route::get('registerc/{personregister}/create','Auth\RegisterController@aftercreate');
Route::get('personregister','Auth\RegisterController@indexpersons');
Route::get('roleusuario/{id}/edit', 'RoleController@editRolUsuario');

Route::put('/roleusuario/{roleusuario}/edit','RoleController@updateRolUsuario')->name('roleusuario.update');


//Persona

Route::group(["prefix"=>'persons'],function(){
    Route::get('/','PersonController@index')->name('persons');
    Route::get('{id}/create','PersonController@create')->name('persons.create');
    Route::post('store', 'PersonController@store')->name('persons.store');
    Route::get('{id}/show','PersonController@show')->name('persons.show');
    Route::get('{id}/showcne','PersonController@showcne')->name('persons.showcne');
    Route::get('{id}/showpdf','PersonController@showpdf')->name('persons.showpdf');
    Route::get('{id}/edit','PersonController@edit')->name('persons.edit');
    Route::patch('{id}/update','PersonController@update')->name('persons.update');
    Route::delete('{id}/delete','PersonController@destroy')->name('persons.delete');
    Route::post('validate','PersonController@validatePerson')->name('persons.validate');
    Route::post('validateCne','PersonTempController@validatePersonCne')->name('persons.validateCne'); // VALIDAR PERSONA
    Route::post('registerCne','PersonTempController@PersonRegister')->name('persons.registerCne'); // INSCRIPCION REGISTRAR
    Route::get('/inscrip','PersonController@indexinscrip')->name('persons.inscrip');
    Route::get('{id}/statusinscrip','PersonController@Statusinscripciones')->name('persons.statusinscrip');
});



Route::get('/cne', 'CneController@index');
Route::get('/cne/{id}', 'CneController@show');
// PRUEBA BUSCADOR CNE


//Persona Estructura
Route::resource('personstructure','PersonstructureController');
Route::get('personstru','PersonstructureController@indexpersons');
Route::get('/personstructure/{personstru}/create', 'PersonstructureController@create');


//Persona Electoral
Route::resource('personsvotes','PersonvoteController');
Route::get('personvot','PersonvoteController@indexpersons');
Route::get('/personsvotes/{personvot}/create', 'PersonvoteController@create');


//Persona Comite Local
Route::resource('personscommittees','PersoncommitteeController');
Route::get('personscommitte','PersoncommitteeController@indexpersons');
Route::get('/personscommittees/{personscommitte}/create', 'PersoncommitteeController@create');


//Actividades Fortalecimiento
Route::resource('strengthenings','StrengtheningController');



// REPORTES DEL SISTEMA
Route::group(["prefix"=>'reportes'],function(){
    Route::get('/','ReporteController@index')->name('reportes');
    Route::get('reporteCenter','ReporteController@indexCenter')->name('reportes.reporteCenter');
    Route::get('reportePerson','ReporteController@indexPerson')->name('reportes.reportePerson');
    Route::post('validate','ReporteController@validateFiltro')->name('reportes.validate');
    Route::post('validateCenter','ReporteController@validateFiltroCentro')->name('reportes.validateCenter');
    Route::post('validatePerson','ReporteController@validatePersonFiltro')->name('reportes.validatePerson');


});


/* CONSULTAS PARA SELECT DEPENDIENTES ESTADO--MUNICIPIO--PARRQUIA */
Route::group(["prefix"=>"municipio"],function(){
    Route::get('/','MunicipioController@index')->name('municipio.index');
    Route::get('list/{estado_id?}','MunicipioController@list')->name('municipio.list');
});
Route::group(["prefix"=>"parroquia"],function(){
    Route::get('/','ParroquiaController@index')->name('parroquia.index');
    Route::get('list/{municipio_id?}/{estado_id?}','ParroquiaController@list')->name('parroquia.list');
});
/* CONSULTAS PARA SELECT DEPENDIENTES DIVISIONS--CARGOS */
Route::group(["prefix"=>"position"],function(){
    Route::get('/','PositionController@index')->name('position.index');
    Route::get('list/{divisions_id?}','PositionController@list')->name('position.list');
});
/* CONSULTAS PARA SELECT DEPENDIENTES PARROQUIA--CENTERVOTES */
Route::group(["prefix"=>"centervote"],function(){
    Route::get('/','CentervoteController@index')->name('centervote.index');
    Route::get('list/{parroquia_id?}','CentervoteController@list')->name('centervote.list');
});

/* CONSULTAS PARA SELECT DEPENDIENTES PARROQUIA--PERSONCOMMITTEES */
Route::group(["prefix"=>"committee"],function(){
    Route::get('/','LocalcommitteeController@index')->name('committee.index');
    Route::get('list/{parroquia_id?}','LocalcommitteeController@list')->name('committee.list');
});









/* BOTON CANCELAR */
Route::get('danger/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('danger','Acción Cancelada!');
})->name('danger');

//pruebas
Route::get('prueba', function (){

    $user = User::get();
    //$user = User::find(1);
    //Se le crea al usuario logeado el rol id 3 con todos sus permisos seleccionados
   // $user->roles()->sync([3]);

    $user = auth()->user();
    return $user->roles;

});
