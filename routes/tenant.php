<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function ($subdomain) {
    return 'default connection : '. DB::connection()->getDatabaseName();
    ;
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'Tenant\AdminController@index')->name('tenant.dashboard');
});

Route::get('/login', 'Tenant\Auth\AdminLoginController@showLoginForm')->name('tenant.login');
Route::post('/login', 'Tenant\Auth\AdminLoginController@login')->name('tenant.login.submit');
Route::get('/logout', 'Tenant\Auth\AdminLoginController@logout')->name('tenant.logout');

