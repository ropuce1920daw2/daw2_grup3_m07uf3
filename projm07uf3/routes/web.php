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
    return view('welcome');
});
Route::get('/opcion', function () {
    return view('opcion');
});
Route::get('canal', function(){
    return view('canals/canal_menu');
});
Route::get('graellas', function(){
    return view('graella/graella_menu');
});
Route::get('programa', function(){
    return view('programas/programa_menu');
});
Route::resource('canals','canalctl');
Route::resource('programas','programasctl');
Route::resource('graella','graellasctl');
