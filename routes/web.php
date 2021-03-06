<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function() {
    return redirect('/companies');
});
Route::get('/companies', function () {
    return view('companies');
});
Route::livewire('/{brand}/edit', 'edit-brand')->name('edit-brand');
Route::livewire('/{company}/edit-company', 'edit-company')->name('edit-company');
