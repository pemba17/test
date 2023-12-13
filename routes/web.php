<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Informations;

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

# informations 
Route::get('informations',Informations::class);

Route::get('/', function () {
    return redirect()->to('informations');
});


