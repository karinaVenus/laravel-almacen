<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlmacenController; //Ruta del controlador del almacen

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/almacen', function () {
    return view('almacen.almacen');
});

Route::get('/almacen/agregar',[AlmacenController::class,'create']); */
//ruta de carpeta-el controlador de tipo clase-metodo create (ubicada en almacen controler)
Route::resource('almacen', AlmacenController::class);//acceder a todas las url

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
