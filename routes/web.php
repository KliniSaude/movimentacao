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

/**
 * LOGIN
 */
Route::get('/', 'LoginController@showLoginForm')->name('admin.login');
Route::post('/login/do', 'LoginController@login')->name('admin.login.do');

/**
 * Middleware
 */
Route::middleware(['auth'])->group(function () {

  /**
   * Administradora
   */
  /**
   * DASHBOARD
   */
  Route::get('/dashboard', 'Admin\\ProposeController@dashboard')->name('admin.dashboard');
  Route::get('/proposta/{id}', 'Admin\\ProposeController@show')->name('admin.propostas');

  /**
   * USER
   */
  Route::get('usuario/', 'Admin\\UserController@index')->name('admin.user');
  Route::put('usuario-update/{id}', 'Admin\\UserController@update')->name('admin.user.update');

  /**
   * Proposta
   */
  Route::get('/nova-proposta', 'Admin\\ProposeController@create')->name('admin.create.proposta');
  Route::post('/store', 'Admin\\ProposeController@store')->name('admin.store.proposta');

  Route::get('/editar-proposta-administradora/{id}', 'Admin\\ProposeController@edit')->name('admin.edit.proposta');
  Route::put('/update/{id}', 'Admin\\ProposeController@update')->name('admin.update.proposta');

  Route::delete('/deletar/{id}', 'Admin\\ProposeController@destroy')->name('admin.destroy.proposta');
  Route::post('deletar-depedente/', 'Admin\\ProposeController@destroyDependent')->name('admin.destroyDependent.proposta');

  /**
   * Log
   */
  Route::get('/log', 'Admin\\LogController@index')->name('admin.log');

  /**
   * Operadora
   */
  /**
   * DASHBOARD
   */
  Route::get('/dashboard-operacao', 'Operadora\\ProposeController@index')->name('operadora.dashboard');
  Route::get('/proposta-operacao/{id}', 'Operadora\\ProposeController@show')->name('operadora.propostas');

  /**
   * Proposta
   */
  Route::get('/editar-proposta/{id}', 'Operadora\\ProposeController@edit')->name('operadora.edit.proposta');
  Route::put('/corrigir/{id}', 'Operadora\\ProposeController@correct')->name('operadora.correct.proposta');
  Route::put('/tudo-ok/{id}', 'Operadora\\ProposeController@ok')->name('operadora.ok.proposta');


  /**
   * Exportar Proposta
   */
  Route::post('exportar-propotas/', 'Propose\\ExportedController@export')->name('propose.export');

  /**
   * USER
   */
  Route::get('/usuarios', 'Admin\\UserController@allUsers')->name('operadora.users.all');
  Route::get('/criar-usuario', 'Admin\\UserController@create')->name('operadora.users.create');
  Route::post('/store-user', 'Admin\\UserController@store')->name('operadora.users.store');
  Route::get('editar-usuario/{id}', 'Admin\\UserController@edit')->name('operadora.users.edit');
  Route::delete('/deletar-usuario/{id}', 'Admin\\UserController@destroy')->name('operadora.users.delete');

});
/**
 * LOGOUT
 */
Route::get('/logout', 'LoginController@logout')->name('admin.logout');
