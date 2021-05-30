<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: web.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 11/05/2021 5:49:31 pm
 * Last Modified:  24/05/2021 4:42:50 pm
 * Modified By: Leonardo Nascimento - <leonardo.nascimento21@gmail.com> / MAC OS
 * ---------------------------------------------------------------------
 * Copyright (c) 2021 Leo
 * HISTORY:
 * Date      	By	Comments
 * ----------	---	---------------------------------------------------------

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['web']], function(){
    Route::group(['prefix' => 'painel', 'namespace' => 'App\Http\Controllers\Backend', 'middleware' => 'auth', 'as' => 'backend.'], function()
	{
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('whatsapp', 'WhatsAppController@index')->name('whats.index');
        Route::get('whatsapp/send', 'WhatsAppController@send')->name('whats.index');
        Route::get('whatsapp/close', 'WhatsAppController@close')->name('whats.index');
        Route::get('whatsapp/check', 'WhatsAppController@check')->name('whats.index');
        Route::get('whatsapp/qrcode', 'WhatsAppController@qr')->name('whats.index');

        Route::get('usuario/pesquisar/', 'UserController@search')->name('usuario.search');
        Route::resource('/usuario', 'UserController');

        Route::get('noticia/pesquisar/', 'NewsController@search')->name('noticia.search');
        Route::resource('/noticia', 'NewsController');

        Route::get('grupo/pesquisar/', 'GroupController@search')->name('grupo.search');
        Route::resource('/grupo', 'GroupController');

    });
});
