<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function ($subdomain) {
    return 'default connection : '. DB::connection()->getDatabaseName();
});

Route::group(['prefix' => 'dashboard'], function () {

    Route::get('/', 'Tenant\AdminController@index')->name('tenant.dashboard');

    Route::get('/users', 'Tenant\AdminController@usersList')->name('tenant.users.list');
    Route::get('/user/{admin}', 'Tenant\AdminController@edit')->name('tenant.user.edit');
    Route::get('/new/user/', 'Tenant\AdminController@create')->name('tenant.user.create');
    Route::put('/user/{id}', 'Tenant\AdminController@toggleAdmin')->name('tenant.user.admin');
    Route::post('/user/{admin}', 'Tenant\AdminController@update')->name('tenant.user.update');
    Route::post('/user', 'Tenant\AdminController@store')->name('tenant.user.store');
    Route::post('/upload/avatar', 'Tenant\AdminController@uploadAvatar')->name('tenant.upload.avatar');
});

Route::get('/login', 'Tenant\Auth\AdminLoginController@showLoginForm')->name('tenant.login');
Route::post('/login', 'Tenant\Auth\AdminLoginController@login')->name('tenant.login.submit');
Route::get('/logout', 'Tenant\Auth\AdminLoginController@logout')->name('tenant.logout');

// todo: criar gestor de imagens que funcione na bd global e nos tenants (usar created_by e usar a bd global com uma tabela para a media)
// todo: habilitar inserção de imagem nos admins para que possam ser utilizadas globalmente


