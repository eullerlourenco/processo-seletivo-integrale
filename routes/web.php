<?php

use App\Http\Controllers\ContactsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('contacts.create');
});

Route::
    prefix('contacts')
    ->controller(ContactsController::class)
    ->name('contacts.')
    ->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');
    });