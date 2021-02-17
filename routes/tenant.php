<?php

Route::get('/', function ($subdomain) {
    return 'without admin'. $subdomain;
});


Route::group(['prefix' => 'admin'], function () {

    Route::get('/', function ($subdomain) {
        return 'with admin'. $subdomain;
    });
});

// todo: criar Tenant\Controllers, Models\Tenant, Admin Guard

