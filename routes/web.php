<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//como los crea solo el sabe cual es cada ruta y no las tenemos que especificar
Route::resource('/alumnos', AlumnoController::class);
//pero las nuevas, si hay, si que las tengo que poner
