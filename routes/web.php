<?php
/*
 * Projeto: CGN-VIDEO-PORTAL
 * Arquivo: web.php
 * ---------------------------------------------------------------------
 * Autor: Leonardo Nascimento
 * E-mail: leonardo.nascimento21@gmail.com
 * ---------------------------------------------------------------------
 * Data da criação: 11/05/2021 5:49:31 pm
 * Last Modified: Wed Jun 09 2021
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


Auth::routes(
    [
        'register' => false,
        'reset' => false
    ]
);


Route::get('/', function () {
    abort(404);
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['web']], function(){
    Route::group(['prefix' => 'painel', 'namespace' => 'App\Http\Controllers\Backend', 'middleware' => 'auth', 'as' => 'backend.'], function()
	{
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('whatsapp/login', 'WhatsAppController@index')->name('whats.index');
        Route::get('whatsapp/close-session', 'WhatsAppController@close')->name('whats.close');
        Route::get('whatsapp/check-status', 'WhatsAppController@getStatusConnection')->name('whats.check.status');
        Route::get('whatsapp/check-battery', 'WhatsAppController@getStatusbattery')->name('whats.check.baterry');
        Route::get('whatsapp/qrcode-login', 'WhatsAppController@qr')->name('whats.qrcode');
        Route::get('whatsapp/qrcode-login-update', 'WhatsAppController@qrcodeUpdate')->name('whats.qrcode.update');

        Route::get('usuario/pesquisar/', 'UserController@search')->name('usuario.search');
        Route::resource('/usuario', 'UserController');

        Route::get('noticia/pesquisar/', 'NewsController@search')->name('noticia.search');
        Route::resource('/noticia', 'NewsController');

        Route::get('grupo/pesquisar/', 'GroupController@search')->name('grupo.search');
        Route::resource('/grupo', 'GroupController');

    });
});



